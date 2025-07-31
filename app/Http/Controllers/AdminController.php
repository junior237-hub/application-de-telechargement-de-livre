<?php

namespace App\Http\Controllers;
use App\Models\livre;
use App\Models\categories;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {   
        $livre = livre::all();
        $categories = categories::all();
        return view('admin/savepdf', compact('livre', 'categories')); 
    }

    public function dashboard(){
        return view('admin/Aindex');
    }
  

    private function validator(){
      return request()->validate([

           'titre'=>'required',
           'auteur'=>'required',
            'desc'=>'required',
            'image'=>'required',
            'fichier' => 'required|mimes:pdf,psd,doc,txt,docx,pptx,zip,rar,tar,ia,xd,|max:524288', // Taille maximale de 512MB
            // 'domaine'=>'required',
            'categorie_id'=>'required|integer'
        
        ]);
    }

    public function store(){
     $livre = livre::create($this->validator());
     $this->StoreFichier($livre);
     $this->StoreImage($livre);
    //  dd($livre);
    return back()->with('success', 'livre ajouté avec succès');
    }

    
  
    private function StoreImage(livre $livre){
     if(request('image')){
         $livre->update([
             'image'=>request('image')->store('image','public'),
         ]);
     }
  }

   // private function StoreFichier(livre $livre){
   //    if(request('fichier')){
   //     $fichier = request('fichier');
   //     $filename = $fichier->getClientOriginalName(); // Récupère le nom original du fichier
   //     $path = $fichier->storeAs('PDF_livre', $filename, 'public'); // Enregistre le fichier avec son nom original
      
   //    }
   // }

   private function StoreFichier(livre $livre){
     if(request('fichier')){
       $fichier = request('fichier');
       $filename = $fichier->getClientOriginalName(); // Récupère le nom original du fichier
       $path = $fichier->storeAs('PDF', $filename, 'public'); // Enregistre le fichier avec son nom original
       
       $livre->update([
         'fichier' => $path,
       ]);
     }
    }
      // public function delete(livre $livre){ 
      //  $livre->delete();
       
      //   return back()->with('supprimer' , 'livre supprimé avec success');
      // }

      public function destroy($id)
     {
    $livre = livre::findOrFail($id);
    $livre->delete();
    return redirect()->back()->with('danger', 'Suppression réussie');
   }


    // public function cathegorie(){
    //     $cathegorie = request()->validate([
    //         'domaine'=>'required',
    //     ]);
    //     livre::create($cathegorie);
    //     return back();
    //   }

    public function categorie(){
      $categories = categories::all();
      return view('admin/categorie', compact('categories'));
    }

    public function destroycategorie($id)
    {
   $categories = categories::findOrFail($id);
   $categories->delete();
   return redirect()->back()->with('danger', 'Suppression réussie');
  }

    private function validator1(){
      return request()->validate([
           'nom_categorie'=>'required',
      
      ]);
    }
    public function store_categorie(){
      $categorie = categories::create($this->validator1());
      return back()->with('success', 'Catégorie ajoutée avec succès');
    }

    
}
