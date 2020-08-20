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
        addProvincia({ dispatch }, payload ){
            axios.post(`api/provincias`,{
                nombre: payload.nombre,
                descripcion: payload.descripcion,
                movilidad: payload.movilidad,
                latitud: payload.latitud,
                longitud: payload.longitud,
               // imagen: payload.imagen
            }).then( response => {
                dispatch('getProvincias');
            }).catch(error => {
                console.log(error)
            })
        },
        editProvincia({ dispatch }, payload ){
            axios.put(`api/provincias/${payload.id}`,{
                nombre: payload.nombre,
                descripcion: payload.descripcion,
                movilidad: payload.movilidad,
                latitud: payload.latitud,
                longitud: payload.longitud,
                //imagen:payload.imagen
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
