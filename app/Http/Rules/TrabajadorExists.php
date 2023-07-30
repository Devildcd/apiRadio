<?php

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class TrabajadorExists implements Rule
{
    public function passes($attribute, $value)
    {
        return DB::table('trabajadors')->where('id', $value)->exists();
    }

    public function message()
    {
        return 'Aun no ha creado ningun trabajador';
    }
}