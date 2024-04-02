@php
$configData = Helper::appClasses();
@endphp



@extends('layouts/layoutMaster')

@section('title', 'Creando tipo nuevo')

@section('vendor-style')

<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-selects.js')}}"></script>
<script src="{{asset('assets/js/forms-tagify.js')}}"></script>
<script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
@endsection

@section('content')

<div class="row">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Creando un tipo nuevo</h5> 
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('pages-types-store') }}">
            @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="Cinta Metrica" required />
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Descripcion</label>
            <input type="text" name="description" class="form-control" id="basic-default-email" placeholder="Categoria de cintas" required />
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Icono</label>
            <select name="icon" class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
            <option value="bx bx-link" data-icon="bx bx-link">Tuberías y Conexiones</option>
            <option value="bx bx-slider-alt" data-icon="bx bx-slider-alt">Válvulas y Controles</option>
            <option value="bx bx-drink" data-icon="bx bx-drink">Drenajes y Desagües</option>
            <option value="bx bx-wrench" data-icon="bx bx-wrench">Herramientas de Plomería</option>
            <option value="bx bx-bath" data-icon="bx bx-bath">Accesorios de Baño</option>
            <option value="bx bx-water" data-icon="bx bx-water">Bombas y Motobombas</option>
            <option value="bx bx-fire" data-icon="bx bx-fire">Calentadores y Calderas</option>
            <option value="bx bx-cog" data-icon="bx bx-cog">Componentes de Sistema</option>
            <option value="bx bx-droplet" data-icon="bx bx-droplet">Tratamiento de Agua</option>
            <option value="bx bx-lock" data-icon="bx bx-lock">Seguridad en Plomería</option>
            <option value="bx bx-layers" data-icon="bx bx-layers">Materiales y Capas</option>
            <option value="bx bx-shield" data-icon="bx bx-shield">Protección y Prevención</option>
            <option value="bx bx-pipe" data-icon="bx bx-pipe">Pipas y Conducciones</option>
            <option value="bx bx-spray-can" data-icon="bx bx-spray-can">Selladores y Adhesivos</option>
            <option value="bx bx-flask" data-icon="bx bx-flask">Productos Químicos</option>
            <option value="bx bx-home" data-icon="bx bx-home">Instalaciones Residenciales</option>
            <option value="bx bx-building-house" data-icon="bx bx-building-house">Instalaciones Comerciales</option>
            <option value="bx bx-toolbox" data-icon="bx bx-toolbox">Kits de Plomería</option>
            <option value="bx bx-credit-card" data-icon="bx bx-credit-card">Facturación y Pagos</option>
            <option value="bx bx-book-open" data-icon="bx bx-book-open">Manuales y Documentación</option>
            <option value="bx bx-calendar" data-icon="bx bx-calendar">Programación y Citas</option>
            <option value="bx bx-user" data-icon="bx bx-user">Servicios y Clientes</option>
            </select>
          </div>          
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    </div>
</div>
@endsection
