@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Proveedores')

@section('content')
<h4>Listado de Proveedores</h4>
<div class="card">
  <h5 class="card-header">Proveedores</h5>
  <div class="table-responsive text-nowrap">
    <a href="{{route('pages-supliers-create')}}" class="btn btn-primary">Anadir un nuevo proveedor</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Direccion</th>
          <th>Ciudad</th>
          <th>NIT</th>
          <th>Activo</th>
          <th>Creado en</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($supliers as $suplier)  
        <tr>
          <td>{{$suplier->id}}</td>
          <td>{{$suplier->name}}</td>
          <td>{{$suplier->lastname_p}}</td>
          <td>{{$suplier->lastname_m}}</td>
          <td>{{$suplier->address}}</td>
          <td>{{$suplier->city}}</td>
          <td>{{$suplier->nit}}</td>
          <td>
            @if($suplier->active)
            <a href="{{ route ('pages-supliers-switch',$suplier->id)}}">
              <span class="badge bg-primary">Activo</span>
            </a>
            @else
            <a href="{{ route ('pages-supliers-switch',$suplier->id)}}">
              <span class="badge bg-danger">Inactivo</span>
            </a>
            @endif
          </td>
          <td>{{$suplier->created_at}}</td>
          <td><a href="{{route('pages-supliers-show', $suplier->id)}}">Editar</a> | <a href="{{route('pages-supliers-destroy', $suplier->id)}}">Borrar</a></td>
        </tr>  
    @endforeach
      </tbody>
    </table>
  </div>
</div> 

@endsection
