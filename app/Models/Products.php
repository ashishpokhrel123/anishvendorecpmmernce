<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table="products";

    public function category()
{
    return $this->belongsTo(Category::class,'category_id');
}
public function vendor()
{
    return $this->belongsTo(vendor::class,'vendor_id');
}
}

