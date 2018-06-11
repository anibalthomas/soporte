<?php

namespace App\Http\Controllers;
use App\Solicitud;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cursos = Solicitud::where('status', 'curso')->count();
      $colas = Solicitud::where('status', 'cola')->count();
      $finalizadas = Solicitud::where('status', 'finalizada')->count();



        return view('home',compact('colas','cursos','finalizadas'));
    }

}
