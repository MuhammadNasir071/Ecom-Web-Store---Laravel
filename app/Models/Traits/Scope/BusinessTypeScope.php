<?php

namespace App\Models\Traits\Scope;

/**
 * Class UserScope.
 */
trait BusinessTypeScope
{
    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeStatus($query, $status = 'published')
    {
        return $query->where('status', $status);
    }

}
