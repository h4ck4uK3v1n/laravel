@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reportes en pdf')

@section('content')
<h4>Reportes</h4>
<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">Table Basic</h5>
  <div class="table-responsive text-nowrap">
    <a href="{{route('pages-reports-M-create')}}" class="btn btn-primary">Crear nuevo reporte de Materiales
    </a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Creado en</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
       @foreach($reports as $report)  
        <tr>
          <td>{{$report->id}}</td>
          
          <td>{{$report->created_at}}</td>
          <td>
            <a href="{{route('pages-reports-M-download', $report->url) }}">Dowloand</a> | <a href="{{route('pages-reports-M-destroy', $report->id)}}">Borrar</a> </td> 
        </tr>  
    @endforeach
      </tbody>
    </table>
  </div>
</div> 
<!--/ Basic Bootstrap Table -->
@endsection
