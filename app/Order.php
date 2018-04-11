<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'created_at', 'updated_at','total_price'];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('line_quantity')->withTimestamps();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
