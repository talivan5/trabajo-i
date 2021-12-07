export default {
    state: {
        poblacions: [],
    },
    mutations: {
        setPoblacions(state, poblacions){
            state.poblacions = poblacions;
        }
    },
    actions: {
        getPoblacions({ commit }){
            axios.get(`api/poblacions`).then(response => {
                commit('setPoblacions',response.data.poblacions)
            }).catch(error => {
                console.error(error)
            });
        },
        addPoblacion({ dispatch }, payload){
            axios.post('api/poblacions',{
                estacion: payload.estacion,
                latitud: payload.latitud,
                longitud: payload.longitud
            }).then( response => {
                dispatch('getPoblacions');
            }).catch(error => {
                console.log(error)
            })
        },
        editPoblacion({ dispatch }, payload ){
            axios.put(`api/poblacions/${payload.id}`,{
                estacion: payload.estacion,
                latitud:  payload.latitud,
                longitud: payload.longitud,
            }).then( response =>{
                dispatch('getPoblacions');
            }).catch(error =>{
                console.log(error);
            })
        },
        deletePoblacion({ dispatch },id){
            axios.delete(`api/poblacions/${id}`).then(response => {
                dispatch('getPoblacions');
            }).catch(error => {
                console.log(error);
            })
        }
    }

}
