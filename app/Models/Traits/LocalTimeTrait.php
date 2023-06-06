<?php

namespace App\Models\Traits;


trait LocalTimeTrait
{
    /**
     * This will change date according to timezone. 
     * 
     */
    public function getCreatedAtAttribute()
    {
        return !is_null($this->attributes['created_at']) ? toLocalTimezone($this->attributes['created_at']) : $this->attributes['created_at'];
    }

    /**
     * This will change date according to timezone. 
     * 
     */
    public function getUpdatedAtAttribute()
    {
        return !is_null($this->attributes['updated_at']) ? toLocalTimezone($this->attributes['updated_at']) : $this->attributes['updated_at'];
    }
}

