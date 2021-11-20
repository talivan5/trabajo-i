export default {
    state: {
        provincias: [],
    },
    mutations: {
        setProvincias(state, provincias){
            state.provincias = provincias;
        }
    },
    actions: {
        getProvincias({ commit }){
            axios.get(`api/provincias`).then(response => {
                commit('setProvincias',response.data.provincias)

            }).catch(error => {
                console.error(error)
            });
        },
        addProvincia({ dispatch }, data){
            axios.post('api/provincias',data).then( response => {
                dispatch('getProvincias');
            }).catch(error => {
                console.log(error)
            })
        },
        editProvincia({ dispatch }, data ){
            axios.put(`api/provincias/${data.id}`,{
                nombre: data.nombre,
                descripcion: data.descripcion,
                movilidad: data.movilidad,
                latitud: data.latitud,
                longitud: data.longitud,
                imagen: data.imagen
            }).then( response =>{
                dispatch('getProvincias');
            }).catch(error =>{
                console.log(error);
            })
        },
        deleteProvincia({ dispatch },id){
            axios.delete(`api/provincias/${id}`).then(response => {
                dispatch('getProvincias');
            }).catch(error => {
                console.log(error);
            })
        }
    }

}
