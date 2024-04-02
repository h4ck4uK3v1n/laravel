@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Proveedores')

@section('content')
<h4>Administracion de Proveedores</h4>
<div class="card">
  <h5 class="card-header">Proveedores</h5>
  <div class="table-responsive text-nowrap">
    <a href="{{route('pages-supliers-create')}}" class="btn btn-primary">Anadir un nuevo proveedor</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Ciudad</th>
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
          <td>{{$suplier->city}}</td>
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
