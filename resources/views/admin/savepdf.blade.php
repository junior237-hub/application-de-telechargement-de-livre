@extends('admin/admintemplate')
@section('contend')

<div class="container-fluid">

<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<!-- <div class="btn btn-primary my-2 ">  -->
<button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#exampleModal">
    ajouer un PDF
</button>
    
<!-- </div> -->
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
   
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>N*</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Domaine</th>
                        <th>image de couverture</th>
                        <th>document</th>
                        <th>description</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>N*</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Domaine</th>
                        <th>image de couverture</th>
                        <th>document</th>
                        <th>description</th>
                        <th>action</th>
                    </tr>
                </tfoot>
                @foreach($livre as $pdf)
                <tbody>
                    <tr>
                        <td>{{$pdf->id}}</td>
                        <td>{{$pdf->titre}}</td>
                        <td>{{$pdf->auteur}}</td>
                        <td>{{$pdf->domaine}}</td>
                        <td><img src="{{asset('storage/'.$pdf->image)}}" alt="" width="50px" height="50px"></td>
                        <td><a href="{{asset('storage/'.$pdf->fichier)}}" class="btn btn-primary">Telecharger</a></td>
                        <td>{{$pdf->desc}}</td>
                        <td>
                            <form action="{{route('delete_pdf', $pdf->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                    </tr>
                 </tbody>   
                @endforeach
                
            </table>
        </div>
    </div>
</div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enregistrement de pdf</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
  <form method="post" action="{{route('store_pdf')}}" enctype="multipart/form-data">
  @csrf    
  <div class="form-row">
    
    <div class="form-group col-md-6">
      <label for="inputPassword4">Auteur</label>
      <input type="text" name="auteur" class="form-control" id="inputPassword4" value="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">titre</label>
      <input type="text" name="titre" class="form-control" id="inputEmail4"value="">
    </div>
  </div>

  <div class="form-group mt-2">
       <select name="domaine" id="" class="custom-select">
        <label for="">selectionnez un domaine</label>
         <option value=" info">infos</option>
         <option value=" maths">maths</option>
        
       </select>
     </div>
 
  <!-- <div class="form-group">
    <label for="inputAddress2">unité </label>
    <input type="text"name="unite" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"value="">
  </div> -->
  <div class="form-group">
    <label for="inputAddress2">Image de couverture </label>
    <input type="file"name="image" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"value="">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Telecharger le PDF </label>
    <input type="file"name="fichier" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"value="">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Description </label>
    <textarea name="desc" id="" cols="30" rows="2"  class="form-control">

    </textarea>
    <!-- <input type="text"name="desc" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"value=""> -->
  </div>



  <!-- <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Default radio
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Default checked radio
  </label>
</div> -->
        

        <!-- </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button class="btn btn-primary" type="submit">Enregistrer</button>
      </div>
    </div>
  </form>

@endsection