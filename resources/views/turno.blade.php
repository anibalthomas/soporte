@extends('layouts.plantilla')

@section('header')
  <a class="navbar-brand" href="#"> Solicitudes </a>
@endsection
@section('content')

@if ($turnos_num >= 1)
  <div class="col-md-12">
          <div class="card">
              <div class="card-header" data-background-color="blue">
                  <h4 class="title">En curso</h4>
                  <p class="category">Solicitudes atendidas actualmente</p>
              </div>
              <div class="card-content table-responsive">
                  <table id="example2" class="table" style="width:100%">
                      <thead style="color: black;" class="text-primary">
                          <th>Turno</th>
                          <th>Atiende</th>
                          <th>Tipo de Solicitud</th>
                          <th>Prioridad</th>
                          <th>Fecha</th>
                          <th>Notas</th>
                          {{-- <th>Acción</th> --}}
                      </thead>
                      <tbody>
                        @foreach ($turnos as $turno)
                        <tr>
                            <td>{{ $turno->id}}</td>
                            <td>{{ $turno->atiende}}</td>
                            <td>{{ $turno->tipo}}</td>
                            {{-- <td><a href="#" class="badge badge-pill badge-success">{{ $turno->prioridad}}</a></td> --}}
                            <td><a href="#" class="badge badge-pill badge-success"
                            @if ($turno->prioridad === "Baja")
                              style="background-color: rgb(200, 192, 200)"
                            @elseif ($turno->prioridad === "Importante")
                              style="background-color: green;"
                            @elseif ($turno->prioridad === "Urgente")
                              style="background-color: rgb(224, 222, 17)"
                            @elseif ($turno->prioridad === "Inmediato")
                              style="background-color: red;"
                            @endif
                              >
                              {{ $turno->prioridad}}</a></td>
                            <td>{{ $turno->created_at}}</td>
                            <td>{{ $turno->notas}}</td>
                            {{-- <td><button type="button" class="btn btn-danger btn-sm" name="button">Cancelar</button>
                            </td> --}}
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
@endif


@if ($prioridades_num >= 1)
  <div class="col-md-12">
          <div class="card">
              <div class="card-header" data-background-color="red">
                  <h4 class="title">En curso</h4>
                  <p class="category">Solicitudes con mayor prioridad</p>
              </div>
              <div class="card-content table-responsive">
                  <table id="example2" class="table" style="width:100%">
                      <thead style="color: black;" class="text-primary">
                          <th>Turno</th>
                          <th>Solicitante</th>
                          <th>Atiende</th>
                          <th>Tipo de Solicitud</th>
                          <th>Prioridad</th>
                          <th>Fecha</th>
                          <th>Notas</th>
                          {{-- <th>Acción</th> --}}
                      </thead>
                      <tbody>
                        @foreach ($prioridades as $prioridad)
                        <tr>
                            <td>{{ $prioridad->id}}</td>
                            <td>{{ $prioridad->solicitante}}</td>
                            <td>{{ $prioridad->atiende}}</td>
                            <td>{{ $prioridad->tipo}}</td>
                            {{-- <td><a href="#" class="badge badge-pill badge-success">{{ $prioridad->prioridad}}</a></td> --}}
                            <td><a href="#" class="badge badge-pill badge-success"
                            @if ($prioridad->prioridad === "Baja")
                              style="background-color: rgb(200, 192, 200)"
                            @elseif ($prioridad->prioridad === "Importante")
                              style="background-color: green;"
                            @elseif ($prioridad->prioridad === "Urgente")
                              style="background-color: rgb(224, 222, 17)"
                            @elseif ($prioridad->prioridad === "Inmediato")
                              style="background-color: red;"
                            @endif
                              >
                              {{ $prioridad->prioridad}}</a></td>
                            <td>{{ $prioridad->created_at}}</td>
                            <td>{{ $prioridad->notas}}</td>
                            {{-- <td><button type="button" class="btn btn-danger btn-sm" name="button">Cancelar</button>
                            </td> --}}
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
@endif


@if ($turnos_colas_num >= 1)
  <div class="col-md-12">
          <div class="card">
              <div class="card-header" data-background-color="yellow">
                  <h4 class="title">En espera</h4>
                  <p class="category">Solicitudes en espera de ser antendidas</p>

<br>

                </div>
                  <div class="card-header" data-background-color="amarillo">

                  {{-- <div class="pull-right inline"> --}}
                    <p style="font-size: 20px; color: black;" class="category pull-right inline">Turno Actual:
                      @if (optional($ultimo)->id === null)
                        0
                      @else
                        <strong style="color: red;font-size: 22px;font-family: digitos;">{{$ultimo->id}}</strong>
                      @endif
                    </p>
                    <p style=" color: black;" class="category">El turno puede variar dependiendo de la prioridad de la solicitud</p>
                  {{-- </div> --}}



              </div>
              <div class="card-content table-responsive">
                  <table id="example2" class="table" style="width:100%">
                      <thead style="color: black;" class="text-primary">
                          <th>Turno</th>
                          <th>Tipo de Solicitud</th>
                          <th>Prioridad</th>
                          <th>Fecha</th>
                          <th>Notas</th>
                          <th>Acción</th>
                      </thead>
                      <tbody>
                        @foreach ($turnos_colas as $turno_cola)
                        <tr>
                            <td>{{ $turno_cola->id}}</td>
                            <td>{{ $turno_cola->tipo}}</td>
                            {{-- <td><a href="#" class="badge badge-pill badge-success">{{ $turno_cola->prioridad}}</a></td> --}}
                            <td><a href="#" class="badge badge-pill badge-success"
                            @if ($turno_cola->prioridad === "Baja")
                              style="background-color: rgb(200, 192, 200)"
                            @elseif ($turno_cola->prioridad === "Importante")
                              style="background-color: green;"
                            @elseif ($turno_cola->prioridad === "Urgente")
                              style="background-color: rgb(224, 222, 17)"
                            @elseif ($turno_cola->prioridad === "Inmediato")
                              style="background-color: red;"
                            @endif
                              >
                              {{ $turno_cola->prioridad}}</a></td>
                            <td>{{ $turno_cola->created_at}}</td>
                            <td>{{ $turno_cola->notas}}</td>
                            <form method="POST"
                              action="{{ route('updatecancelar', $turno_cola->id) }}">
                              {{ csrf_field() }}
                              {!! method_field('PUT')!!}
                              <td>
                                <button type="input" class="btn btn-danger btn-sm" name="button">Cancelar</button>
                              </td>
                            </form>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
@endif

@endsection
@push('styles')
<style>
@font-face {
font-family: digitos;
src: url(/font/DS-DIGII.TTF);
}
</style>
@endpush
@push('scripts')
 <script src="../material2/js/jquery-3.2.1.min.js" type="text/javascript"></script>

@endpush
