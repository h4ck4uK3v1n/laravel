@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Creando tipo equipo')

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
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Modificando proveedor</h5> 
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('pages-supliers-update') }}">
            @csrf
            <input type="hidden" name="suplier_id" value="{{$supliers->id}}">
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Nombre</label>
            <input type="text" name="name" value="{{$supliers->name}}" class="form-control" id="basic-default-email" placeholder="" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Nombre de Empresa</label>
            <input type="text" name="name_company" value="{{$supliers->name_company}}" class="form-control" id="basic-default-email" placeholder="" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Apellido Paterno</label>
            <input type="text" name="lastname_p" value="{{$supliers->lastname_p}}" class="form-control" id="basic-default-email" placeholder="" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Apellido Materno</label>
            <input type="text" name="lastname_m" value="{{$supliers->lastname_m}}" class="form-control" id="basic-default-email" placeholder="" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Email</label>
            <input type="email" name="email" value="{{$supliers->email}}" class="form-control" id="basic-default-email" placeholder="" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons"> Telefono</label>
            <input type="number" name="telf" value="{{$supliers->telf}}" class="form-control" id="basic-default-email" placeholder="" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Direccion</label>
            <input type="text" name="address" value="{{$supliers->address}}" class="form-control" id="basic-default-email" placeholder="" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Ciudad</label>
            <input type="text" name="city" value="{{$supliers->city}}" class="form-control" id="basic-default-email" placeholder="" />
          </div>          
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">NIT</label>
            <input type="text" name="nit" value="{{$supliers->nit}}" class="form-control" id="basic-default-email" placeholder="" />
          </div>          
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    </div>
</div>
@endsection
