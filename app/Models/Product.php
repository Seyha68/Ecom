<?php

namespace App\Models;


use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'prod_name',
        'description',
        'category_id',
        'image',
        'status',
        'original_price',
        'selling_price',
        'quanlity',
        'trending',
        'brand_name',
    ];

    public function productImage(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
