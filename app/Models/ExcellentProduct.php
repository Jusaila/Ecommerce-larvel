<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcellentProduct extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','status' ];

    public static function CreateExcellentProduct($input){
        $result = [];
        if ($input['status'] == 'Active') {
            $countExcellentProduct = ExcellentProduct::where('status', 'Active')->count();
            if($countExcellentProduct >= 3){
                $result['message'] = 'A maximum of three products can be active at any given time.';
                $result['response'] = false;
                return $result;
            }
        }

        $exists = ExcellentProduct::where('product_id',$input['productId'])->first();
        If($exists){
            $result['message'] = 'This product is already added';
            $result['response'] = false;
        }else{
            $createExcellentProduct = ExcellentProduct::create([
                'product_id' => $input['productId'],
                'status' =>$input['status']
            ]);

            if($createExcellentProduct){
                $result['message'] = 'Added successfully';
                $result['response'] = true;
                return $result;
            }else{
                $result['message'] = 'Something went Wrong';
                $result['response'] = false;
                return $result;
            }
        }
        return $result;

    }

    //
    public static function UpdateExcellentProduct($input){
        $result = [];

        if ($input['status'] == 'Active') {

            $countExcellentProduct = ExcellentProduct::where('status', 'Active')->count();

            if($countExcellentProduct >= 3){
                $result['message'] = 'A maximum of three products can be active at any given time.';
                $result['response'] = false;
                return $result;


            }

        }
        $updateExcellentProduct = ExcellentProduct::where('id',$input['id'])->update([
            'product_id' => $input['productId'],
            'status' =>$input['status']
        ]);

        if($updateExcellentProduct){
            $result['message'] = 'Added successfully';
            $result['response'] = true;
            return $result;
        }else{
            $result['message'] = 'Something went Wrong';
            $result['response'] = false;
            return $result;
        }
    }
}
