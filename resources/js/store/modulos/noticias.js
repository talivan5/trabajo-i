export default {
    state: {
        noticias: [],
    },
    mutations: {
        setNoticias(state, noticias) {
            state.noticias = noticias;
        }
    },
    actions: {
        getNoticias({ commit }){
            axios.get(`api/noticias`).then(response => {
                commit('setNoticias',response.data.noticias)

            }).catch(error => {
                console.error(error)
            });
        },
        addNoticia({ dispatch }, data){
            axios.post('api/noticias',data).then( response => {
                dispatch('getNoticias');
            }).catch(error => {
                console.log(error)
            })
        },
        editNoticia({ dispatch }, data ){
            axios.put(`api/noticias/${data.id}`,{
                titulo: data.titulo,
                descripcion_corta: data.descripcion_corta,
                descripcion: data.descripcion,
                imagen: data.imagen
            }).then( response =>{
                dispatch('getNoticias');
            }).catch(error =>{
                console.log(error);
            })
        },
        deleteNoticia({ dispatch },id){
            axios.delete(`api/noticias/${id}`).then(response => {
                dispatch('getNoticias');
            }).catch(error => {
                console.log(error);
            })
        }
    }

}
