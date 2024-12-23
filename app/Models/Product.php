<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'quantity'];
    public function order_details()
    {
        return $this->hasMany(Order_detail::class);
    }
}
