<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\livre;
use Illuminate\Support\Facades\Storage; // Fixed typo in 'Storage'
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Response;
use Smalot\PdfParser\Parser;
// use Barryvdh\DomPDF\Facade\Pdf;


class userController extends Controller
{
    public function user_page(){
        $livres = livre::latest()->paginate(5);
        return view('page/index',compact('livres'));
        }

        public function recherche() {
            $rech = request()->input('rech');
            $livres = livre::where('titre', 'like', '%' . $rech . '%')
                        ->orWhere('desc', 'like', '%' . $rech . '%')
                        ->orWhere('auteur', 'like', '%' . $rech . '%')
                        ->paginate(0);

            return view('page/index', compact('livres'));
          }

          public function download($fileId){
            $file = livre::where('id', $fileId)->firstOrFail();
            $filePath = 'app/public/' . $file->fichier;
          //  dd($filePath);
            if (file_exists(storage_path($filePath))) {
                return response()->download(storage_path($filePath));
            } else {
                return redirect()->back()->with('error', 'File not found.');
            }
          }

          public function show($fileId){
            $file=livre::where('id',$fileId)->firstOrFail();
            // $filePath = 'app/public/' . $file->fichier;
            return view('page/show',compact('file'));
          }
}


