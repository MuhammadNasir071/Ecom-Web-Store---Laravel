<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewProduct extends Model
{
    use HasFactory;

    protected $table = 'view_products';
    protected $fillable = ['user_id', 'product_id', 'product_viewed_count'];
}
