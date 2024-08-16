<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','status','image',
    ];
    public static function test($input){
        $data = User::where('email',$input['email'])->where('password',$input['password'])->first();
        if($data){
            return true;

        }else{
            return false;
        }
    }

    public static function createCategory($input){
        $result = [];
        $exists = Category::where('name',$input['categoryName'])->first();
        if($exists){
            $result['message'] = 'category Name already exists';
            $result['response'] = false;
        }else{
            $createCategory = Category::create([
                'name' => $input['categoryName'],
                'image' => $input['image_path'],
                'status' => $input['status']
            ]);
            if($createCategory){
                $result['message'] = 'category  added successfully';
                $result['response'] = true;
            }else{
                $result['message'] = 'Something went wrong';
                $result['response'] = false;
            }

        }
        return $result;


    }
    public static function UpdateCategory($input){
        $updateCategory = Category::where('id',$input['id'])->update([
            'name' => $input['categoryName'],
            'image' => $input['image_path'],

            'status' => $input['status']
        ]);
        if($updateCategory){
            return true;
        }else{
            return false;
        }
    }
}
