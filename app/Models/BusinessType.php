<?php

namespace App\Models;

use App\Models\Traits\Scope\BusinessTypeScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    use HasFactory, BusinessTypeScope;
    protected $table = 'business_types';

    protected $fillable = ['title','slug','status'];
}
