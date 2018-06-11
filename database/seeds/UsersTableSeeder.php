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
      $user->name = "Anibal Sánchez";
      $user->cargo = "Desarrollo de software";
      $user->email = "anibal.sanchez@inecol.mx";
      $user->password = bcrypt('123456');
      $user->save();
      $user = new User;
      $user->name = "Salvador Mandujano";
      $user->cargo = "Secretario de Posgrado";
      $user->email = "secretaria.posgrado@inecol.mx";
      $user->password = bcrypt('123456');
      $user->save();
      $user = new User;
      $user->name = "Mónica Enríquez";
      $user->cargo = "Coordinadora de Servicios Escolares";
      $user->email = "monica.enriquez@inecol.mx";
      $user->password = bcrypt('123456');
      $user->save();
      $user = new User;
      $user->name = "Ingrid Aguilar";
      $user->cargo = "Asistente de Ventanilla";
      $user->email = "ingrid.aguilar@inecol.mx";
      $user->password = bcrypt('123456');
      $user->save();
      $user = new User;
      $user->name = "Maritza Malpica";
      $user->cargo = "Asistente de Cursos";
      $user->email = "maritza.malpica@inecol.mx";
      $user->password = bcrypt('123456');
      $user->save();
      $user = new User;
      $user->name = "Esther León";
      $user->cargo = "Asistente de Archivo";
      $user->email = "esther.leon@inecol.mx";
      $user->password = bcrypt('123456');
      $user->save();
      $user = new User;
      $user->name = "Bertha Ma. Ulloa";
      $user->cargo = "Asistente del Secretario de Posgrado";
      $user->email = "bertha.ulloa@inecol.mx";
      $user->password = bcrypt('123456');
      $user->save();
    }
}
