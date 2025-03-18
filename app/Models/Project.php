<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // metto in relazione col type
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
