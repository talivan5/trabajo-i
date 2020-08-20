<template>
    <div>
        <div class = "row">
            <div class = "col col-8">
                <h1>
                    LISTA DE USUARIOS
                </h1>
            </div>

            <div class = "col col-4">
                <button type="button" class="btn btn-primary" @click="abrirModal('nuevo',null)">Nuevo</button>
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
                            <button type="button" class="btn btn-warning" @click="abrirModal('editar',usuario)">Editar</button>
                            <!-- crear boton eliminar -->
                            <button type="button" class="btn btn-danger" @click="eliminarUsuario(usuario.id)">Eliminar</button>
                        </td>
                    </tr>

                </tbody>
        </table>

        <!-- modal del nuevo -->
        <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{this.title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" v-model="usuario.name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Correo Electronico:</label>
                        <input type="text" class="form-control" v-model="usuario.email">
                    </div>
                    <div class="form-group" v-if="esEdit!=false">
                        <label for="message-text" class="col-form-label">Contraseña:</label>
                        <input type="password" class="form-control" v-model="usuario.password">
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button v-if="esEdit" class="btn btn-primary" @click="agregarUsuario(usuario)">Registrar</button>
                    <button v-else class="btn btn-primary" @click="editarUsuario(usuario)">Actualizar</button>
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
                password:'',
            },
            title:"",
            esEdit:false,
        }
    },

    computed: {
        usuarios() {
        return this.$store.state.modulo_usuarios.usuarios;
        }
    },

    methods: {
        listarUsuarios(){
            this.$store.dispatch('getUsuarios');
        },
        abrirModal(tipo, usuario){
            if (tipo!="nuevo"){
                this.esEdit =false;
                this.title="Editar Usuario";
                 this.usuario = {
                    id: usuario.id,
                    name: usuario.name,
                    email: usuario.email,
                    password: usuario.password
                };

            } else {
                this.esEdit =true;
                this.title="Registrar Usuario";
                 this.usuario = {
                    id: "",
                    name: "",
                    email: "",
                    password:"",
                };
            }
            $("#nuevo").modal({ backdrop: "static", keyboard: false, show: true});
        },
        agregarUsuario(usuario){
            this.$store.dispatch('addUsuario',usuario);
            this.usuario = {
                name: usuario.name,
                email: usuario.email,
                password: usuario.password
            };
            $('#nuevo').modal('hide');
        },
        editarUsuario(usuario){
            let payload = {
                id: usuario.id,
                name: usuario.name,
                email: usuario.email,
                password: usuario.password
            };
            $('#nuevo').modal('hide');
            this.$store.dispatch('editUsuario',usuario);
        },
        eliminarUsuario(id){
            this.$store.dispatch("deleteUsuario",id);
        }

    },
    mounted() {
        this.listarUsuarios();
    }
}
</script>
