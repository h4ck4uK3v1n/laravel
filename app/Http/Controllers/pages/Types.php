<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class Types extends Controller
{
  public function index()
  {
    $types = Type::all();
    return view('content.pages.types', ['types' => $types]);
  }

  public function create()
  {
    return view('content.pages.types-create');
  }

  public function store(Request $request)
  {
      $validator = $request->validate([
          'name' => 'required',
          'description' => 'required',
          'icon' => 'nullable|string', // Asegúrate de validar el campo icon
      ]);
  
      // Crear una nueva instancia del modelo Type
      $type = new Type();
  
      // Asignar valores a las propiedades del modelo
      $type->name = $request->name;
      $type->description = $request->description;
      $type->icon = $request->icon; // Guardar el icono
  
      // Guardar el modelo en la base de datos
      $type->save();
  
      return redirect()->route('pages-types'); // Redirige a donde necesites
  }
  
  public function show($type_id)
  {
    $type=Type::find($type_id);
    return view('content.pages.types-show',['type'=>$type]);
  }
  public function update(Request $request)
  {
    $type = Type::find($request->type_id);
    $type->name = $request->name;
    $type->description = $request->description;
    $type->icon = $request->icon;
    $type->save();

    return redirect()->route('pages-types');
  }
  public function destroy($type_id){
    $type=Type::find($type_id);
    $type->delete();
    return redirect()->route('pages-types');
  }
  public function switch ($type_id)
  {
    $type = Type::find($type_id);
    $type->active = !$type->active;
    $type->save();

    return redirect()->route('pages-types');
  }
  public function list()
  {
    $types = Type::all();
    return view('content.pages.types-list', ['types' => $types]);
  }
}
