<?php

namespace App\Models;

use App\Models\Traits\Scope\PrivacyScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use HasFactory, SoftDeletes, PrivacyScope;

    protected $fillable = [
        'question',
        'answer',
        'order',
        'is_active',
        'user_id',
    ];

    public function scopeSearchByQuestion($query, $question)
    {
        if (!is_null($question)) {
            return $query->where('question', 'like', '%'.$question.'%');
        }
        return $query;
    }
}
