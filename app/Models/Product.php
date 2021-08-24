<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ='tbl_products';
    protected $fillable = ['name','slug','category_id','status','quantity'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
