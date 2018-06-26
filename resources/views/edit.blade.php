@extends('layouts.plantilla')

@section('header')
  <a class="navbar-brand" href="#"> Edición de Solicitud </a>
@endsection
@section('content')


  <form method="POST" action="{{ route('update', $solicitud->id) }}">
    {!! method_field('PUT')!!}
    {{ csrf_field() }}
  <div class="row">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header" data-background-color="green">
                  <h4 class="title">Edición de solicitud</h4>
                  {{-- <p class="category">Completa el formulario</p> --}}
              </div>
              <div class="card-content">
                  <form>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group label-floating">
                                  <label class="control-label">Solicitante</label>
                                  <select name="solicitante" class="form-control" required>
                                    <option value="{{ $solicitud->solicitante}}">{{ $solicitud->solicitante}}</option>
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
                                    <option value="{{ $solicitud->tipo}}">{{ $solicitud->tipo}}</option>
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
                                    <option value="{{ $solicitud->prioridad}}">{{ $solicitud->prioridad}}</option>
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
                                      <textarea name="notas" class="form-control" rows="2"
                                      required>{{ $solicitud->notas}}</textarea>
                                  </div>
                              </div>
                          </div>
                      </div>

<div class="row">
  <div class="col-md-6">
    <div class="btn-group">
      <input type="radio" id="test2" name="status" value="curso" {{ $solicitud->status == 'curso' ? 'checked' : ''}}>
      <label for="test2">En curso</label>
      <input type="radio" id="test1" name="status" value="cola" {{ $solicitud->status == 'cola' ? 'checked' : ''}}>
      <label for="test1">En cola</label>
      <input type="radio" id="test3" name="status" value="finalizada" {{ $solicitud->status == 'finalizada' ? 'checked' : ''}}>
      <label for="test3">Finalizado</label>
      <input type="radio" id="test4" name="status" value="cancelada" {{ $solicitud->status == 'cancelada' ? 'checked' : ''}}>
      <label for="test4">Cancelado</label>
    </div>


    <div class="form-group label-floating">
        <label class="control-label">Atiende</label>
        <select name="atiende" class="form-control">
          <option value="{{ $solicitud->atiende}}">{{ $solicitud->atiende}}</option>
          <option value="Anibal Sánchez">Anibal Sánchez</option>
          <option value="Mónica Enríquez">Mónica Enríquez</option>
        </select>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <button type="submit" class="btn btn-primary pull-right" style="background-color: #26c6da;">Actualizar</button>
    <div class="clearfix"></div>

  </div>
</div>




                  </form>
              </div>
          </div>
      </div>

  </div>

  </form>
@endsection
@push('styles')
  <style>
  [type="radio"]:checked,
  [type="radio"]:not(:checked) {
      position: absolute;
      left: -9999px;
  }
  [type="radio"]:checked + label,
  [type="radio"]:not(:checked) + label
  {
      position: relative;
      padding-left: 28px;
      cursor: pointer;
      line-height: 20px;
      display: inline-block;
      color: #666;
  }
  [type="radio"]:checked + label:before,
  [type="radio"]:not(:checked) + label:before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      width: 18px;
      height: 18px;
      border: 1px solid #ddd;
      border-radius: 100%;
      background: #fff;
  }
  [type="radio"]:checked + label:after,
  [type="radio"]:not(:checked) + label:after {
      content: '';
      width: 12px;
      height: 12px;
      background: green;
      position: absolute;
      top: 3px;
      left: 3px;
      border-radius: 100%;
      -webkit-transition: all 0.2s ease;
      transition: all 0.2s ease;
  }
  [type="radio"]:not(:checked) + label:after {
      opacity: 0;
      -webkit-transform: scale(0);
      transform: scale(0);
  }
  [type="radio"]:checked + label:after {
      opacity: 1;
      -webkit-transform: scale(1);
      transform: scale(1);
  }
</style>
@endpush
@push('scripts')
 {{-- <script src="../material2/js/jquery-3.2.1.min.js" type="text/javascript"></script> --}}




@endpush
