<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homebanner extends Model
{
    use HasFactory;
    protected $fillable = ['heading','content','image','status'];

    public static function CreateBanner($input){
        if($input['status'] == 'Active'){
            $data = Homebanner::where('status','Active')->first();
           if($data){
            $statusInactive = Homebanner::where('id',$data->id)->update([
                'status' => 'Inactive',
            ]);
           }
        }

        $createBanner = Homebanner::create([
            'heading' => $input['heading'],
            'content' => $input['content'],

            'image' => $input['image_path'],
            'status' => $input['status'],

        ]);
        if($createBanner){
            return true;
        }else{
            return false;
        }
    }
    public static function HomeBannerUpdate($input){

    $updateBanner = Homebanner::where('id',$input['id'])->update([
        'heading' => $input['heading'],
        'content' => $input['content'],

        'image' => $input['image_path'],
        'status' => $input['status'],

    ]);
    if($updateBanner){
        return true;
    }else{
        return false;
    }
}

}
