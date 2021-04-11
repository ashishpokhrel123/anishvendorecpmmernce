<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    
    protected $fillable = ['category_name','is_parent','category_slug','description','image','status','parent_id'];
    public static function shiftChild($cat_id)
    {
        return Category::where('id',$cat_id)->update(['is_parent'=>1]);
    }
    public static function getChildParentID($id)
    {
        return Category::where('parent_id',$id)->pluck('category_name','id');
    }
}
