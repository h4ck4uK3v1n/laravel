@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Backups: Disaster Recobery')

@section('content')
<h4>Backups del sistema</h4>
<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">Table Basic</h5>
  <div class="table-responsive text-nowrap">
    <a href="{{route('pages-backups-create')}}" class="btn btn-primary">Crear nuevo Backup</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Estado</th>
          <th>Creado en</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
       @foreach($backups as $backup)  
        <tr>
          <td>{{$backup->id}}</td>
          <td>{{$backup->status}}</td>
          <td>{{$backup->created_at}}</td>
          <td>
            <a href="{{route('pages-backups-download', $backup->name) }}">Dowloand</a> | <a href="{{route('pages-backups-destroy', $backup->id)}}">Borrar</a> </td> 
        </tr>  
    @endforeach
      </tbody>
    </table>
  </div>
</div> 
@endsection
