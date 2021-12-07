import { error } from "jquery";

export default {
    state: {
        sensors: [],
    },
    mutations: {
        setSensors(state, sensors){
            state.sensors = sensors;
        }
    },
    actions: {
        getSensors({ commit }){
            axios.get(`api/sensors`).then(response => {
                commit('setSensors',response.data.sensors)
            }).catch(error => {
                console.error(error)
            });
        },
        addSensor({ dispatch }, payload ){
            axios.post(`api/sensors`,{
                nombre: payload.nombre,
                descripcion: payload.descripcion,
                estacion_id: payload.estacion_id
            }).then(response => {
                dispatch('getSensors');
                console.log(payload);
            }).catch(error =>{
                console.log(error);
            })
        },
        editSensor({dispatch},payload){
            axios.put(`api/sensors/${payload.id}`,{
                nombre: payload.nombre,
                descripcion: payload.descripcion,
                estacion_id: payload.estacion_id
            }).then(response => {
                dispatch('getSensors');
            }).catch(error => {
                console.log(error);
            })
        },
        deleteSensor({dispatch},id){
            axios.delete(`api/sensors/${id}`).then(response => {
                dispatch('getSensors');
            }).catch(error=>{
                console.log(error);
            })
        }
    }
}

