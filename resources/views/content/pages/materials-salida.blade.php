  @php
  $configData = Helper::appClasses();
  @endphp

  @extends('layouts/layoutMaster')

  @section('title', 'Salida de material')

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
          <h5 class="mb-0">Emitiendo salida de MATERIAL</h5> 
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('pages-materials-salida') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="material_id" value="{{$material->id}}">
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Tipo de material</label>
              <select  name="type_id" class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                @forelse ($types as $type)
                <option data-icon="bx bx-{{$type->icon}}" @if($type->id==$material->type_id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                @empty
                @endforelse
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-company">Proveedor</label>
              <select readonly  name="supplier_id" class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                @forelse ($suppliers as $so)
                <option readonly value="{{$so->id}}" @if($so->id==$material->sos_id) selected @endif>{{$so->name}}</option>
                @empty
                @endforelse
              </select>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Codigo</label>
              <input readonly type="text" name="code" class="form-control" id="basic-default-email" placeholder="" value="{{$material->code}}" required/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Nombre</label>
              <input readonly type="text" name="name" class="form-control" id="basic-default-email" placeholder="" required value="{{$material->name}}"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Imagen</label>
              <input readonly type="file" name="fileLogo" class="form-control" id="basic-default-fullname"/>
              <img src="{{$material->image_url}}" alt="" style="width:20%;">
            </div>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Descripcion</label>
              <input readonly type="text" name="description" class="form-control" id="basic-default-email" placeholder="" value="{{$material->description}}"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Cantidad total existente</label>
              <input readonly type="text" name="stock" class="form-control" id="basic-default-email" placeholder="" value="{{$material->stock}}"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Fecha Ingreso</label>
              <input readonly type="date" name="fecha_ing" class="form-control" id="basic-default-email" placeholder="" value="{{$material->fecha_ing}}"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Responsable</label>
              <input readonly type="text" name="responsable" class="form-control" id="basic-default-email" placeholder="" value="{{$material->reponsable}}"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Cantidad Saliente</label>
              <input type="number" name="stock" class="form-control" id="basic-default-email" placeholder=""/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Costo</label>
              <input type="number" name="costo" class="form-control" id="basic-default-email" placeholder=""/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Fecha Salida</label>
              <input type="date" name="fecha_sal" class="form-control" id="basic-default-email" placeholder=""/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Unidad</label>
              <input type="text" name="unidad" class="form-control" id="basic-default-email" placeholder=""/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Entregado A:</label>
              <input type="text" name="entregado_a" class="form-control" id="basic-default-email" placeholder=""/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="selectpickerIcons">Numero de Factura:</label>
              <input type="text" name="Nro_Factura" class="form-control" id="basic-default-email" placeholder=""/>
            </div>          
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
      </div>
  </div>
  <script>
    // Bloquear solo los campos de selección cuando se carga la página
    window.onload = function() {
        var supplierSelect = document.querySelector("select[name='supplier_id']");
        supplierSelect.disabled = true;

        var typeSelect = document.querySelector("select[name='type_id']");
        typeSelect.disabled = true;
    };
</script>

  @endsection
