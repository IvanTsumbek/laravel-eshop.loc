<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products() 
    {
        if (true) {
            return $this->hasMany(Product::class);
        }
        return null;
    }
}
