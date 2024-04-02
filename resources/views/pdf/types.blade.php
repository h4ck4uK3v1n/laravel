<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispositivos</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <img src="https://www.aapospotosi.com/gallery_gen/f3ac9540887267a1d14a013defd46ca0_910x704_fit.png" style="width:15em" alt="">
    <h1 class="mt-3">Dispositivos</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th> 
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Serial Number</th>
                <th>Fecha de creación</th>
                <th>Fecha de actualización</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
                <tr>
                    <td>{{$type->id}}</td>
                    <td>{{$type->name}}</td>
                    <td>{{$type->description}}</td>
                    <td>{{$type->status}}</td>
                    <td>{{$type->serial_number}}</td>
                    <td>{{$type->created_at}}</td>
                    <td>{{$type->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
