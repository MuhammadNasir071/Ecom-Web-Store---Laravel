<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Scope\HelpCenterScope;

class HelpCenter extends Model
{
    use HasFactory, HelpCenterScope;

    protected $table = 'help_center';

    protected $fillable = ['name', 'order', 'description', 'icon', 'slug', 'is_active', 'user_id'];

    public function scopeSearchByName($query, $name)
    {
        if (!is_null($name)) {
            return $query->where('name', 'like', '%'.$name.'%');
        }
        return $query;
    }
}
