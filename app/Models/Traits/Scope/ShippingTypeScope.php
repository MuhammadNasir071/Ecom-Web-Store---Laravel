<?php

namespace App\Models\Traits\Scope;

/**
 * Class UserScope.
 */
trait ShippingTypeScope
{
    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeStatus($query, $status = 1)
    {
        return $query->where('is_active', $status);
    }

}
