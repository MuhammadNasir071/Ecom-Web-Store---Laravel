<?php

namespace App\Models\Traits\Scope;

/**
 * Class UserScope.
 */
trait PrivacyScope
{
    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeActive($query, $status = 1)
    {
        return $query->where('is_active', $status);
    }

    public function scopePrivacySlug($query, $slug = null)
    {
        return $query->where('slug', $slug);
    }
    
    public function scopeLevel($query, $level = 0)
    {
        return $query->where('level', $level);
    }
}
