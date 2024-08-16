<?php

namespace App\Models;

use App\Http\Controllers\WebsiteContentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteContent extends Model
{
    use HasFactory;
    protected $fillable = ['content_id','heading','content','image','status'];

    public static function CreateWebsite($input){
        if($input['status'] == 'Active'){
            $data = WebsiteContent::where('status','Active')->first();
           if($data){
            $statusInactive = WebsiteContent::where('id',$data->id)->update([
                'status' => 'Inactive',
            ]);
           }
        }

        $createBanner = WebsiteContent::create([
            'content_id' => $input['content_id'],
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
}
