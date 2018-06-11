<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
  protected $fillable = [
      'registrante','solicitante', 'tipo', 'prioridad', 'notas',
      'atiende', 'status', 'tiempo_inicio',
       'tiempo_final'

  ];
}
