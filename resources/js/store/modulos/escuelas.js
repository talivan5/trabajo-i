export default {
    state: {
        escuelas: [],
    },
    mutations: {
        setEscuelas(state, escuelas){
            state.escuelas = escuelas;
        }
    },
    actions: {
        getEscuelas({ commit }){
            axios.get(`api/escuelas`).then(response => {
                commit('setEscuelas',response.data.escuelas)
            }).catch(error => {
                console.error(error)
            });
        },
        addEscuela({ dispatch }, payload){
            axios.post('api/escuelas',{
                nombre: payload.nombre,
                latitud: payload.latitud,
                longitud: payload.longitud,
                poblacion_id: payload.poblacion_id
            }).then( response => {
                dispatch('getEscuelas');
            }).catch(error => {
                console.log(error)
            })
        },
        editEscuela({ dispatch }, payload ){
            axios.put(`api/escuelas/${payload.id}`,{
                nombre: payload.nombre,
                latitud:  payload.latitud,
                longitud: payload.longitud,
                poblacion_id: payload.poblacion_id
            }).then( response =>{
                dispatch('getEscuelas');
            }).catch(error =>{
                console.log(error);
            })
        },
        deleteEscuela({ dispatch },id){
            axios.delete(`api/escuelas/${id}`).then(response => {
                dispatch('getEscuelas');
            }).catch(error => {
                console.log(error);
            })
        }
    }

}
