<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    public function product_code()
    {
        return $this->hasOne(ProductCode::class, 'product_id', 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function orders(){
        return $this->BelongsToMany(Order::class, 'order_detail', 'product_id', 'order_id');
    }
   
}
