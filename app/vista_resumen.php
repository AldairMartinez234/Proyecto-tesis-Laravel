<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vista_resumen extends Model
{
     protected $table = 'vista_resumen';


     //Query Scope

    public function scopeId($query, $paciente_id)
    {
        if($paciente_id)
            return $query->where('paciente_id', 'LIKE', "%$paciente_id%");
    }
}
