<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRegister extends Model
{
    protected $table = 'studentRegister';

    protected $fillable = [
        'name', 'address', 'province', 'city_id', 'subdistrict', 'district', 'phone_number', 'email', 'citizenship',
        'Born_date', 'gender', 'MarriedStatus', 'religion', 'ktp_file', 'user_id', 'born_place', 'address_now'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function city ()
    {
        return $this->belongsTo(Regency::class, 'city_id', 'id');
    }

}
