<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function book_imgages()
    {
        return $this->hasMany(BookImage::class);
    }

    public function cart_details()
    {
        return $this->hasMany(CartDetail::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
    
}
