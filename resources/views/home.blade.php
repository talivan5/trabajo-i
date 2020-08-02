@extends('layouts.app')
@section('content')
<div class="container">
   <!-- cars de imagenes y comentarios -->
      
        <div class="row">
          <div class="col col-md-3">
            <div class="card" style="width: 15rem;">
               <img src="{{ asset('img/toledo1.jpg')}}" class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">SABAYA</h5>
                     <p class="card-text">Sabaya es una población y municipio rural de Bolivia, ubicado en la Provincia Sabaya del Departamento de Oruro...</p>
                  <a href= "provincias" class="btn btn-primary">Ver Detalle</a>
               </div>
            </div>
          </div>
          
          <div class="col col-md-3">
            <div class="card" style="width: 15rem;">
               <img src="{{ asset('img/toledo1.jpg')}}" class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" data-toggle="modal" data-target="#detalleModal" class="btn btn-primary">Ver Detalle</a>
               </div>
            </div>
          </div>

          <div class="col col-md-3 ">
            <div class="card" style="width: 15rem;">
               <img src="{{ asset('img/toledo1.jpg')}}" class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" data-toggle="modal" data-target="#detalleModal" class="btn btn-primary">Ver Detalle</a>
               </div>
            </div>
          </div>

          <div class="col col-md-3">
            <div class="card" style="width: 15rem;">
               <img src="{{ asset('img/toledo1.jpg')}}" class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="provincias" class="btn btn-primary">Ver Detalle</a>
               </div>
            </div>
          </div>
        </div>

</div>
@endsection
