<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Translatable;

class Category extends Model
{
    
    protected $fillable = ['name','description','code'];

        public $timestamps = true;

    public function products(){

        return $this->hasMany(Product::class);
    }

}
