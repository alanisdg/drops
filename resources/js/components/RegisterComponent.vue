<template>
    <div class="modal-registration text-center">
        <div v-if="done" >Listo</div>
        <div v-for="(field) in fields" :key="field.id" >

            <div v-if="field.id == active" >

                <p class="heading">{{ field.question}}</p>
                <div v-if="field.id==2" class="center-datepicker">
                     <VueDatePicker

                        v-model="date"
                        :color="color"
                        ref="menu"
                        :max-date="new Date().toISOString().substr(0, 10)"
                        min-date="1980-01-01"
                        @onOpen="menu = true"
                        @onClose="closePicker()"
                    />
                </div>
                <div v-else>
                    <button @click="select(field,index)" class="button" v-for="(question, index) in field.values" :key="question.id">
                    {{question}}
                    </button>
                </div>

            </div>

        </div>
    </div>
</template>
<script>
export default {
    data: () => ({
        done:false,
        totalFields:0,
        date: new Date(),
        color:'#9f4fff',
        menu: false,
        active:1,
        user:[],
        fields:[],
        selectedFields:[]
    }),
    watch: {
            menu (val) {
            val && setTimeout(() => (this.$refs.menu[0].$refs.agenda.mode = 'year'));
            },
  },
    methods:{
        closePicker(){
            this.menu = false
            this.select(this.fields[1],this.date)
        },
        getUser(){
            axios.post('/user').then(res=>{
                this.user = res.data
            })

        },
        select(field,selected){
            console.log(field)
            let select = {
                name:field.name,
                value:selected
            }
            this.selectedFields.push(select)
            this.active = field.id + 1
            if(this.totalFields == field.id){
                this.done = true
                let loader = this.$loading.show();
                axios.post('/user/update',{fields:this.selectedFields}).then(res=>{
                    console.log(res)
                    loader.hide()
                    window.location ='/dashboard'
                })
            }
        },
        getFields(){
            axios.post('/user/fields').then(res=>{
                console.log(res)
                this.fields = res.data
                this.totalFields = res.data.length
            })
        }
    },
    created(){
        this.getUser()
        this.getFields()
        console.log('cargar loader')

    }
}
</script>

<style>

</style>
