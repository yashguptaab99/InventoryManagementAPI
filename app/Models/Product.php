<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 
        'product_name', 
        'product_code', 
        'buying_price', 
        'selling_price', 
        'supplier_id', 
        'buying_date', 
        'product_quantity'
    ];
}
