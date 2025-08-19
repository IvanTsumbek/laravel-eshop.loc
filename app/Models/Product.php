<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{

    use Sluggable; //после импорта библиотеки извне не забываем прописывать метод и неймспейс

    protected $fillable = ['title','category_id','price','old_price','is_hit','is_new',
                          'excerpt','content','image','gallery',];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category(): BelongsTo
    {
       return $this->belongsTo(Category::class);
    }

    protected function gallery(): Attribute
    {
       return Attribute::make(
         get: fn($value) => $value ? json_decode($value, true) : [],
         set: fn($value) => $value ? json_encode($value) : null
      );
    }

    public function getImage()
    {
       return $this->image ?: 'assets/img/no-image.png';
    }
}
