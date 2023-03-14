<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $fillable = [
        'id',
        'product_id',
        'image',

    ];
    public function product(){
        return $this->belongsTo(Product::class,'id','product_id');
    }
}
