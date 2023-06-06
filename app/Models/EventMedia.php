<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class EventMedia extends Model
{
    use HasFactory;

    protected $table = 'event_media';

    protected $fillable = ['event_id', 'media_type', 'media_path'];

    public function events()
    {
        return $this->belongsTo(Event::class);
    }
}
