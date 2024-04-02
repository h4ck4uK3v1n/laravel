<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportMaterial;
use Illuminate\Support\Facades\Storage;
use App\Models\Material;
use Pdf;

class ReportsM extends Controller
{
    //
    public function index(){
        $reports=ReportMaterial::all();

        return view ('content.pages.reports-M',['reports'=>$reports]);
    }
    public function create(){
        $materials=Material::all();        
        // view()->share('devices',$devices);
        $date = now()->format('Y-m-d_H-i-s');
        $pdf = Pdf::loadView('pdf.materials',compact('materials'));

        Storage::put('public/pdf/'.$date.".pdf", $pdf->output());
        $report=new ReportMaterial();
        $report->url=$date.".pdf";
        $report->save();    
        
        return redirect ()->route('pages-reports-M');
    }
    public function delete($id){
        $report =ReportMaterial::find($id);
        Storage::delete('public/pdf/'.$report->url);
        
        $report->delete();
        return redirect ()->route('pages-reports-M');
    }
    public function download($fileName)
    {
        $filePath = storage_path('app/public/pdf/' . $fileName);

        if (file_exists($filePath)) {
            return response()->download($filePath, $fileName);
        } else {
            // Manejar el error si el archivo no existe
            return redirect()->back()->with('error', 'El archivo de pdf no se encuentra disponible.');
        }
    } 
}
