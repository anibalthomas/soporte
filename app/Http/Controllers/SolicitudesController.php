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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cursos = Solicitud::where('status', 'curso')->get();
      $colas = Solicitud::where('status', 'cola')->get();
      $finalizadas = Solicitud::where('status', 'finalizada')->get();
      // $solicitudes = Solicitud::all();
      return view('lista',compact('colas','cursos','finalizadas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solicitud');
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
          'status' => "cola"
          ]);

          return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "hola" . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $solicitud = Solicitud::findOrFail($id);
      return view('edit',compact('solicitud'));
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

          $solicitud->solicitante = $request->get('solicitante');
          $solicitud->tipo = $request->get('tipo');
          $solicitud->prioridad = $request->get('prioridad');
          $solicitud->notas = $request->get('notas');
          $solicitud->atiende = Auth::user()->name;
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
