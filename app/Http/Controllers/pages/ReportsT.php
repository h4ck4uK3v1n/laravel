<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportType;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;
use Pdf;

class ReportsT extends Controller
{
    //
    public function index(){
        $reports=ReportType::all();

        return view ('content.pages.reports-T',['reports'=>$reports]);
    }
    public function create(){
        $types=Type::all();        
        // view()->share('devices',$devices);
        $date = now()->format('Y-m-d_H-i-s');
        $pdf = Pdf::loadView('pdf.types',compact('types'));
        Storage::put('public/pdf/'.$date.".pdf", $pdf->output());
        $report=new ReportType();
        $report->url=$date.".pdf";
        $report->save();    
        
        return redirect ()->route('pages-reports-T');
    }
    public function delete($id){
        $report =ReportType::find($id);
        Storage::delete('public/pdf/'.$report->url);
        
        $report->delete();
        return redirect ()->route('pages-reports-T');
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
