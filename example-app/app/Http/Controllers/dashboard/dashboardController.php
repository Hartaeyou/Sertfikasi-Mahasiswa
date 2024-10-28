<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\StudentRegister;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
class dashboardController extends Controller
{
    public function dashboardAdmin ()
    {
        $users = User::all();
        return view('Admin.Dashboard.dashboard', compact('users'));
    }

    public function dashboardUser ()
    {
        return view('User.Dashboard.dashboard');
    }

    public function updateUser (Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('dashboardAdmin')->with('Success', 'Data Berhasilsil Diupdate');
    }

    public function deleteUser ($id)
    {
        $user = User::where('id',$id);
        $user->delete();
        return redirect()->route('dashboardAdmin');
    }

    public function editUser ($id)
    {
        $user = User::find($id);
        return view('Admin.Dashboard.EditUser', compact('user'));
    }

    public function tableRegister (Request $request)
    {
        $search = $request->search;

        // Buat query dasar tanpa menggunakan all() di bagian else
        $registers = StudentRegister::join('regencies', 'studentRegister.city_id', '=', 'regencies.id')
            ->join('provinces', 'regencies.province_id', '=', 'provinces.id')
            ->when($search, function ($query, $search) {
                return $query->where('studentRegister.name', 'LIKE', '%' . $search . '%')
                    ->orWhere('studentRegister.email', 'LIKE', '%' . $search . '%')
                    ->orWhere('regencies.name', 'LIKE', '%' . $search . '%')
                    ->orWhere('provinces.name', 'LIKE', '%' . $search . '%');
            })
            ->select('studentRegister.*')
            ->simplePaginate(5); // Menggunakan simplePaginate untuk pagination tanpa get() atau all()
        return view('Admin.Dashboard.EditRegister', compact('registers', 'search'));
    }   


    public function editRegister ($id)
    {
        $register = StudentRegister::find($id);
        $provinces = Province::all();
        return view('Admin.Dashboard.EditFormRegister', compact('register'), compact('provinces'));
    }

    public function deleteRegister ($id)
    {
        $register = StudentRegister::where('id',$id);
        $register->delete();
        return redirect()->route('tableRegister')->with('Success', 'Data Berhasilsil Dihapus');
    }

    public function submitUpdateRegister (Request $request, $id){
        $validatedData = $request->validate([
            'user_id'=>'required',
            'Name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'province' => 'required',
            'city' => 'required',
            'distrinct' => 'required|string|max:255',
            'subdistrinct' => 'required|string|max:255',
            'Phone' => 'required|numeric',
            'Email' => 'required|email',
            'citizenship' => 'required|string|max:255',
            'born_date' => 'required|date',
            'gender' => 'required|in:Pria,Wanita',
            'marital_status' => 'required|in:Menikah,Belum Menikah,Lain-Lain',
            'religion' => 'required|in:Islam,Kristen,Hindu,Budha,Konghucu,Lain-Lain',
            'ktp_file' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
            'born_place' => 'nullable|string|max:255',
            'address_now' => 'required|string|max:255',
        ]);

        $foto_product = $request->file('ktp_file');
        $foto_ekstensi = $foto_product->extension();
        $foto_name = time() . '.' . $foto_ekstensi;
        $foto_product->move(public_path('img'), $foto_name);

        $register = StudentRegister::find($id);
        $register->user_id = $request->user_id;
        $register->Name = $request->Name;
        $register->address = $request->address;
        $register->province = $request->province;
        $register->city_id = $request->city;
        $register->district = $request->distrinct;
        $register->subdistrict = $request->subdistrinct;
        $register->phone_number = $request->Phone;
        $register->Email = $request->Email;
        $register->citizenship = $request->citizenship;
        $register->born_date = $request->born_date;
        $register->gender = $request->gender;
        $register->MarriedStatus = $request->marital_status;
        $register->religion = $request->religion;
        $register->ktp_file = $foto_name;
        $register->born_place = $request->born_place;
        $register->address_now = $request->address_now;
        $register->save();
        return redirect()->route('tableRegister')->with('Success', 'Data Berhasil Diubah');
    }
}
