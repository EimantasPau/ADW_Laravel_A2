<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'quantity', 'image_name', 'created_at', 'updated_at'];

    public function order() {
        return $this->belongsToMany(Order::class);
    }
}
