<template>
  <v-card flat style="overflow-x:hidden;">
    <nav>
    <v-toolbar
      color="pink"
      dark
        extended
      flat
      style="border-radius: 20px 20px 0px 0px;"
    >
      <v-btn icon color="white"
      @click="router.go(-1)"
      >
        <v-icon>mdi-arrow-left</v-icon>
      </v-btn>
      
      <v-toolbar-title class="white--text">Mes annones</v-toolbar-title>
      <div class="flex-grow-1"></div>
          <v-menu bottom left>
            <template v-slot:activator="{ on }">
              <v-btn
                dark
                icon
                v-on="on"
              >
                <v-icon>mdi-dots-vertical</v-icon>
              </v-btn>
            </template>

          </v-menu>
    </v-toolbar>
    </nav>
     <!-- début card utilisateur -->
   <div 
   class="text-center"
   style="margin-top: -45px; z-index:100; margin-bottom: 15px" 
   >
   <v-card
    class="mx-auto"
    max-width="434"
    tile
    style=" border-radius: 20px 20px 90px 20px;"
  >
    <v-img
      height="100%"
      src="https://cdn.vuetifyjs.com/images/cards/server-room.jpg"
    >
      <v-row
        align="end"
        class="fill-height"
      >
        <v-col
          align-self="start"
          class="pa-0"
          cols="12"
        >
          <v-avatar
            class="profile white--text"
            color="pink darken-5"
            size="100"
            style="margin-top: 15px;"
          >
            <h2 class="">Offres</h2>
          </v-avatar>
        </v-col>
        <v-col class="py-0">
          <v-list-item
            color="rgba(0, 0, 0, .4)"
            dark
          >
            <!-- <v-list-item-content>
              <v-list-item-title class="title">Marcus Obrien</v-list-item-title>
              <v-list-item-subtitle>Network Engineer</v-list-item-subtitle>
            </v-list-item-content> -->
          </v-list-item>
        </v-col>
      </v-row>
    </v-img>
  </v-card>
   </div>
  <!-- Fin de la carte de l'utilisateur -->
 <annonce
    v-for="annonce in annonces"
    :key="annonce.path"
    :data = annonce
 >

 </annonce>
 </v-card>

</template>

<script>

import annonce from '../Assets/annonce'

export default {

    data(){
        return {
            annonces:{}
        }
    },
    components:{annonce},

    created(){
//     axios.get('http://localhost:8000/api/mes-annonces/offres')
//     .then(res => this.annonces = res.data.data)
//     // .catch(error => console.log(error.response.data))
//     .then(function (response) {
//     console.log(response);
//   })

axios.get('/api/mes-annonces/offres')

.then(res => this.annonces = res.data.data)
    // .catch(error => console.log(error.response.data))
    .then(function (response) {
    console.log(response);
  })

  
}


}
</script>

