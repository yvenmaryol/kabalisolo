<template>
    <div v-if="annonce">
        <edit-annonce 
        v-if="editing"
        :data = annonce
        >
        </edit-annonce>
            <show-details
            v-else
            :data = annonce
            >
            </show-details>
        </div>
</template>

<script>
import ShowDetails from '../Auth/ShowDetails'
import EditAnnonce from '../Auth/EditAnnonce'
export default {
    components:{ShowDetails, EditAnnonce},
    data(){
        return{
            annonce:null,
            editing:false
        }
    },
    created(){

        this.listen()
        this.getAnnonce()

        
    },

    methods:{
        listen(){
            EventBus.$on('startEditing', ()=> {
                this.editing = true
            })

            EventBus.$on('cancelEditing', () =>{
                this.editing = false
            })
        },

        getAnnonce(){
        axios.get(`/api/annonce/details/${this.$route.params.slug}`)
        .then(res => this.annonce = res.data.data)
    }
    },
    
}
</script>