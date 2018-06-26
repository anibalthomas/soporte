<?php

namespace App\Http\Controllers;

use App\Solicitud;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    //para agregar la clase auth

class SolicitudesController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $noti = Solicitud::where('status', 'cola')->count();
      $cursosn = Solicitud::where('status', 'curso')->count();
      $finalizadasn = Solicitud::where('status', 'finalizada')->count();
      $canceladasn = Solicitud::where('status', 'cancelada')->count();

      $cursos = Solicitud::where('status', 'curso')->get();
      $colas = Solicitud::where('status', 'cola')->get();
      $finalizadas = Solicitud::where('status', 'finalizada')->get();
      $canceladas = Solicitud::where('status', 'cancelada')->get();
      // $solicitudes = Solicitud::all();
      return view('lista',compact('colas','cursos','finalizadas','canceladas','noti','cursosn','finalizadasn','canceladasn'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $noti = Solicitud::where('status', 'cola')->count();
        return view('solicitud',compact('noti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $solicitud = Solicitud::create([
          'registrante' => Auth::user()->name,
          'solicitante' => $request->get('solicitante'),
          'tipo' => $request->get('tipo'),
          'prioridad' => $request->get('prioridad'),
          'notas' => $request->get('notas'),
          'status' => "cola",
          ]);

          return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function turno()
    {

      $ultimo = Solicitud::where('status', 'curso')->get()->last();
      $prioridades = Solicitud::where('status', 'curso')->where('prioridad', 'Inmediato')->get();
      $prioridades_num = Solicitud::where('status', 'curso')->where('prioridad', 'Inmediato')->count();

      $turnos_num = Solicitud::where('solicitante', Auth::user()->name)->where('status', 'curso')->count();
      $turnos_colas_num = Solicitud::where('solicitante', Auth::user()->name)->where('status', 'cola')->count();
      $turnos = Solicitud::where('solicitante', Auth::user()->name)->where('status', 'curso')->get();
      $turnos_colas = Solicitud::where('solicitante', Auth::user()->name)->where('status', 'cola')->get();
      $noti = Solicitud::where('status', 'cola')->count();
        return view('turno',compact('noti','turnos','turnos_colas','turnos_colas_num','turnos_num','ultimo','prioridades','prioridades_num'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $noti = Solicitud::where('status', 'cola')->count();
      $solicitud = Solicitud::findOrFail($id);
      return view('edit',compact('solicitud','noti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // return $request->all();
        $solicitud = Solicitud::findOrFail($id);

          if ($request->input('atiende') == "") {
            $solicitud->atiende = Auth::user()->name;
          } else {
           $solicitud->atiende = $request->get('atiende');
          }
          $solicitud->solicitante = $request->get('solicitante');
          $solicitud->tipo = $request->get('tipo');
          $solicitud->prioridad = $request->get('prioridad');
          $solicitud->notas = $request->get('notas');

          $solicitud->status = $request->get('status');
          if ($request->get('status') == "curso") {
          $solicitud->tiempo_inicio = Carbon::now();
          }
          if ($request->get('status') == "finalizada") {
            $solicitud->tiempo_final = Carbon::now();
          }
          $solicitud->save();
          return redirect()->route('lista');
    }

    public function updatecancelar(Request $request, $id)
    {
      // return $request->all();
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->status = "cancelada";
        $solicitud->save();
          return redirect()->route('turno');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->delete();
        return redirect()->route('lista');
    }
}
