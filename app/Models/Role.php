<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get the users in a role.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
