@extends('layouts.plantilla')

@section('header')
  <a class="navbar-brand" href="#"> Lista de Solicitudes</a>
@endsection
@section('content')

  <div class="row">

<div class="col-md-12">


<main>

  <input id="tab1" type="radio" name="tabs" checked>
  <label for="tab1">En curso
  @if ($cursosn >= 1)
    <span class="badge">{{$cursosn}}</span>
  @endif
  </label>

  <input id="tab2" type="radio" name="tabs">
  <label for="tab2">En cola
    @if ($noti >= 1)
    <span class="badge">{{$noti}}</span>
    @endif
  </label>

  <input id="tab3" type="radio" name="tabs">
  <label for="tab3">Finalizadas
    @if ($finalizadasn >= 1)
    <span class="badge">{{$finalizadasn}}</span>
    @endif
  </label>

  <input id="tab4" type="radio" name="tabs">
  <label for="tab4">Canceladas
    @if ($canceladasn >= 1)
    <span class="badge">{{$canceladasn}}</span>
    @endif
  </label>

  <section id="content1">

            <div class="card-content table-responsive">
                <table id="example2" class="table" style="width:100%">
                    <thead style="color: black;" class="text-primary">
                        <th>Turno</th>
                        <th>Registrado por:</th>
                        <th>Solicitante</th>
                        <th>Atiende</th>
                        <th>Tipo de Solicitud</th>
                        <th>Prioridad</th>
                        <th>Fecha</th>
                        <th>Notas</th>
                        @if (auth()->user()->role === 'admin')
                        <th>Acciones</th>
                      @endif
                    </thead>
                    <tbody>
                      @foreach ($cursos as $curso)
                      <tr>
                          <td>{{ $curso->id}}</td>
                          <td>{{ $curso->registrante}}</td>
                          <td>{{ $curso->solicitante}}</td>
                          <td>{{ $curso->atiende}}</td>
                          <td>{{ $curso->tipo}}</td>
                          <td><a href="#" class="badge badge-pill badge-success"
                            @if ($curso->prioridad === "Baja")
                            style="background-color: rgb(200, 192, 200)"
                          @elseif ($curso->prioridad === "Importante")
                            style="background-color: green;"
                          @elseif ($curso->prioridad === "Urgente")
                            style="background-color: rgb(224, 222, 17)"
                          @elseif ($curso->prioridad === "Inmediato")
                            style="background-color: red;"
                          @endif
                            >
                            {{ $curso->prioridad}}</a></td>
                          <td>{{ $curso->created_at}}</td>
                          <td>{{ $curso->notas}}</td>
                          @if (auth()->user()->role === 'admin')
                          <td>
                            <div class="" style="text-align: center;">
                              <a title="Editar solicitud" rel="tooltip" href="{{ route('edit', $curso->id) }}"><i style="color: rgb(237, 133, 47);" class="tiny material-icons"
                                >edit</i></a>
                                  {{-- <form id="form"
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
                                  </form> --}}
                              </div>
                          </td>
                        @endif
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>


  </section>

  <section id="content2">
    <div class="card-content table-responsive">

        <table id="example" class="table" style="width:100%">
          <thead style="color: black;" class="text-primary">
              <th>Turno</th>
              <th>Registrado por:</th>
              <th>Solicitante</th>
              <th>Tipo de Solicitud</th>
              <th>Prioridad</th>
              <th>Fecha</th>
              <th>Notas</th>
              @if (auth()->user()->role === 'admin')
              <th>Acciones</th>
            @endif
          </thead>
            <tbody>
              @foreach ($colas as $cola)
              <tr>
                  <td>{{ $cola->id}}</td>
                  <td>{{ $cola->registrante}}</td>
                  <td>{{ $cola->solicitante}}</td>
                  <td>{{ $cola->tipo}}</td>
                  <td><a href="#" class="badge badge-pill badge-success"
                  @if ($cola->prioridad === "Baja")
                    style="background-color: rgb(200, 192, 200)"
                  @elseif ($cola->prioridad === "Importante")
                    style="background-color: green;"
                  @elseif ($cola->prioridad === "Urgente")
                    style="background-color: rgb(224, 222, 17)"
                  @elseif ($cola->prioridad === "Inmediato")
                    style="background-color: red;"
                  @endif
                    >
                    {{ $cola->prioridad}}</a></td>
                  <td>{{ $cola->created_at}}</td>
                  <td>{{ $cola->notas}}</td>
                  @if (auth()->user()->role === 'admin')
                  <td>
                    <div class="" style="text-align: center;">
                      <a title="Editar solicitud" rel="tooltip" href="{{ route('edit', $cola->id) }}"><i style="color: rgb(237, 133, 47);" class="tiny material-icons"
                        >edit</i></a>
                        {{-- <form id="form2"
                           style="display:inline;"
                            method="POST"
                            name="forms"
                            action="{{ route('destroy', $cola->id) }}">
                              {!! csrf_field() !!}
                              {!! method_field('DELETE') !!}
                            <a title="Eliminar solicitud" rel="tooltip" href="#"
                            onclick="document.getElementById('form2').submit(); return confirm('¿Estás seguro de eliminar esta solicitud?')">
                            <i class="tiny material-icons"
                            style="color: red;font-size: 18px; line-height:1.9;">close</i></a>
                        </form> --}}
                      </div>
                  </td>
                @endif
              </tr>
              @endforeach
            </tbody>
        </table>

    </div>
  </section>

  <section id="content3">
    <div class="card-content table-responsive">

      <table id="example3" class="table" style="width:100%">
        <thead style="color: black;" class="text-primary">
          <th>Turno</th>
          <th>Registrado por:</th>
          <th>Solicitante</th>
          <th>Fecha</th>
          <th>Atendió</th>
          <th>Notas</th>
          <th>Tiempo inicial</th>
          <th>Tiempo Final</th>
          @if (auth()->user()->role === 'admin')
          <th>Acciones</th>
        @endif
        </thead>
        <tbody>
          @foreach ($finalizadas as $finalizada)
            <tr>
              <td>{{ $finalizada->id}}</td>
              <td>{{ $finalizada->registrante}}</td>
              <td>{{ $finalizada->solicitante}}</td>
              <td>{{ $finalizada->created_at}}</td>
              <td>{{ $finalizada->atiende}}</td>
              <td>{{ $finalizada->notas}}</td>
              <td>{{ $finalizada->tiempo_inicio}}</td>
              <td>{{ $finalizada->tiempo_final}}</td>
              @if (auth()->user()->role === 'admin')
              <td>
                <div class="" style="text-align: center;">
                  <a title="Editar solicitud" rel="tooltip" href="{{ route('edit', $finalizada->id) }}"><i style="color: rgb(237, 133, 47);" class="tiny material-icons"
                    >edit</i></a>
                    {{-- <form id="form3"
                       style="display:inline;"
                        method="POST"
                        name="forms"
                        action="{{ route('destroy', $finalizada->id) }}">
                          {!! csrf_field() !!}
                          {!! method_field('DELETE') !!}
                        <a title="Eliminar solicitud" rel="tooltip" href="#"
                        onclick="document.getElementById('form3').submit(); return confirm('¿Estás seguro de eliminar esta solicitud?')">
                        <i class="tiny material-icons"
                        style="color: red;font-size: 18px; line-height:1.9;">close</i></a>
                    </form> --}}
                  </div>
              </td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
  </section>

  <section id="content4">
    <div class="card-content table-responsive">

      <table id="example4" class="table" style="width:100%">
        <thead style="color: black;" class="text-primary">
          <th>Turno</th>
          <th>Registrado por:</th>
          <th>Solicitante</th>
          <th>Fecha</th>
          <th>Atendió</th>
          <th>Notas</th>

          @if (auth()->user()->role === 'admin')
          <th>Acciones</th>
        @endif
        </thead>
        <tbody>
          @foreach ($canceladas as $cancelada)
            <tr>
              <td>{{ $cancelada->id}}</td>
              <td>{{ $cancelada->registrante}}</td>
              <td>{{ $cancelada->solicitante}}</td>
              <td>{{ $cancelada->created_at}}</td>
              <td>{{ $cancelada->atiende}}</td>
              <td>{{ $cancelada->notas}}</td>

              @if (auth()->user()->role === 'admin')
              <td>
                <div class="" style="text-align: center;">
                  <a title="Editar solicitud" rel="tooltip" href="{{ route('edit', $cancelada->id) }}"><i style="color: rgb(237, 133, 47);" class="tiny material-icons"
                    >edit</i></a>
                    {{-- <form id="form3"
                       style="display:inline;"
                        method="POST"
                        name="forms"
                        action="{{ route('destroy', $cancelada->id) }}">
                          {!! csrf_field() !!}
                          {!! method_field('DELETE') !!}
                        <a title="Eliminar solicitud" rel="tooltip" href="#"
                        onclick="document.getElementById('form3').submit(); return confirm('¿Estás seguro de eliminar esta solicitud?')">
                        <i class="tiny material-icons"
                        style="color: red;font-size: 18px; line-height:1.9;">close</i></a>
                    </form> --}}
                  </div>
              </td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
  </section>



</main>
</div>

  </div>
@endsection

@push('styles')
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"> --}}
    <link rel="stylesheet" href="/adminlte/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/css/pestana.css">
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
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
    $('#example2').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
    $('#example3').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
    $('#example4').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );

} );
</script>


@endpush
