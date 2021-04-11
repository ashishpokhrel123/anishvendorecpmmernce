<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable =['product_name','product_slug','description','warranty','product_image','stock','price','offer_price','discount_price','weight','size','colours','status','date','category_id','child_cat_id','vendor_id'];
    

    // public static function vendor_id($id)
    // {
    //     return vendor::where('id',$id)->pluck('vendor_name','id');
    // }

    public function vendor()
    {
        // return $this->belongsTo(App\Models\vendor::class');
    }

    // public function vendor_id(){
    //     return $this->hasOne('App\Models\vendor','id','vendor_id');
    // }

    public function vendor_id(){
        return $this->hasMany('App\Models\vendor','vendor_id','id');
    }
    
    public static function geAllvendor($id){
        return Products::with('vendor_id')->find($id);
    }

   
}

