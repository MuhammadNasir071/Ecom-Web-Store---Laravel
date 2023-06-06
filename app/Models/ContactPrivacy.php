<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPrivacy extends Model
{
    use HasFactory;

    protected $table = 'contact_privacy';

    protected $fillable = ['contact_id', 'privacy_id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
