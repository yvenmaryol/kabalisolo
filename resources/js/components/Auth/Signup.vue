<template>
     <v-card flat style="overflow-x:hidden;">
    <v-toolbar
      color="primary"
      dark
      extended
      flat
      style="border-radius: 20px 20px 0px 0px;"
    >
      <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->
      <v-btn icon color="white"
      @click="router.go(-1)"
      >
        <v-icon>mdi-arrow-left</v-icon>
      </v-btn>
    </v-toolbar>
    <v-row justify="center">
    <v-avatar color="orange" size="70" 
    style="margin-top: -85px; z-index:100" 
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
      style="margin-top: -40px; border-radius: 20px 20px 110px 20px;"
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
      
     <v-form class="container" @submit.prevent="signup" >
    <v-text-field
      v-model="form.pseudo"
      label="Pseudo"
      prepend-icon="mdi-gmail"
      required
      type="text"
    ></v-text-field>
    <span class="red--text" v-if="errors.pseudo">{{errors.pseudo[0]}}</span>

    <v-text-field
      v-model="form.phone"
      label="Phone"
      prepend-icon="mdi-gmail"
      required
      type="number"
    ></v-text-field>
        <span class="red--text" v-if="errors.phone">{{errors.phone[0]}}</span>

    <v-text-field
      v-model="form.password"
      prepend-icon="mdi-key"
      label="Password"
      required
      type="Password"
    ></v-text-field>
        <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>

    <v-text-field
      v-model="form.password_confirmation"
      prepend-icon="mdi-key"
      label="Confirmer le mot de passe"
      required
      type="Password"
    ></v-text-field>
        <!-- <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span> -->
    <v-btn class="mx-8 mt-5 justify-start" type="submit">Créer un compte</v-btn>
  </v-form>
      <v-card-text style="height: 30px;"></v-card-text>
    </v-card>
    <v-layout flex justify-center>
        <v-btn @click="$router.push({ path: 'login' })"  class=" mt-10 white--text" color="pink">Se connecter</v-btn>
    </v-layout>
    
        </v-col>
    </v-row>
  </v-card>
</template>

<script>

export default {
        data(){
            return {
                form:{
                    pseudo:null,
                    phone:null,
                    password:null,
                    password_confirmation:null,
                },
                errors:{

                }
            }
        },
        
         created(){
            if(User.loggedIn()){
                this.$router.push({name:'account'})
            }
        },

        methods:{
            signup(){
                axios.post('http://localhost:8000/api/auth/signup', this.form)
                .then(res => {
                    User.responseAfterLogin(res)
                    this.$router.push({name: 'account'})
                })
                .catch(error  => this.errors = error.response.data.errors)
            }
        }
}
</script>