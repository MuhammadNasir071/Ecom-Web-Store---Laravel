<?php

namespace App\Models\Traits\Scope;

/**
 * Class UserScope.
 */
trait HelpCenterScope
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

    public function scopeHelpCenterSlug($query, $slug = null)
    {
        return $query->where('slug', $slug);
    }
}
