@extends('layouts.plantilla')

@section('header')
  <a class="navbar-brand" href="#"> Registro de Solicitud </a>
@endsection
@section('content')
  <form method="POST" action="{{route('guardar')}}">
    {{ csrf_field() }}
  <div class="row">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header" data-background-color="green">
                  <h4 class="title">Registro de solicitud</h4>
                  {{-- <p class="category">Completa el formulario</p> --}}
              </div>
              <div class="card-content">
                  <form>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group label-floating">
                                  <label class="control-label">Solicitante</label>
                                  <select name="solicitante" class="form-control" required>
                                    <option value=""></option>
                                    <option value="Salvador">Salvador</option>
                                    <option value="Mónica">Mónica</option>
                                    <option value="Ingrid">Ingrid</option>
                                    <option value="Maritza">Maritza</option>
                                    <option value="Bertha">Bertha</option>
                                    <option value="Esther">Esther</option>
                                    <option value="Enrique">Enrique</option>
                                    <option value="Anibal">Anibal</option>
                                    <option value="Otro">Otro</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group label-floating">
                                  <label class="control-label">Tipo de Solicitud</label>
                                  <select name="tipo" class="form-control" required>
                                    <option value=""></option>
                                    <option value="Publicaciones">Publicaciones</option>
                                    <option value="Instalación de Software">Instalación de Software</option>
                                    <option value="Mantenimiento">Mantenimiento</option>
                                    <option value="Reparacion de Equipo">Reparacion de Equipo</option>
                                    <option value="Respaldo">Respaldo</option>
                                    <option value="Actualizar BD (constancias)">Actualizar BD (constancias)</option>
                                    <option value="Solicitud o cambio de Toner">Solicitud o cambio de Toner</option>
                                    <option value="Capacitación">Capacitación</option>
                                    <option value="Asesoria Ofimatica">Asesoria Ofimatica</option>
                                    <option value="Asesoria Sistema">Asesoria Sistema</option>
                                    <option value="Otro">Otro</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group label-floating">
                                  <label class="control-label">prioridad</label>
                                  <select name="prioridad" class="form-control" required>
                                    <option value=""></option>
                                    <option value="Baja">Baja</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Importante">Importante</option>
                                    <option value="Urgente">Urgente</option>
                                    <option value="Inmediato">Inmediato</option>
                                  </select>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  {{-- <label>Notas</label> --}}
                                  <div class="form-group label-floating">
                                      <label class="control-label">Notas</label>
                                      <textarea name="notas" class="form-control" rows="2" required></textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-success pull-right">Enviar solicitud</button>
                      <div class="clearfix"></div>
                  </form>
              </div>
          </div>
      </div>

  </div>

  </form>
@endsection
@push('scripts')
 <script src="../material2/js/jquery-3.2.1.min.js" type="text/javascript"></script>

@endpush
