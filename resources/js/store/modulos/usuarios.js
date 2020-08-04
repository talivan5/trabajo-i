export default {
    state: {
        usuarios: [],
    },
    mutations: {
        
        setUsuarios(state, usuarios){
            state.usuarios = usuarios;
        }        
    },
    actions: {

        getUsuarios({ commit }){
            axios.get(`api/usuarios`).then(response => {
                console.log(response.data.usuarios)
                commit('setUsuarios',response.data.usuarios)
                
            }).catch(error => {
                console.error(error)
            });
        }        
    },
    getters: {

    }
}

