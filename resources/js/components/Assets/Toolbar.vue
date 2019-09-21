<template>
    <nav>
        <v-card

    tile
  >
    <!-- <v-toolbar -->
    <v-app-bar
    app 
    dense
    color="primary"
    prominent
    fixed
    extension-height="30px"     
    shrink-on-scroll
    >
      <v-app-bar-nav-icon  @click ="drawer =!drawer"></v-app-bar-nav-icon>
      <!-- <v-app-bar-nav-icon class="hidden-md-and-up" @click ="drawer =!drawer"></v-app-bar-nav-icon> -->
      <v-toolbar-title class="white--text">Home</v-toolbar-title>

      <v-spacer></v-spacer>
      <!-- test de la modal -->
        <div class="text-center">
    <v-bottom-sheet v-model="sheet">
      <template v-slot:activator="{ on }">

        <v-btn 
      icon
      v-on="on"
      color="white"
      >
        <v-icon>mdi-magnify</v-icon>
      </v-btn>
      </template>
      <v-sheet class="text-center" height="350px">

        <v-btn
          icon
          right
          color="red"
          @click="sheet = !sheet"
        >
        <v-icon>mdi-close</v-icon>
        </v-btn>
        <div>
            <h3>Que cherchez-vous?</h3>
        </div>
      </v-sheet>
    </v-bottom-sheet>
  </div>
        <!-- fin test modal -->

      <v-btn icon color="white">
        <!-- <v-icon>mdi-heart</v-icon> -->
        <v-badge 
        color="pink"
        left
        overlap >
        <template  v-slot:badge>3</template>
        <v-icon>mdi-bell-ring</v-icon>
        </v-badge>
      </v-btn>

      <v-btn icon color="white" class="hidden-md-and-up">
        <!-- <v-icon>mdi-export</v-icon> -->
        <v-icon>mdi-view-list</v-icon>
      </v-btn>
      <v-btn  color="primary" class="hidden-xs-only">
          <span>Déconnexion</span>
        <v-icon right>mdi-export</v-icon>
      </v-btn>
    <!-- </v-toolbar> -->
    </v-app-bar>
  </v-card>

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
</template>

<script>
  export default {
    data () {
      return {
        drawer: false,
        sheet: false,
        items: [
          { title: 'Offres', icon: 'mdi-mail', route: '/' },
          { title: 'Demandes', icon: 'mdi-mail', route: '/about' },
          { title: 'Messages', icon: 'mdi-mail', route: '/messages' },
          { title: 'Mon compte', icon: 'mdi-mail', route: 'mon-compte' },
          { title: 'Déposer une annonce', icon: 'mdi-mail', route: 'deposer-une-annonce' },
          { title: 'Login', icon: 'mdi-mail', route: '/login' },
        ],
      }
    },


  }

</script>