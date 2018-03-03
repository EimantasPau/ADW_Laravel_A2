<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'quantity', 'image_name', 'created_at', 'updated_at'];

    public function orders() {
        return $this->belongsToMany(Order::class)->withPivot('line_quantity')->withTimestamps();
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
