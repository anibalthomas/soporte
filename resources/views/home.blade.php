@extends('layouts.plantilla')

@section('header')
  <a class="navbar-brand" href="#"> Inicio </a>
@endsection
@section('content')



<div class="row">
  <div class="col-lg-8">

    <div class="col-lg-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="blue">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <p class="category">Solicitudes en curso</p>
                <h3 class="title">{{$cursos}}

                </h3>
            </div>

        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="yellow">
                <i class="material-icons">watch_later</i>
            </div>
            <div class="card-content">
                <p class="category">Solicitudes en espera</p>
                <h3 class="title">{{$colas}}</h3>
            </div>

        </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">
                <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="card-content">
                <p class="category">Solicitudes Terminadas</p>
                <h3 class="title">{{$finalizadas}}</h3>
            </div>

        </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">
                <i class="material-icons">cancel</i>
            </div>
            <div class="card-content">
                <p class="category">Solicitudes Canceladas</p>
                <h3 class="title">{{$canceladas}}</h3>
            </div>

        </div>
    </div>

  </div>

  <div class="col-lg-4">
    <div class="card card-profile">
      <div class="card-avatar">
        <a href="#">
          <img class="img" src="/material2/img/faces/{{ Auth::user()->name }}.jpg" />
        </a>
      </div>
      <div class="content">
      <div class="content">
        <h6 class="category text-gray">{{ Auth::user()->cargo }}</h6>
        <h4 class="card-title">{{ Auth::user()->name }} {{ Auth::user()->apellido }}</h4>
<br>
<br>
<br>
<br>
      </div>
    </div>
  </div>

</div>


<div class="row">




</div>

@endsection
@push('scripts')
 {{-- <script src="../material2/js/jquery-3.2.1.min.js" type="text/javascript"></script> --}}

@endpush
