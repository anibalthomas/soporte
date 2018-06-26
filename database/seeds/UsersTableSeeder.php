<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User;
      $user->name = "Anibal";
      $user->apellido = "Sánchez";
      $user->cargo = "Desarrollo de software";
      $user->email = "anibal.sanchez@inecol.mx";
      $user->password = bcrypt('123456');
      $user->role = "admin";
      $user->save();
      $user = new User;
      $user->name = "Salvador";
      $user->apellido = "Mandujano";
      $user->cargo = "Secretario de Posgrado";
      $user->email = "secretaria.posgrado@inecol.mx";
      $user->password = bcrypt('123456');
      $user->role = "secretario";
      $user->save();
      $user = new User;
      $user->name = "Mónica";
      $user->apellido = "Enríquez";
      $user->cargo = "Coordinadora de Servicios Escolares";
      $user->email = "monica.enriquez@inecol.mx";
      $user->password = bcrypt('123456');
      $user->role = "admin";
      $user->save();
      $user = new User;
      $user->name = "Ingrid";
      $user->apellido = "Aguilar";
      $user->cargo = "Asistente de Ventanilla";
      $user->email = "ingrid.aguilar@inecol.mx";
      $user->password = bcrypt('123456');
      $user->save();
      $user = new User;
      $user->name = "Maritza";
      $user->apellido = "Malpica";
      $user->cargo = "Asistente de Cursos";
      $user->email = "maritza.malpica@inecol.mx";
      $user->password = bcrypt('123456');
      $user->save();
      $user = new User;
      $user->name = "Esther";
      $user->apellido = "León";
      $user->cargo = "Asistente de Archivo";
      $user->email = "esther.leon@inecol.mx";
      $user->password = bcrypt('123456');
      $user->save();
      $user = new User;
      $user->name = "Bertha";
      $user->apellido = "Ulloa";
      $user->cargo = "Asistente del Secretario de Posgrado";
      $user->email = "bertha.ulloa@inecol.mx";
      $user->password = bcrypt('123456');
      $user->save();
      $user = new User;
      $user->name = "Enrique";
      $user->apellido = "Salinas";
      $user->cargo = "Asistente Operativo ";
      $user->email = "enrique.salinas@inecol.mx";
      $user->password = bcrypt('123456');
      $user->save();
    }
}
