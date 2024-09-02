<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'category_id', 'description', 'price', 'image','size','status'
    ];
    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public static function CreateProduct($input){
        $date = Carbon::now();

        $result = [];
        $exists = Product::where('name',$input['productName'])
                ->where('category_id',$input['categoryId'])->first();
        if($exists){
            $result['message'] = 'A product with this name already exists in this category.';
            $result['response'] = false;
        }else{
            $createProduct = Product::create([
                'name' => $input['productName'],
                'category_id' => $input['categoryId'],
                'description' => $input['description'],
                'price' => $input['price'],
                'image' => $input['image_path'],
                'size' => $input['size'],
                'visible_at' => $input['visible_at'],

                'status' => $input['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),


            ]);
            if($createProduct){
                $result['message'] = 'Product added successfully';
                $result['response'] = true;
            }else{
                $result['message'] = 'something went wrong';
                $result['response'] = false;
            }
        }
        return $result;

        }

    public static function ProductUpdate($input){
        $updateProduct = Product::where('id',$input['id'])->update([

            'name' => $input['productName'],
            'category_id' => $input['categoryId'],
            'description' => $input['description'],
            'price' => $input['price'],
            'image' => $input['image_path'],
            'size' => $input['size'],
            'visible_at' => $input['visible_at'],

            'status' => $input['status'],
            'updated_at' => Carbon::now(),
        ]);
        if($updateProduct){
            return true;
        }else{
            return false;
        }
}
}
