<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    
    protected $table = 'brands';

    protected $fillable = [
        'id',
        'brand_name',
        'category_id',
        'image',
        'status'
    ];

    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
