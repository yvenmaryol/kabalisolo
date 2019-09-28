<template>
  <v-card flat style="overflow-x:hidden;">
    <v-toolbar
      color="primary"
      dark
   
    >
      <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->
      <v-btn icon color="white"
      @click="router.go(-1)"
      >
        <v-icon>mdi-arrow-left</v-icon>
      </v-btn>
      
    </v-toolbar>
    <v-row justify="center">
    <v-avatar color="orange" size="90" 
    style="margin-top: 45px; z-index:100" 
    class="col-xs-12"
    :elevation="8"
    >
      <!-- <span class="white--text headline">62</span> -->
      <img
        src="https://i0.wp.com/reviveyouthandfamily.org/wp-content/uploads/2013/01/headshot-placeholder.jpg?fit=600%2C600&ssl=1"
        alt="John"
      >
    </v-avatar>
    </v-row>
    <v-row justify="center">
        <v-col class="col-xs-12 col-md-6 col-lg-4 ">
    <v-card
      class="mx-auto"
      max-width="800"
      style="margin-top: -30px; border-radius: 20px 20px 90px 20px; width:90% "
      :elevation="4"
    >
      <v-toolbar flat
      >
        <v-toolbar-title class="grey--text">Se connecter</v-toolbar-title>

        <v-spacer></v-spacer>

        <v-btn icon>
          <v-icon>mdi-apps</v-icon>
        </v-btn>


      </v-toolbar>

      <v-divider></v-divider>
      
     <v-form class="container" @submit.prevent="login" >
    <v-text-field
      v-model="form.phone"
      label="Phone"
      prepend-icon="mdi-gmail"
      required
      type="number"
    ></v-text-field>
    <v-text-field
      v-model="form.password"
      prepend-icon="mdi-key"
      label="Password"
      required
      type="Password"
    ></v-text-field>
    <v-btn class="mx-8 mt-5 justify-start" type="submit">Connexion</v-btn>
  </v-form>
      <v-card-text style="height: 30px;"></v-card-text>
    </v-card>
    <v-layout flex justify-center>
        <v-btn @click="$router.push({ path: 'signup' })"  class=" mt-10 white--text" color="pink">Créer un compte</v-btn>
    </v-layout>
    
        </v-col>
    </v-row>
  </v-card>
  
</template>

<script>

  export default {

    data:() => {
      return {
        form : {
          phone:null,
          password:null,
        }

      }
    },

    created(){
      if(User.loggedIn()){
        this.$router.push({name:'account'})
      }
    },
    methods: {
  
      login(){

        User.login(this.form)
        // this.$router.push({name: 'account'})
      }
    },
  }
</script>

<style>
    .v-toolbar{
        border-radius: 20px 10px 20px 1px;
    }
</style>
