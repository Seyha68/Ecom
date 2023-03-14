<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categorys';

    protected $fillable = [
        'id',
        'name',
        'description',
        'img',
        'status',
        'sell_price',
        'origin_price'
    ];

    // public function Brands()
    // {
    //     return $this->hasMany(Brand::class);
    // }
    // public function products(){
    //     return $this->hasMany(Product::class,'category_id');
    // }
}
