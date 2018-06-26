<?php

use Illuminate\Database\Seeder;
use App\Solicitud;

class SolicitudesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $solicitud = new Solicitud;
      $solicitud->registrante = "Anibal";
      $solicitud->solicitante = "Mónica";
      $solicitud->tipo = "Respaldo";
      $solicitud->prioridad = "Urgente";
      $solicitud->notas = "Maquina de Posgrado";
      $solicitud->status = "cola";
      $solicitud->save();

      $solicitud = new Solicitud;
      $solicitud->registrante = "Anibal";
      $solicitud->solicitante = "Mónica";
      $solicitud->tipo = "Respaldo";
      $solicitud->prioridad = "Urgente";
      $solicitud->notas = "Maquina de Posgrado";
      $solicitud->status = "cola";
      $solicitud->save();

      $solicitud = new Solicitud;
      $solicitud->registrante = "Anibal";
      $solicitud->solicitante = "Mónica";
      $solicitud->tipo = "Respaldo";
      $solicitud->prioridad = "Urgente";
      $solicitud->notas = "Maquina de Posgrado";
      $solicitud->status = "cola";
      $solicitud->save();

      $solicitud = new Solicitud;
      $solicitud->registrante = "Anibal";
      $solicitud->solicitante = "Mónica";
      $solicitud->tipo = "Respaldo";
      $solicitud->prioridad = "Urgente";
      $solicitud->notas = "Maquina de Posgrado";
      $solicitud->status = "cola";
      $solicitud->save();

      $solicitud = new Solicitud;
      $solicitud->registrante = "Anibal";
      $solicitud->solicitante = "Mónica";
      $solicitud->tipo = "Respaldo";
      $solicitud->prioridad = "Urgente";
      $solicitud->notas = "Maquina de Posgrado";
      $solicitud->status = "cola";
      $solicitud->save();

    }
}
