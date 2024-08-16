<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excellent extends Model
{
    use HasFactory;
    protected $fillable = ['heading','content','status'];

    public static function CreateExcellent($input){
        if($input['status'] == 'Active'){
            $data = Excellent::where('status','Active')->first();
           if($data){
            $statusInactive = Excellent::where('id',$data->id)->update([
                'status' => 'Inactive',
            ]);
           }
        }


        $createExcellent = Excellent::create([
            'heading' => $input['heading'],
            'content' => $input['content'],

            'status' => $input['status'],

        ]);
        if($createExcellent){
            return true;
        }else{
            return false;
        }
    }
}
