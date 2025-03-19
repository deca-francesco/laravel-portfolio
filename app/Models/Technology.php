<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    // metto in relazione coi projects
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
