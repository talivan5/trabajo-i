export default {
    state: {
        estacions: [],
    },
    mutations: {
        setEstacions(state, estacions) {
            state.estacions = estacions;
        }
    },
    actions: {
        getEstacions({ commit }){
            axios.get(`api/estacions`).then(response => {
                commit('setEstacions',response.data.estacions)

            }).catch(error => {
                console.error(error)
            });
        },
        addEstacion({ dispatch }, data){
            axios.post('api/estacions',data).then( response => {
                dispatch('getEstacions');
            }).catch(error => {
                console.log(error)
            })
        },
        editEstacion({ dispatch }, data ){
            axios.put(`api/estacions/${data.id}`,{
                nombre_estacion: data.nombre_estacion,
                provincia_localidad: data.provincia_localidad,
                municipio: data.municipio,
                fecha_inicio: data.fecha_inicio,
                fecha_fin: data.fecha_fin,
                latitud: data.latitud,
                longitud: data.longitud,
                altura: data.altura,
                imagen: data.imagen,
                tipo_estacion: data.tipo_estacion,
                datos: data.datos,
                observaciones: data.observaciones,
                estado: data.estado,
                sendor_id: data.sendor_id,
            }).then( response =>{
                dispatch('getEstacions');
            }).catch(error =>{
                console.log(error);
            })
        },
        deleteEstacion({ dispatch },id){
            axios.delete(`api/estacions/${id}`).then(response => {
                dispatch('getEstacions');
            }).catch(error => {
                console.log(error);
            })
        }
    }

}
