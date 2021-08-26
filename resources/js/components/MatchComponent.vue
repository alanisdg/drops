<template>
    <div>
        <div class="match w100" v-for="(match) in matches" :key="match.id">
            <svg   fill="currentColor" class="online" viewBox="0 0 16 16">
                <circle cx="8" cy="8" r="8"/>
            </svg>
            {{match.match.name}}
            <button class="btn btn-sm btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"/>
            </svg>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        matches:[]
    }),
    methods:{
        getMatches(){
            axios.post('matches').then(res=>{
                this.matches = res.data
            })
        }
    },
    created(){
        this.getMatches()
    },
    props: ["foo"],
    mounted: function () {
        window.Echo.channel("my-channel").listen("SampleEvent", (d) => console.log(d));
    }
}
</script>

<style>

</style>
