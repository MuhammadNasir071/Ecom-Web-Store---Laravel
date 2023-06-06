<?php

namespace App\Models;

use App\Models\Traits\LocalTimeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FcmToken extends Model
{
    use HasFactory, LocalTimeTrait;

    protected $table = 'fcm_tokens';
    protected $guarded = [];
}
