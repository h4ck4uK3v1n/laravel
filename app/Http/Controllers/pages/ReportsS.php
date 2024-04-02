<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportSupplier;
use Illuminate\Support\Facades\Storage;
use App\Models\Supplier;
use Pdf;

class ReportsS extends Controller
{
    //
    public function index(){
        $reports=ReportSupplier::all();

        return view ('content.pages.reports-S',['reports'=>$reports]);
    }
    public function create(){
        $suppliers=Supplier::all();        
        // view()->share('devices',$devices);
        $date = now()->format('Y-m-d_H-i-s');
        $pdf = Pdf::loadView('pdf.suppliers',compact('suppliers'));
        Storage::put('public/pdf/'.$date.".pdf", $pdf->output());
        $report=new ReportSupplier();
        $report->url=$date.".pdf";
        $report->save();    
        
        return redirect ()->route('pages-reports-S');
    }
    public function delete($id){
        $report =ReportSupplier::find($id);
        Storage::delete('public/pdf/'.$report->url);
        
        $report->delete();
        return redirect ()->route('pages-reports-S');
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
