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
        <h5 class="mb-0">Creando un dispositivo nuevo</h5> 
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('pages-materials-store') }}" enctype="multipart/form-data">
            @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Tipo de dispositivo</label>
            <select name="type_id" class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
              @forelse ($types as $type)
              <option data-icon="bx bx-{{$type->icon}}"value="{{$type->id}}">{{$type->name}}</option>
              @empty
              @endforelse
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Sistema Operativo</label>
            <select name="supplier_id" class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
              @forelse ($suppliers as $supplier)
              <option value="{{$supplier->id}}">{{$supplier->name}}</option>
              @empty
              @endforelse
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Codigo</label>
            <input type="text" name="code" class="form-control" id="basic-default-email" placeholder="" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Nombre</label>
            <input type="text" name="name" class="form-control" id="basic-default-email" placeholder="" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Imagen</label>
            <input type="file" name="image_url" class="form-control" id="basic-default-email" placeholder="" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Descripcion</label>
            <input type="text" name="description" class="form-control" id="basic-default-email" placeholder="" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Cantidad</label>
            <input type="text" name="stock" class="form-control" id="basic-default-email" placeholder="" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Fecha Ingreso</label>
            <input type="date" name="fecha_ing" class="form-control" id="basic-default-email" placeholder="" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Responsable</label>
            <input type="text" name="responsable" class="form-control" id="basic-default-email" placeholder="" />
          </div>          
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    </div>
</div>
@endsection
