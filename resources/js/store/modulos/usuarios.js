import { error } from "jquery";

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
                commit('setUsuarios',response.data.usuarios)
            }).catch(error => {
                console.error(error)
            });
        },
        addUsuario({ dispatch }, payload ){
            axios.post(`api/usuarios`,{
                name: payload.name,
                email: payload.email,
                password: payload.password
            }).then(response => {
                dispatch('getUsuarios');
            }).catch(error =>{
                console.log(error);
            })
        },
        editUsuario({dispatch},payload){
            axios.put(`api/usuarios/${payload.id}`,{
                name: payload.name,
                email: payload.email,
                password: payload.password
            }).then(response => {
                dispatch('getUsuarios');
            }).catch(error => {
                console.log(error);
            })
        },
        deleteUsuario({dispatch},id){
            axios.delete(`api/usuarios/${id}`).then(response => {
                dispatch('getUsuarios');
            }).catch(error=>{
                console.log(error);
            })
        }
    }
}

