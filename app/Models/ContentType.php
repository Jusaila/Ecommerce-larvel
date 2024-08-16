<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public static function CreateContent($input){
        $createContent = ContentType::create([
            'name' => $input['name']
        ]);
        if($createContent){
            return true;
        }else{
            return false;
        }
    }
}
