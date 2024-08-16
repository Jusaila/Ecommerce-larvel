<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testomonial extends Model
{
    use HasFactory;
    protected $fillable = ['heading','content','image','name','designation','status'];

    public static function CreateTestimonial($input){

        $createTestimonials = Testomonial::create([
            'heading' => $input['heading'],
            'content' => $input['content'],

            'image' => $input['image_path'],
            'name' => $input['name'],
            'designation' => $input['designation'],

            'status' => $input['status'],

        ]);
        if($createTestimonials){
            return true;
        }else{
            return false;
        }
    }
}
