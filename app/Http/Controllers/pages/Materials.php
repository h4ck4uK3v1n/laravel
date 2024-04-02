<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Supplier;
use App\Models\Type;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Materials extends Controller
{
  public function index()
  {
    $materials = Material::all();
    return view('content.pages.materials', ['materials' => $materials]);
  }

  public function create()
  {
    $suppliers=Supplier::where('active',true)->get();
    $types=Type::where('active',true)->get();
    return view('content.pages.materials-create',['suppliers'=>$suppliers,'types'=>$types]);
  }

  public function store(Request $request)
  {
      $validator = $request->validate([
          'name' => 'required'        
        ]);

      $material = new Material();
      $material->name = $request->name;
      $material->description = $request->description;
      $material->supplier_id = $request->supplier_id;
      $material->type_id = $request->type_id;
      $material->code = $request->code;
      $material->stock=$request->stock ?? null;
      $material->stock=$request->stock_total ?? null;  
      $material->costo=$request->costo ?? null; 
      $material->stock=$request->stock ?? 1;
      $material->fecha_ing=$request->fecha_ing ?? null;
      $material->reponsable=$request->responsable ?? null;
      $material->save();
  
      return redirect()->route('pages-materials'); // Redirige a donde necesites
  }
  
  public function show($material_id)
  {
    $material=Material::find($material_id);
    $suppliers=Supplier::where('active',true)->get();
    $types=Type::where('active',true)->get();
    return view('content.pages.materials-show',['material'=>$material,'suppliers'=>$suppliers,'types'=>$types]);
  }
  public function update(Request $request)
  {
    $validator = $request->validate([
      'name' => 'required'        
  ]);

  $material = Material::find($request->material_id);
  
  if (!$material) {
      // Si no se encuentra el material, puedes redirigir con un mensaje de error o manejarlo de alguna otra manera
      return redirect()->route('pages-materials')->with('error', 'El material no se encontró.');
  }

  if($request->hasFile('fileLogo')){
      $file = $request->file('fileLogo');
      $name = time() . $file->getClientOriginalName();
      $filePath = '/public/' . $name;
      Storage::put($filePath, file_get_contents($file));

      $url = Storage::url($filePath);
      $array = explode('/storage//public/', $url);

      $material->image_url = '/storage/' . $array[1];
  }
    $material->name = $request->name;
    $material->description = $request->description;
    $material->supplier_id = $request->supplier_id;
    $material->type_id = $request->type_id;
    $material->code = $request->code;
    $material->stock=$request->stock ?? null; 
    $material->costo=$request->costo ?? null; 
    $material->stock=$request->stock ?? 1;
    $material->fecha_ing=$request->fecha_ing ?? null;
    $material->reponsable=$request->responsable ?? null;
    $material->save();
    
    $material->save();

    return redirect()->route('pages-materials');
  }
  public function destroy($material_id){
    $material=Material::find($material_id);
    $material->delete();
    return redirect()->route('pages-materials');
  }
  public function switch ($material_id)
  {
    $material = Material::find($material_id);
    $material->active = !$material->active;
    $material->save();

    return redirect()->route('pages-materials');
  }
  public function list()
  {
    $materials = Material::all();
    return view('content.pages.materials-list', ['materials' => $materials]);
  }
  public function showw($material_id)
  {
    $material=Material::find($material_id);
    $suppliers=Supplier::where('active',true)->get();
    $types=Type::where('active',true)->get();
    return view('content.pages.materials-salida',['material'=>$material,'suppliers'=>$suppliers,'types'=>$types]);
  }
  public function SalidaM(Request $request)
  {
    $validator = $request->validate([
      'name' => 'required'        
  ]);
  $material = Material::find($request->material_id);
  if (!$material) {
      // Si no se encuentra el material, puedes redirigir con un mensaje de error o manejarlo de alguna otra manera
      return redirect()->route('pages-materials')->with('error', 'El material no se encontró.');
  }

  if($request->hasFile('fileLogo')){
      $file = $request->file('fileLogo');
      $name = time() . $file->getClientOriginalName();
      $filePath = '/public/' . $name;
      Storage::put($filePath, file_get_contents($file));

      $url = Storage::url($filePath);
      $array = explode('/storage//public/', $url);

      $material->image_url = '/storage/' . $array[1];
  } 
    $material->stock_total=$request->stock_total;
    $material->costo = $request->costo;
    $material->fecha_sal = $request->fecha_sal;
    $material->unidad = $request->unidad;
    $material->entregado_a = $request->entregado_a;
    $material->Nro_Factura = $request->Nro_Factura;

    $material->save();
    
    $material->save();

    return redirect()->route('pages-materials');
  }
}
