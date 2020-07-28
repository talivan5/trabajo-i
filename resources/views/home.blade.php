@extends('layouts.app')
@section('content')
<div class="container">
   <!-- cars de imagenes y comentarios -->
  
        <div class="row">
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
                  <a href="#" data-toggle="modal" data-target="#detalleModal" class="btn btn-primary">Ver Detalle</a>
               </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="detalleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
               <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col col md-6" >
                          hola
                        </div>
                        <div class="col col md-6">
                           adfasf
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
               </div>
            </div>
         </div>
</div>
@endsection
