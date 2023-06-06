<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Privacy;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','contact_user_id', 'contact_number', 'email', 'nick_name', 'date_of_birth',
                     'image', 'gender', 'company', 'notes', 'user_id', 'day', 'month', 'year'];

    public function scopeSearchByName($query, $name)
    {
        if (!is_null($name)) {
            return $query->where('name', 'like', '%'.$name.'%');
        }
        return $query;
    }

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }

    public function privacy()
    {
        return $this->belongsToMany(Privacy::class, 'contact_privacy', 'contact_id', 'privacy_id')->withTimestamps();
    }
}
