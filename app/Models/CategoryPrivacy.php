<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPrivacy extends Model
{
    use HasFactory;

    protected $table = 'category_privacy';

    protected $fillable = ['category_id', 'privacy_id'];

   
}