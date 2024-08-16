<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whychooseus extends Model
{
    use HasFactory;
    protected $fillable = ['icon','sub_heading','sub_content','status'];

    public static function CreateChooseus($input){
        if($input['status'] == 'Active'){
            $data = Whychooseus::where('status','Active')->first();
           if($data){
            $statusInactive = Homebanner::where('id',$data->id)->update([
                'status' => 'Inactive',
            ]);
           }
        }
        $createChoose = Whychooseus::create([

            'icon' => $input['icon_path'],
            'sub_heading' => $input['sub-heading'],
            'sub_content' => $input['sub-content'],
            'status' => $input['status'],

        ]);
        if($createChoose){
            return true;
        }else{
            return false;
        }
    }
}
