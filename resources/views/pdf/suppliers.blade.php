<h1>Proveedores</h1>
<table class="table">
    <thead>
        <tr>
        <td>ID</td> 
        <td>Nombre</td>
        <td>Descripcion</td>
        <td>Estado</td>
        <td>Serial Number</td>
        <td>Fecha de creacion</td>
        <td>Fecha de actualizacion</td>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @foreach($suppliers as $supplier)
            <tr>
                <td>{{$suppliers->id}}</td>
                <td>{{$suppliers->name}}</td>
                <td>{{$suppliers->description}}</td>
                <td>{{$suppliers->status}}</td>
                <td>{{$suppliers->serial_number}}</td>
                <td>{{$suppliers->created_at}}</td>
                <td>{{$suppliers->updated_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>