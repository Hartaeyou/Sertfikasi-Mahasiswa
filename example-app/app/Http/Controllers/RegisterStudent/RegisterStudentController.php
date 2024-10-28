<?php

namespace App\Http\Controllers\RegisterStudent;

use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\StudentRegister;
use App\Http\Controllers\Controller;

class RegisterStudentController extends Controller
{
    public function viewRegister ()
    {
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('User.Student_Register.index', [
            'provinces' => $provinces,
            'genders' => ['Pria', 'Wanita'],
            'maritalStatuses' => ['Menikah', 'Belum Menikah', 'Lain-Lain'],
            'religions' => ['Islam', 'Kristen', 'Hindu', 'Budha', 'Konghucu', 'Lain-Lain'],
        ]);
    }

    public function getcity  (Request $request)
    {
        $cities = Regency::where('province_id', $request->id_province)->get();
        $options = '<option selected>Pilih Kota</option>';
        
        foreach ($cities as $city) {
            $options .= '<option value="'.$city->id.'">'.$city->name.'</option>';
        }
    
        return response()->json($options);
    }

    public function store (Request $request)
    {
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

        StudentRegister::create([
            'user_id' => $request->user_id,
            'name' => $validatedData['Name'],
            'address' => $validatedData['address'],
            'province' => $validatedData['province'],
            'city_id' => $validatedData['city'],
            'district' => $validatedData['distrinct'], 
            'subdistrict' => $validatedData['subdistrinct'],
            'phone_number' => $validatedData['Phone'],
            'email' => $validatedData['Email'],
            'citizenship' => $validatedData['citizenship'],
            'Born_date' => $validatedData['born_date'],
            'gender' => $validatedData['gender'],
            'MarriedStatus' => $validatedData['marital_status'],
            'religion' => $validatedData['religion'],
            'ktp_file' => $foto_name,
            'Born_place' => $validatedData['born_place'],
            'address_now' => $validatedData['address_now'],
        ]);

        return redirect()->route('studentRegister')->with('Success', 'Pendaftaran berhasil!');
    }
}
