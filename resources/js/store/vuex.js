
export default {

	state: {
        fusions:[],
	},

	getters: {
        getFusions(state){
            axios.post('fusions').then(res=>{
                console.log(res.data)
                state.fusions = res.data
                return state.fusions
            })
        }
	},
	actions: {
        newFusion(context,fusion){
            console.log(context)

            context.commit('AddFusion',fusion)
            console.log('nueva fusion')
        }
	},

	mutations: {
        AddFusion(state,fusion){
            console.log(state)
            console.log(fusion)
            state.fusions.push(fusion)
            console.log(state.fusions)
        }
    },
}
