<?php

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class EmisoraExists implements Rule
{
    public function passes($attribute, $value)
    {
        return DB::table('emisoras')->where('id', $value)->exists();
    }

    public function message()
    {
        return 'Aun no ha creado ninguna emisora';
    }
}