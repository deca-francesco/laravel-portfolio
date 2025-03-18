<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // metto in relazione coi projects
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
