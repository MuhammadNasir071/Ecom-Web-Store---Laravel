<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventMedia;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'start_date', 'end_date', 'is_active'];

    public function eventMedia()
    {
        return $this->hasMany(EventMedia::class);
    }
}
