<template>
    <div>
        <div class = "row">
            <div class = "col col-8"> 
                <h1>
                    LISTA DE PROVINCIAS
                </h1>
            </div> 
            
            <div class = "col col-4">
                <a href="registrar" class="btn btn-primary" >Nuevo</a>
                
            </div> 
        </div>
        <br>
        <br>
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre </th>
                    <th scope="col">Movilidad</th>
                    <th scope="col">Latitud</th>
                    <th scope="col">Longitud</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>sabaya</td>
                        <td>buses</td>
                        <td>64.43254</td>
                        <td>32.9798</td>
                        <td>adsgadfvdafvadf</td>
                        <td>
                            <!-- crear boton editar -->
                            <a class="btn btn-warning" href="editar">Editar</a>
                            <!-- crear boton eliminar -->
                            <button href="provincias" class="btn btn-danger" data-toggle="modal" data-target="#EliminarModal" data-whatever="@mdo">Eliminar</button>
                            <!--<a href= "provincias" class="btn btn-secondary" >Eliminar</a>-->
                        </td>
                    </tr>
                    
                </tbody>
        </table>
        
           
            <!-- colocar mensaje en el boton eliminar-->
            <div class="modal fade" id="EliminarModal" tabindex="-1" role="dialog" aria-labelledby="EliminarModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Provincia Eliminada</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Se elimino correctamente
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                    </div>
                    </div>
                </div>
            </div>
    </div>
</template>
<script>
export default {
    
}
</script>