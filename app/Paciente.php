<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
     protected $fillable = ['RFC', 'nombre', 'sexo', 'tipo', 'edad','noissste','celular','telefono'];
}
