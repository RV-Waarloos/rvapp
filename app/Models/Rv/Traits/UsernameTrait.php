<?php

namespace App\Models\Rv\Traits;

trait UsernameTrait
{
    public function getNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
