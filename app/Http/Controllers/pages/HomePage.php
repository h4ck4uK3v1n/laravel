<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Material,Supplier,Type};
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomePage extends Controller
{
  public function index()
  {
    $user=Auth::user();
    $roleifexist=DB::table('model_has_roles')->where('model_id',$user->id)->first();
    if(!$roleifexist){

      DB::table('model_has_roles')->insert([
        'role_id'=>2,
        'model_type'=>'App\Models\User',
        'model_id'=>$user->id
      ]);
    }
    
    $n_proveedores=Supplier::where('active',true)->count();
    $n_types=Type::where('active',true)->count();
    $n_materiales=Material::where('active',true)->count();
    // $n_backups=Backup::where('status','done')->count();
    // $n_reports=Report::all()->count();
    return view('content.pages.pages-home',['n_proveedores'=>$n_proveedores,'n_types'=>$n_types,
    'n_materiales'=>$n_materiales]);
  }
}
