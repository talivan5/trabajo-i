<template>
    <div>
         <h3>
            LISTA DE LAS NOTICIAS
        </h3>    
        <div class="display:flex float-right my-2">
            <button type="button" class="btn btn-primary" @click="abrirModal('nuevo',null)">
                Nuevo <i class="fa fa-file"></i>
            </button>
        </div>      
       
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>N°</th>
                        <th>Titulo</th>                    
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(noticia, $index) in noticias" :key="noticia.id">
                        <th>{{$index + 1}}</th>
                        <td>{{ noticia.titulo }}</td>
                        <td>{{ noticia.descripcion_corta }}</td>
                        <td>{{ noticia.created_at | formatDate }}</td>
                        <td>   
                            <div class="row">
                                <button class="btn btn-warning pull-left" @click="abrirModal('editar', noticia)">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-danger pull-rigth" @click="eliminarNoticia(noticia.id)">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
        </table>
        <div class="modal fade" id="nuevo">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{this.title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                        
                        <form enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Titulo</label>
                                    <input type="text" v-model="noticia.titulo" class="form-control" placeholder="Titulo de la noticia">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Descripción</label>
                                    <textarea v-model="noticia.descripcion_corta" class="form-control" placeholder="Descripción corta"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Descripción</label>
                                <textarea class="form-control" v-model="noticia.descripcion" placeholder="Descripción de la Noticia"></textarea>

                            </div>
                            <div class="form-group" v-if="esEdit!=false">
                                <label for="imagen">Foto de Referencia</label>
                                <input type="file" @change="obtenerImagen" class="form-control-file btn btn-success">
                                <br>
                                <br>
                                <figure>
                                    <img width="200" height="200" :src="imagen" alt="Foto">
                                </figure>
                            </div>
                        </form>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button v-if="esEdit" @click="agregarNoticia(noticia)" class="btn btn-primary">Guardar</button>
                        <button v-else  @click="editarNoticia(noticia)" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            noticia:{
                id: "",
                titulo: "",
                descripcion_corta:"",
                descripcion:"",
                imagen:"",
            },
            title:"Registrar Noticia",
            esEdit:false,
            imagenMineatura:"",
        }
    },
    computed:{
        noticias(){
            return this.$store.state.modulo_noticias.noticias;
        },
        imagen(){
            return this.imagenMineatura;
        }
    },
    methods:{
        listaNoticias(){
            this.$store.dispatch("getNoticias");
        },
        obtenerImagen(e){
            let file = e.target.files[0];
            this.noticia.imagen = file;
            this.cargarImagen(file);
        },
        cargarImagen(file){
            let reader = new FileReader();
            reader.onload = (e) =>{
                this.imagenMineatura = e.target.result;
            }
            reader.readAsDataURL(file);
        },
        abrirModal(tipo, noticia){
            if(tipo != "nuevo")
            {
                this.esEdit = false;
                this.title= "Editar Noticia";
                this.noticia = {
                    id: noticia.id,
                    titulo: noticia.titulo,
                    descripcion_corta: noticia.descripcion_corta,
                    descripcion: noticia.descripcion,
                    imagen: noticia.imagen
                };
            }else{
                this.esEdit = true;
                this.noticia = {
                    id: "",
                    titulo: "",
                    descripcion_corta: "",
                    descripcion: "",
                    imagen:""
                };
            }
            $("#nuevo").modal({ backdrop: "static", keyboard:false, show:true })
        },
        agregarNoticia(noticia) {
            let formData = new FormData();
            formData.append('titulo',noticia.titulo);
            formData.append('descripcion_corta',noticia.descripcion_corta);
            formData.append('descripcion',noticia.descripcion);
            formData.append('imagen',noticia.imagen);
            this.$store.dispatch("addNoticia",formData);
            this.noticia = {
                id: "",
                titulo: "",
                descripcion_corta: "",
                descripcion: "",
                imagen:""
            };
            $("#nuevo").modal("hide");
        },
        editarNoticia(noticia){
            let payload = {
                id: noticia.id,
                titulo: noticia.titulo,
                descripcion_corta: noticia.descripcion_corta,
                descripcion: noticia.descripcion,
                imagen: noticia.imagen,
            };
            this.$store.dispatch("editNoticia", payload);
            $("#nuevo").modal("hide");
        },
        eliminarNoticia(id){
            this.$store.dispatch('deleteNoticia',id);
        },
    },
    mounted(){
        this.listaNoticias();
    }
}
</script>
<style scoped>
    img {
        
        border: red 2px solid;
        display: block;
    }

</style>
