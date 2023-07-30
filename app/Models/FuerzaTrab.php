<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Modelo;

class FuerzaTrab extends Model
{
    public function modelo() {
        return $this->belongsTo(Modelo::class);
    }
}
