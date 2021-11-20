<template>
    <div>
       <div class="row">
            <div class="col col-md-4" v-for="noticia in noticias" :key="noticia.id">
                <div class="card" style="width: 18rem;">                    
                    <img class="card-img-top" :src="'storage/img/noticias/'+noticia.imagen" alt="fotos" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">{{noticia.titulo}}</h5>
                        <p class="card-text" style="text-align: justify;">
                            {{noticia.descripcion_corta}}
                        </p>
                        <a href="https://boliviaesturismo.com/balneario-de-capachos-oruro-boliviaesturismo/" target="_blank" class="btn btn-success btn-lg btn-block">Su pagina</a>
                    </div>
                </div>
            </div>           
        </div>  
        <i class="fa fa-clock-o"></i>
    </div>
</template>
<script>
export default {
    computed:{
        noticias(){
            return this.$store.state.modulo_noticias.noticias;
        }
    },
    methods:{
        listaNoticias(){
            this.$store.dispatch("getNoticias");
        } 
    },
    mounted(){
        this.listaNoticias();
    }
}
</script>