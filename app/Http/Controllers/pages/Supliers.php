<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class Supliers extends Controller
{
  public function index()
  {
    $supliers = Supplier::all();
    return view('content.pages.suppliers', ['supliers' => $supliers]);
  }
  public function create()
  {
    return view('content.pages.suppliers-create');
  }
  public function store(Request $request)
  {
      $validator = $request->validate([
          'name' => 'required',
      ]);
      $supliers = new Supplier();
  
      $supliers->name = $request->name;
      $supliers->name_company = $request->name_company;
      $supliers->lastname_p = $request->lastname_p;
      $supliers->lastname_m = $request->lastname_m;
      $supliers->email = $request->email;
      $supliers->telf = $request->telf;
      $supliers->address = $request->address;
      $supliers->city = $request->city;
      $supliers->nit = $request->nit;
      $supliers->save();
  
      return view('content.pages.pages-suppliers', ['supliers' => $supliers]);
  }
  public function show($suplier_id)
  {
    $supliers=Supplier::find($suplier_id);
    return view('content.pages.suppliers-show',['supliers'=>$supliers]);
  }
  public function update(Request $request)
  {
    $supliers = Supplier::find($request->suplier_id);
    $supliers->name = $request->name;
    $supliers->name_company = $request->name_company;
    $supliers->lastname_p = $request->lastname_p;
    $supliers->lastname_m = $request->lastname_m;
    $supliers->email = $request->email;
    $supliers->telf = $request->telf;
    $supliers->address = $request->address;
    $supliers->city = $request->city;
    $supliers->nit = $request->nit;
    $supliers->save();

    return redirect()->route('pages-supliers');
  }
  public function destroy($suplier_id){
    $supliers=Supplier::find($suplier_id);
    $supliers->delete();
    return redirect()->route('pages-supliers');
  }
  public function switch ($suplier_id)
  {
    $supliers = Supplier::find($suplier_id);
    $supliers->active = !$supliers->active;
    $supliers->save();

    return redirect()->route('pages-supliers');
  }
  public function list()
  {
    $supliers = Supplier::all();
    return view('content.pages.suppliers-list', ['supliers' => $supliers]);
  }
}
