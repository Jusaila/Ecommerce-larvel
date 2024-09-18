<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Address extends Model
{
    protected $fillable = ['user_id','country','first_name','last_name','house_name','address','state','pincode','email','phone','status'

];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function CreateAddress($input){
        $createAddress = Address::create([
            'user_id' => Auth::id(),
            'country' => $input['country'],
            'first_name' => $input['fname'],
            'last_name' => $input['lname'],
            'house_name' => $input['housename'],
            'address' => $input['address'],
            'state' => $input['state'],
            'pincode' => $input['pincode'],
            'email' => $input['email'],
            'phone' => $input['phone'],
        ]);
        if($createAddress){
            return true;
        }else{
            return false;
        }
    }
}
