@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Devices')

@section('content')


<h4>Materiales</h4>
<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">Table Basic</h5>
  <div class="table-responsive text-nowrap">
    <a href="{{route('pages-materials-create')}}" class="btn btn-primary">Anadir un nuevo Material</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tipo</th>
          <th>Proveedor</th>          
          <th>Nombre Material</th>
          <th>Descripcion</th>          
          <th>Activo</th>
          <th>Creado en</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($materials as $material)  
        <tr>
          <td>{{$material->id}}</td>
          <td >
          @if($material->type && $material->type->icon)
                <span class="badge bg-primary"><i class="{{$material->type->icon}}"></i></span>
            @else
                No hay ícono asociado
            @endif
        </td>
        <td>Jose</td>
        <td>{{$material->name}}</td>
        <td>{{$material->description}}</td>
          <td>
            @if($material->active)
            <a href="{{ route ('pages-materials-switch',$material->id)}}">
              <span class="badge bg-primary">Activo</span>
            </a>
            @else
            <a href="{{ route ('pages-materials-switch',$material->id)}}">
              <span class="badge bg-danger">Inactivo</span>
            </a>
            @endif
          </td>
          <td>{{$material->created_at}}</td>
          <td><a href="{{route('pages-materials-show', $material->id)}}">Editar</a> | <a href="{{route('pages-materials-destroy', $material->id)}}">Borrar</a></td>
        </tr>  
    @endforeach
      </tbody>
    </table>
  </div>
</div> 
<!--/ Basic Bootstrap Table -->
@endsection
