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
    ajouter une categorie
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
                        <th>domaine</th>
                       
                        <th>action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>N*</th>
                        <th>domaine</th>
                      
                        <th>action</th>
                    </tr>
                </tfoot>
                @foreach($categories as $categorie)
                <tbody>
                    <tr>
                        <td>{{$categorie->id}}</td>
                        <td>{{$categorie->nom_categorie}}</td>
                        
                        <td>
                            <form action="" method="post">
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
        <h5 class="modal-title" id="exampleModalLabel">Enregistrement de cathegories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
  <form method="post" action="{{route('store_categorie')}}" enctype="multipart/form-data">
  @csrf    
  <div class="form-row">
    
    <div class="form-group col-md-6">
      <label for="inputPassword4">Domaine</label>
      <input type="text" name="nom_categorie" class="form-control" id="inputPassword4" value="">
    </div>
        <!-- </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button class="btn btn-primary" type="submit">Enregistrer</button>
      </div>
    </div>
  </form>
@endsection