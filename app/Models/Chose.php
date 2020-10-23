<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chose extends Model
{
    use HasFactory;

    public function emplacement()
    {
        return $this->hasOne('App\Models\Emplacement', 'id', 'emplacement_id');
    }
}
