<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
      
     protected $table = 'products';

     public $timestamps = true;

     protected $fillable = [
        'name', 'code', 'price', 'category_id', 'description'
    ];


      public function category() {

        return $this->belongsTo(Category::class, 'category_id');
        
    }

}  

