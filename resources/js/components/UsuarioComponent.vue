<template>
    <div>
        <div class = "row">
            <div class = "col col-8"> 
                <h1>
                    LISTA DE USUARIOS
                </h1>
            </div> 
            
            <div class = "col col-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevo" data-whatever="@mdo">Nuevo</button>
            </div> 
        </div>
        <br>
        <br>
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre </th>
                    <th scope="col">Correo Electronico</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
            
                    <tr v-for="(usuario, $index) in usuarios" :key="usuario.id">
                        <th scope="row">{{ $index+1 }}</th>
                        <td>{{usuario.name}}</td>
                        <td>{{usuario.email}}</td>
                        <td>
                            <!-- crear boton editar -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditarModal" data-whatever="@mdo">Editar</button>
                            <!-- crear boton eliminar -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#EliminarModal" data-whatever="@mdo">Eliminar</button>
                        </td>
                    </tr>
                    
                </tbody>
        </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- colocar los campos del boton nuevo -->
            <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">CREAR USUARIO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Correo Electronico:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Registrar</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- colocar mensaje en el boton eliminar-->
            <div class="modal fade" id="EliminarModal" tabindex="-1" role="dialog" aria-labelledby="EliminarModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registro Eliminado</h5>
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
    data() {
		return {
            
            usuario: {
                id: '',
                name: '',
                email: '',
            }
        }
    },

    computed: {
        usuarios() {
        return this.$store.state.modulo_usuarios.usuarios;
        }
    },

    methods: {
        
        listarUsuarios(){
            //this.$store.dispatch('getOperadores');
            this.$store.dispatch('getUsuarios');
            console.log("estoy en el componente");
        },
       
    },
    mounted() {
        this.listarUsuarios();
         console.log("estoy en el mounted");

    }
}
</script>