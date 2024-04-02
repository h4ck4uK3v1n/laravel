@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Devices')

@section('content')

<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">Materiales AAPOS</h5>
  <div class="table-responsive text-nowrap">
    <a href="{{route('pages-materials-create')}}" class="btn btn-primary">Añadir un nuevo Material</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Tipo</th>
          <th>Activo</th>
          <th>Creado en</th>
          <th>Actions</th>
          <th>Salida Material</th>
          <th>Imagen</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($materials as $material)  
        <tr>
          <td>{{$material->id}}</td>
          <td>{{$material->name}}</td>
          <td >
          @if($material->type && $material->type->icon)
                <span class="badge bg-primary"><i class="{{$material->type->icon}}"></i></span>
            @else
                No hay ícono asociado
            @endif
        </td>
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
          <td>
          <a href="{{route('pages-materials-show', $material->id)}}">
          <span class="badge bg-success">Editar</span>
          </a>
          | 
          <a href="{{route('pages-materials-destroy', $material->id)}}">
          <span class="badge bg-danger">Eliminar</span>
          </a>
          </td>
          <td>
        <a href="{{route('pages-materials-showw', $material->id)}}">
          <span class="badge bg-primary">Registrar Salida </span>
        </a>
        </td>
          <td>
            <img src="{{$material->image_url}}" alt="" style="max-width:20%; max-height:20%; margin:0px; padding:0px; display:block;">
          </td>
        </tr>  
    @endforeach
      </tbody>
    </table>
  </div>
</div> 
<!--/ Basic Bootstrap Table -->
@endsection
