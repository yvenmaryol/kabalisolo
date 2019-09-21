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
      <v-app-bar-nav-icon  @click ="drawer =!drawer"></v-app-bar-nav-icon>
      <v-toolbar-title class="white--text">Mon compte</v-toolbar-title>
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

            <v-list>
              <v-list-item
                v-for="(item, i) in parameter"
                :key="i"
                link
                router :to="item.route"
              >
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
    </v-toolbar>

        <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
      fixed
    >
    <v-list-item>
        <v-list-item-avatar>
          <v-img src="https://randomuser.me/api/portraits/men/78.jpg"></v-img>
        </v-list-item-avatar>
    <v-list-item-content>
          <v-list-item-title>Yven Design</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-divider></v-divider>

      <v-list-item
          v-for="item in items"
          :key="item.title"
          link
          router :to="item.route"
          v-if="item.show"
 
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
    </v-navigation-drawer>
    </nav>

   <!-- début card utilisateur -->
   <div 
   class="text-center"
   style="margin-top: -45px; z-index:100" 
   >
   <v-card
    class="mx-auto"
    max-width="434"
    tile
    style=" border-radius: 20px 20px 110px 20px;"
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
            class="profile"
            color="grey"
            size="100"
            style="margin-top: 15px;"


          >
            <v-img src="https://cdn.vuetifyjs.com/images/profiles/marcus.jpg"></v-img>
          </v-avatar>
        </v-col>
        <v-col class="py-0">
          <v-list-item
            color="rgba(0, 0, 0, .4)"
            dark
          >
            <v-list-item-content>
              <v-list-item-title class="title">Marcus Obrien</v-list-item-title>
              <v-list-item-subtitle>Network Engineer</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-col>
      </v-row>
    </v-img>
  </v-card>
   </div>
  <!-- Fin de la carte de l'utilisateur -->
    <v-row justify="center">
        <v-col class="col-xs-12 col-md-6 col-lg-4 ">
    <v-card
      class="mx-auto"
      max-width="94%"
      style="margin-top: 10px; border-radius: 10px 10px 10px 10px;"
      :elevation="2"
    >
      <v-toolbar flat
      >
        <v-toolbar-title class="grey--text">Mes annonces</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn icon color="primary">
          <v-icon>mdi-plus</v-icon>
        </v-btn>
      </v-toolbar>

      <v-divider></v-divider>

    <v-card-text>
      <div class="center--text">
      <v-btn text 
      class="mr-3 white--text"
      color="pink"
      v-for="item in annonces"
          :key="item.title"
          link
          router :to="item.route"
      >
          {{ item.title }}
          <v-icon right >{{ item.icon }}</v-icon>
      </v-btn>
      </div>

      <v-switch
          label="Me contacter par Whatsapp"
        ></v-switch>
    </v-card-text>

    </v-card>

    <v-card
      class="mx-auto"
      max-width="94%"
      style="margin-top: 10px; border-radius: 10px 10px 10px 10px;"
      :elevation="2"
    >
      <v-toolbar flat
      >
        <v-toolbar-title class="grey--text">Notifications</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn icon>
          <v-icon>mdi-apps</v-icon>
        </v-btn>
      </v-toolbar>

      <v-divider></v-divider>

    <v-card-text>

      <v-btn text class="mr-3 white--text" color="pink">
          Messages
          <v-icon right >mdi-email-open</v-icon>
      </v-btn>
      <v-btn text class="mr-3 white--text" color="pink">
          Alertes
          <v-icon right>mdi-bell-ring</v-icon>
      </v-btn>

    </v-card-text>
    </v-card>
    
        </v-col>
    </v-row>
    
  </v-card>
  
</template>

<script>
  export default {
    data () {
      return {
        drawer: false,
        sheet: false,
        items: [
          { title: 'Offres', icon: 'mdi-mail', route: '/', show:true },
          { title: 'Demandes', icon: 'mdi-mail', route: '/about', show:true },
          { title: 'Messages', icon: 'mdi-mail', route: '/messages', show: User.loggedIn() },
          { title: 'Mon compte', icon: 'mdi-mail', route: 'mon-compte', show: User.loggedIn() },
          { title: 'Déposer une annonce', icon: 'mdi-mail', route: '/auth/annonce/deposer-une-annonce', show:true },
          { title: 'Login', icon: 'mdi-mail', route: '/login', show: !User.loggedIn()},
          { title: 'Déconnexion', icon: 'mdi-mail', route: '/logout', show: User.loggedIn()},
        ],
        parameter: [
        { title: 'Mon profil', route: '/messages' },
        { title: 'Plan tarrifaire' },
        { title: 'Paramètres' },
        { title: 'Se déconnecter', route:'logout', show: User.loggedIn() },
      ],

       annonces: [
        { title: 'Offres', icon: 'mdi-mail', route: '/auth/mes-annonces-offres' },
        { title: 'Demandes', icon: 'mdi-mail', route:'/about' },
      ],
      }
    },
     created(){
      if(!User.loggedIn()){
        this.$router.push({name:'login'})
      }

      EventBus.$on('logout', () => {
          User.logout()
      })
    },


  }

</script>
