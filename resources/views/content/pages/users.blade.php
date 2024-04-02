@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Usuarios')

@section('content')
<h4>Usuarios de la aplicación</h4>

<!-- Basic Bootstrap Table -->
@role('admin')
<div class="card">
  <h5 class="card-header">Tabla Básica</h5>
  <div class="table-responsive text-nowrap">
    <a href="{{route('pages-users-create')}}" class="btn btn-primary">Añadir un nuevo usuario</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Rol</th>
          <th>Creado en</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($users as $user)  
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>
            @if($user->hasRole('admin'))
            <a href="{{route ('pages-users-switch-role',$user->id) }}">
              <span class="badge bg-primary">Administrador</span>
            </a>
            @elseif($user->hasRole('tecnica'))
            <a href="{{route ('pages-users-switch-role',$user->id) }}">
              <span class="badge bg-success">Técnica</span>
            </a>
            @elseif($user->hasRole('almacen'))
            <a href="{{route ('pages-users-switch-role',$user->id) }}">
              <span class="badge bg-warning">Almacén</span>
            </a>
            @else
            <a href="{{route ('pages-users-switch-role',$user->id) }}">
              <span class="badge bg-secondary">no Asignado</span>
          </a>
            @endif
          </td>
          <td>{{$user->created_at}}</td>
          <td>
            <a href="{{route('pages-users-show', $user->id)}}">Editar</a> | 
            <a href="{{route('pages-users-destroy', $user->id)}}">Borrar</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div> 
@endrole

@role('tecnica')
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Acceso Denegado</h4>
  <p>No tienes permisos para acceder a esta sección de la página</p>
  <hr>
  <p class="mb-0">Si crees que es un error, ponte en contacto con el administrador</p>
</div>
@endrole

@role('almacen')
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Acceso Denegado</h4>
  <p>No tienes permisos para acceder a esta sección de la página</p>
  <hr>
  <p class="mb-0">Si crees que es un error, ponte en contacto con el administrador</p>
</div>
@endrole

<!--/ Basic Bootstrap Table -->
@endsection
