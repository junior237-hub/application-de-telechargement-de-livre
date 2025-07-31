<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\livre;
use App\Models\categories;
use Illuminate\Support\Facades\Storage; // Fixed typo in 'Storage'
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Response;
use Smalot\PdfParser\Parser;
use Illuminate\Pagination\Paginator;
// use Barryvdh\DomPDF\Facade\Pdf;


class userController extends Controller
{
    public function user_page(){
        $livres = livre::latest()->paginate(5);
        $categories = categories::all();
        return view('page/index',compact('livres', 'categories'));
        }

        public function recherche() {
            $rech = request()->input('rech');
            $livres = livre::where('titre', 'like', '%' . $rech . '%')
                        ->orWhere('desc', 'like', '%' . $rech . '%')
                        ->orWhere('auteur', 'like', '%' . $rech . '%')
                        ->paginate(0);
            // $livres->appends(['rech' => $rech]); // Pour conserver la requête de recherche dans les liens de pagination
            $categories = categories::all();
            return view('page/index', compact('livres', 'categories'));
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

//      public function donnee_cat()
// {
//     // Récupération de l'ID de la catégorie depuis l'URL
//     $categorie_id = $_GET['categorie_id'] ?? null;
//   // dd($categorie_id);
//     // Toutes les catégories (pour affichage par exemple dans un menu déroulant)
//     $categories = categories::all();
//     // $categories = categories::where('id', $categorie_id)->get();

   
//     // Si une catégorie est choisie, on filtre les livres
//     if ($categorie_id) {
//         $livres = livre::where('categorie_id', $categorie_id)->get();
        
//     } else {
//         $livres = livre::all(); // Si pas de filtre, on affiche tous les livres
//     }

//     return view('page/donnee', compact('categories', 'livres'));
// }

public function donnee_cat($categorieId = null)
{
    $categories = Categories::all(); // Récupère toutes les catégories

    // Si une catégorie est sélectionnée, filtre les livres par cette catégorie
    $livres = Livre::when($categorieId, function ($query, $categorieId) {
      return $query->where('categorie_id', $categorieId);
    })
    ->orderBy('created_at', 'desc')
    ->paginate(3);

    return view('page.donnee', compact('categories', 'livres', 'categorieId'));
}

    //  public function cat_user(){
    //   $categories = categories::all();
    //   return view('page/template', compact('categories'));
    // }  
    
    
          // public function donnee_cat(){

          //   $categorie_id = $_GET['categorie_id'];

          //    // Default to 1 if not set
          //   $categories = categories::where('id', $categorie_id)->get();
          //   $categories = categories::all();
          //   if($categories){
          //       $livres = livre::where('categorie_id', $categorie_id)->get();
          //   } else {
          //       $livres = livre::all();
          //   }
          //   return view('page/donnee', compact('categories', 'livres'));
          // }
            // $livres = livre::where('categorie_id', 2)->get();
          //   return view('page/donnee', compact( 'categories','livres'));
          // }

          // public function data(Request $res)
          // {
          //   $doc = categories::findOrFail($res->categorie_id);
          //     $Data = [
          //       'categorie' => $res->categorie,
              
          //     ];
          //   return view('page/donnee', compact('Data'));
          // }

        

          // public function cat(){
          //   $categories = categories::all();
          //   return view('page/template', compact('categories')); 
          // }
}


