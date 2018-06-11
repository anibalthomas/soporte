@extends('layouts.plantilla')

@section('header')
  <a class="navbar-brand" href="#"> Lista de Solicitudes </a>
@endsection
@section('content')

  <div class="row">

      <div class="col-md-12">
          <div class="card">
              <div class="card-header" data-background-color="blue">
                  <h4 class="title">En curso</h4>
                  <p class="category">Solicitudes atendidas actualmente</p>
              </div>
              <div class="card-content table-responsive">
                  <table id="example2" class="table" style="width:100%">
                      <thead class="text-primary">
                          <th>Registrante</th>
                          <th>Solicitante</th>
                          <th>Tipo de Solicitud</th>
                          <th>Prioridad</th>
                          <th>Fecha</th>
                          <th>Atiende</th>
                          <th>Notas</th>
                          <th>Acciones(admin)</th>
                      </thead>
                      <tbody>
                        @foreach ($cursos as $curso)
                        <tr>
                            <td>{{ $curso->registrante}}</td>
                            <td>{{ $curso->solicitante}}</td>
                            <td>{{ $curso->tipo}}</td>
                            <td><a href="#" class="badge badge-pill badge-success">{{ $curso->prioridad}}</a></td>
                            <td>{{ $curso->created_at}}</td>
                            <td>{{ $curso->atiende}}</td>
                            <td>{{ $curso->notas}}</td>
                            <td>
                              <div class="" style="text-align: center;">
                                <a title="Editar solicitud" rel="tooltip" href="{{ route('edit', $curso->id) }}"><i class="tiny material-icons"
                                  style="font-size: 18px; line-height: 1.9;">edit</i></a>
                                    <form id="form"
                                       style="display:inline;"
                        								method="POST"
                                        name="forms"
                        								action="{{ route('destroy', $curso->id) }}">
                            							{!! csrf_field() !!}
                            							{!! method_field('DELETE') !!}
                                        <a title="Eliminar solicitud" rel="tooltip" href="#"
                                        onclick="document.getElementById('form').submit(); return confirm('¿Estás seguro de eliminar esta solicitud?')">
                                        <i class="tiny material-icons"
                                        style="color: red;font-size: 18px; line-height:1.9;">close</i></a>
                        						</form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>


      <div class="col-md-12">
          <div class="card">
              <div class="card-header" data-background-color="green">
                  <h4 class="title">En cola</h4>
                  <p class="category">Solicitudes por atender</p>
              </div>
              <div class="card-content table-responsive">

                  <table id="example" class="table" style="width:100%">
                    <thead class="text-primary">
                        <th>Registrado por:</th>
                        <th>Solicitante</th>
                        <th>Tipo de Solicitud</th>
                        <th>Prioridad</th>
                        <th>Fecha</th>
                        <th>Notas</th>
                        <th>Acciones(admin)</th>
                    </thead>
                      <tbody>
                        @foreach ($colas as $cola)
                        <tr>
                            <td>{{ $cola->registrante}}</td>
                            <td>{{ $cola->solicitante}}</td>
                            <td>{{ $cola->tipo}}</td>
                            <td><a href="#" class="badge badge-pill badge-success">{{ $cola->prioridad}}</a></td>
                            <td>{{ $cola->created_at}}</td>
                            <td>{{ $cola->notas}}</td>
                            <td>
                              <div class="" style="text-align: center;">
                                <a title="Editar solicitud" rel="tooltip" href="{{ route('edit', $cola->id) }}"><i class="tiny material-icons"
                                  style="font-size: 18px; line-height: 1.9;">edit</i></a>
                                  <form id="form"
                                     style="display:inline;"
                                      method="POST"
                                      name="forms"
                                      action="{{ route('destroy', $cola->id) }}">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                      <a title="Eliminar solicitud" rel="tooltip" href="#"
                                      onclick="document.getElementById('form').submit(); return confirm('¿Estás seguro de eliminar esta solicitud?')">
                                      <i class="tiny material-icons"
                                      style="color: red;font-size: 18px; line-height:1.9;">close</i></a>
                                  </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>

              </div>
          </div>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="red">
            <h4 class="title">Finalizadas</h4>
            <p class="category">Solicitudes atendidas</p>
          </div>
          <div class="card-content table-responsive">

            <table id="example3" class="table" style="width:100%">
              <thead class="text-primary">
                <th>Registrado por:</th>
                <th>Solicitante</th>
                <th>Fecha</th>
                <th>Atendió</th>
                <th>Notas</th>
                <th>Tiempo inicial</th>
                <th>Tiempo Final</th>
                <th>Acciones(admin)</th>
              </thead>
              <tbody>
                @foreach ($finalizadas as $finalizada)
                  <tr>
                    <td>{{ $finalizada->registrante}}</td>
                    <td>{{ $finalizada->solicitante}}</td>
                    <td>{{ $finalizada->created_at}}</td>
                    <td>{{ $finalizada->atiende}}</td>
                    <td>{{ $finalizada->notas}}</td>
                    <td>{{ $finalizada->tiempo_inicio}}</td>
                    <td>{{ $finalizada->tiempo_final}}</td>
                    <td>
                      <div class="" style="text-align: center;">
                        <a title="Editar solicitud" rel="tooltip" href="{{ route('edit', $finalizada->id) }}"><i class="tiny material-icons"
                          style="font-size: 18px; line-height: 1.9;">edit</i></a>
                          <form id="form"
                             style="display:inline;"
                              method="POST"
                              name="forms"
                              action="{{ route('destroy', $finalizada->id) }}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                              <a title="Eliminar solicitud" rel="tooltip" href="#"
                              onclick="document.getElementById('form').submit(); return confirm('¿Estás seguro de eliminar esta solicitud?')">
                              <i class="tiny material-icons"
                              style="color: red;font-size: 18px; line-height:1.9;">close</i></a>
                          </form>
                        </div>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>



  </div>
@endsection

@push('styles')
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"> --}}
    <link rel="stylesheet" href="/adminlte/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush
@push('scripts')
  {{-- <script src="/jquery/hola.js" type="text/javascript"></script> --}}

  {{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script> --}}
  <script src="/adminlte/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/adminlte/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    } );
    $('#example2').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    } );
    $('#example3').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    } );

} );
</script>


@endpush
