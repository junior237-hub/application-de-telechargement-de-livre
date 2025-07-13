@extends('page/template')
@section('contend')

<div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
        <img class="me-3" src="../assets/brand/bootstrap-logo-white.svg" alt="" width="48" height="38" />
        <div class="lh-1">
          <h1 class="h6 mb-0 text-white lh-1">Les meilleurs livres de la semaine</h1>
          <small>Since 2011</small>
        </div>
      </div>
      <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">Suggestions</h6>

        @foreach ($livres as $livre)
       
        <div class="d-flex text-body-secondary pt-3">
          <svg aria-label="Placeholder: 32x32" class="bd-placeholder-img flex-shrink-0 me-2 rounded" height="32" preserveAspectRatio="xMidYMid slice" role="img" width="32" xmlns="http://www.w3.org/2000/svg">
            <title> </title>
            <rect width="100%" height="100%" fill="#007bff"></rect>
            <text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
          </svg>
          <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
              <strong class="text-gray-dark">{{$livre->titre}}</strong>
              <a href="{{ route('download_file', $livre->id) }}">Télecharger</a>
            </div>
            
            <p class="text-muted mb-2 mt-2">  {{$livre->desc}}</p>
            <span class="d-block">@ {{$livre->auteur}}</span>

            <a href="{{route('show_pdf', $livre->id) }}">voir plus</a>
          </div>
      
        </div>

                 

       @endforeach
        <small class="d-block text-end mt-3"><a href="#">All suggestions</a></small>
      </div>
     



@endsection