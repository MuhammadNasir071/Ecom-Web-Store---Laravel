<?php

namespace App\Models;

use App\Models\Traits\LocalTimeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory, LocalTimeTrait;

    protected $table = 'notifications';
    protected $guarded = [];

    protected $appends = ['encrypted_id'];

    public function getEncryptedIdAttribute()
    {
        return encrypt($this->id);
    }
}
