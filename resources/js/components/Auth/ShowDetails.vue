<template>
    <v-card flat style="overflow-x:hidden;">
    <nav>
    <v-toolbar
      color="pink"
      dark
      flat
      style="border-radius: 0px 0px 0px 0px; z-index:100"
    >
      <v-btn icon color="white"
      @click="router.go(-1)"
      >
        <v-icon>mdi-arrow-left</v-icon>
      </v-btn>
      
      <v-toolbar-title class="white--text">{{data.title}}</v-toolbar-title>
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
    <!-- début du slide -->
    <!-- <v-system-bar lights-out></v-system-bar> -->
    <v-carousel
      :continuous="false"
      :cycle="cycle"
      :show-arrows="false"
      hide-delimiter-background
      delimiter-icon="mdi-minus"
      height="250"
      interval="10"
    >
      <v-carousel-item
        v-for="(slide, i) in slides"
        :key="i"
      >
        <v-sheet
          :color="colors[i]"
          height="100%"
          tile
        >
          <v-row
            class="fill-height"
            align="center"
            justify="center"
          >
            <div class="display-3">{{ slide }} Slide</div>
          </v-row>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
    <v-container fluid>
        <v-card-text class="headline" v-html="data.title"></v-card-text>
        <v-list-item-title class="mt-6 ml-2 pink--text">{{data.price}} Fcfa</v-list-item-title>
        <div>
            <span>{{data.subcategory}}</span>
        </div>
        <div>
            <span>{{data.city}}</span>
        </div>
        <v-list-item-title class=" ml-2 mb-2 grey--text mt-2">{{data.created_at}}</v-list-item-title>
        <v-divider></v-divider>
        <v-list-item-subtitle class="mt-4 mb-2">Description</v-list-item-subtitle>
        <v-card-text v-html="description"></v-card-text>
    </v-container>
    <v-card
    elevation="3"
    class="mt-10 mb-12"
    >

    <!-- Floting button -->

     <v-speed-dial
     v-model="fab" 
     v-if="own"   
    >
      <template v-slot:activator>
        <v-btn
          v-model="fab"
          color="blue darken-2"
          dark
          fab
          right
          absolute
        >
          <v-icon v-if="fab">mdi-close</v-icon>
          <v-icon v-else>mdi-pencil</v-icon>
        </v-btn>
      </template>
      <v-btn
        fab
        dark
        small
        color="green"
        @click="edit"
      >
        <v-icon>mdi-pencil</v-icon>
      </v-btn>
      <v-btn
        fab
        dark
        small
        color="indigo"
      >
        <v-icon>mdi-plus</v-icon>
      </v-btn>
      <v-btn
        fab
        dark
        small
        color="red"
        @click="destroy"
      >
        <v-icon>mdi-delete</v-icon>
      </v-btn>
    </v-speed-dial>

    <!-- fin floting button -->

    <v-list two-line v-if="!own">
      <v-list-item>
        <v-list-item-avatar>
          <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
        </v-list-item-avatar>
        <v-list-item-content>
          <v-list-item-title>{{data.pseudo}}</v-list-item-title>
          <v-list-item-subtitle>{{data.user_annonces_count}} annonces en ligne</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </v-list>
    </v-card>
    <!-- Fin du slide -->

    <!-- bottom navigation -->
    <!-- :value="activeBtn" -->
    <v-bottom-navigation
    grow
    color="white"
    fixed
    background-color="primary"
    class="hidden-md-and-up"
    v-if="!own"
  >
    <v-btn>
      <span>Appeler</span>
      <v-icon>mdi-phone-in-talk</v-icon>
    </v-btn>

    <v-btn>
      <span>Messagerie</span>
      <v-icon>mdi-message-text</v-icon>
    </v-btn>

    <v-btn>
      <span>Whatsapp</span>
      <v-icon>mdi-whatsapp</v-icon>
    </v-btn>
  </v-bottom-navigation>
  <!-- Fin bottom navigation -->
    </v-card>
</template>

<script>
export default {
    props:['data'],
    computed:{
      description(){
        return md.parse(this.data.description)
      }
    },
    data () {
      return {
        own : User.own(this.data.user_id),

        colors: [
          'green',
          'secondary',
          'yellow darken-4',
          'red lighten-2',
          'orange darken-1',
        ],
        cycle: false,
        slides: [
          'First',
          'Second',
          'Third',
          'Fourth',
          'Fifth',
        ],
        // activeBtn: 1,
        direction: 'top',
      fab: false,
      fling: false,
      hover: false,
      tabs: null,
      top: false,
      right: true,
      bottom: true,
      left: false,
      transition: 'slide-y-reverse-transition',
      }
      
    },

    methods:{
      destroy(){
        axios.delete(`/api/annonce/delete/${this.data.slug}`)
        .then(res => this.$router.push('/my-account'))
        .catch(error => console.log(error.response.data))
      },
      edit(){
        EventBus.$emit('startEditing')
      }
    }
}
</script>

<style>
.v-speed-dial--direction-top .v-speed-dial__list {
     flex-direction: row; 
    bottom: 100%;
}
</style>