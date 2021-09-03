<template>
    <div  >
        <div   v-for="(prospect, index) in prospects" :key="prospect.id">
            <div class="row prospect" v-if="show == index">
                <div class="col-md-12">
                    {{prospect.name}}
                </div>
                <div class="col-md-6">
                    <button class="btn btn-outline-info" @click="swipe('0',prospect.id)">NO</button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" @click="swipe('1',prospect.id)">SI</button>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
import { mapState , mapMutations, mapGetters , mapActions} from 'vuex'

export default {
    data: () => ({
        show:0,
        prospects:[]
    }),
    methods:{
        ...mapActions(['newFusion']),
        getProspects(){
            axios.post('prospects').then(res=>{
                console.log(res)
                this.prospects = res.data
            })
        },
        swipe(move,target_id){
            axios.post('swipe',{move,target_id}).then(res=>{
                console.log(res)
                if(res.data.result == 1){
                    alert('match')
                    this.newFusion(res.data.fusion)
                }
                this.show++
            })
        }
    },
    created(){
        this.getProspects()
    }
}
</script>

<style lang="scss" scoped>
    .prospect{
        height: 129px;
        border: 1px solid #d7b3ff;
    }
</style>

</style>
