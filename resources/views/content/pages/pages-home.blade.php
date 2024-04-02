@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<h4>Home Page</h4>
<h4>Cambios desde local</h4>

<!-- Cards with badge -->
<div class="row">
  
  <!-- Primera tarjeta: Sistemas -->
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <!-- Contenido de la tarjeta "Sistemas" -->
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-info"><i class='bx bx-edit fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Materiales</span>
        <h2 class="mb-0">{{$n_materiales}}</h2>
      </div>
    </div>
  </div>

  <!-- Segunda tarjeta: Tipos -->
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <!-- Contenido de la tarjeta "Tipos" -->
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-warning"><i class='bx bx-dock-top fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Tipos</span>
        <h2 class="mb-0">{{$n_types}}</h2>
      </div>
    </div>
  </div>

  <!-- Tercera tarjeta: Dispositivos (ajustada) -->
  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <!-- Contenido de la tarjeta "Dispositivos" -->
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-danger"><i class='bx bx-message-square-detail fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Proveedores</span>
        <h2 class="mb-0">{{$n_proveedores}}</h2>
      </div>
    </div>
  </div>

  <!-- Cuarta tarjeta: Reportes -->
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <!-- Contenido de la tarjeta "Reportes" -->
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-primary"><i class='bx bx-cube fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Reportes</span>
        <h2 class="mb-0">3</h2>
      </div>
    </div>
  </div>

  <!-- Quinta tarjeta: Backups -->
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <!-- Contenido de la tarjeta "Backups" -->
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-success"><i class='bx bx-purchase-tag fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Backups</span>
        <h2 class="mb-0">5</h2>
      </div>
    </div>
  </div>

</div>
<!--/ Cards with badge -->

@endsection
