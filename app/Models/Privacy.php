<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Scope\PrivacyScope;

class Privacy extends Model
{
    use HasFactory, PrivacyScope;

    protected $table = 'privacy';

    protected $fillable = ['name', 'slug', 'parent_id', 'level', 'is_active', 'user_id'];


    public function subPrivacy()
    {
        return $this->hasMany(Privacy::class, 'parent_id', 'id'); //scopeActive -> where is_active is 1
    }

    // parent privacy 
    public function parentCategory()
    {
        return $this->belongsTo(Privacy::class, 'parent_id', 'id');
    }

    // This will recursively get parent of Privacy
    public function allParentPrivacies()
    {
        return $this->parentCategory()->with('allParentPrivacies');
    }

    // This will recursively get sub privacy of privacy
    public function allSubPrivacy()
    {
        return $this->subPrivacy()->with('subPrivacy');
    }

    // set privacy to product category
    public function categoryPrivacy()
    {
        return $this->belongsToMany(Category::class, 'category_privacy', 'privacy_id', 'category_id')->withTimestamps();
    }
}
