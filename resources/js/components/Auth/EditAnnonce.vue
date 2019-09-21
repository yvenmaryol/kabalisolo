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
      <v-toolbar-title class="white--text">Modifier l'annonce</v-toolbar-title>
    </v-toolbar>
    <v-row justify="center">
        <v-col class="col-xs-12 col-md-6 col-lg-6 ">
    <v-card
      class="mx-auto"
      max-width="800"
      style="margin-top: -40px; border-radius: 20px 20px 110px 20px;"
      :elevation="4"
    >
    
      <v-toolbar flat
      >
        <v-toolbar-title class="grey--text">Modifier l'annonce</v-toolbar-title>
        <v-spacer></v-spacer>
      </v-toolbar>
      <v-divider></v-divider>

    <v-form class="container" @submit.prevent="update">

    <v-text-field
      v-model="form.title"
      :counter="30"
      label="Titre de l'annonce"
      required
    ></v-text-field>
    <v-text-field
      v-model="form.price"
      label="prix"
      type="number"
      required
    ></v-text-field>
     <v-textarea
        v-model="form.description"
        auto-grow
        filled
        color="primary"
        label="Description"
        required
        rows="1"
      ></v-textarea>

    <v-select
        v-model="form.subcategory_id"
        :items="subcategories"
        item-text="name"
        item-value="id"
        :rules="[v => !!v || 'Choisissez une catégorie']"
        label="Catégorie"
        required
        class="visible-xs-only"
      ></v-select>
      <v-select
        v-model="form.city_id"
        :items="cities"
        item-text="name"
        item-value="id"
        :rules="[v => !!v || 'Choisissez une ville']"
        label="Ville"
        required
      ></v-select>

      <!-- <vue-simplemde v-model="form.description" ref="markdownEditor" /> -->

      <!-- Début combo box -->

    <!-- <v-combobox
    v-model="form.tags"
    hint="(Appuyez sur entrée pour valider)"
    label="Tags ou mots clés"
    multiple
    persistent-hint
    small-chips
  >
    <template v-slot:selection="data">
    <v-chip>
        <v-avatar
        class="accent white--text"
        left
        v-text="data.item.slice(0, 1).toUpperCase()"
        ></v-avatar>
        {{ data.item }}
    </v-chip>
    </template>
  </v-combobox> -->

      <!-- Fin combo box -->
    <v-card-actions>
        <v-btn 
        class="mx-8 mt-5 justify-start pink white--text" 
        type="submit"
        >
        <!-- <v-icon>mdi-home</v-icon> -->
        Valider
        </v-btn>
        <v-btn 
        @click="cancel"
        class="mx-8 mt-5 justify-start primary white--text" 
        >annuler</v-btn>
    </v-card-actions>
  </v-form>
      <v-card-text style="height: 30px;"></v-card-text>
    </v-card>
    <v-layout flex justify-center>
    </v-layout>
    
        </v-col>
    </v-row>
  </v-card>
  
</template>

<script>

  export default {

      props:['data'],

    data (){
        
        return {
    //   name: '',

    form : {
          title:null,
          price:null,
          subcategory_id:null, 
          city_id:null, 
          description:null,
        },
        errors:{},
        subcategories:{},
        cities:{},

    }
    },

    methods:{
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch(`/api/annonce/update/${this.form.slug}`, this.form)
            .then(res => this.cancel())
        }
    },

    created(){
        axios.get('/api/subcategory')
        .then(res => this.subcategories = res.data.data)

        axios.get('/api/cities')
        .then(res => this.cities = res.data.data)
 
    },

    // methods: {
  
    //   create(){

    //     axios.post('/api/annonce/post', this.form)
 
    //     .then(res => this.$router.push({name:'offres'}))

    //     .catch(error => this.errors = error.response.data.error)

    //   }
    // },
    created(){
        this.form = this.data
    }
    // mounted(){
    //     this.form = data
    // }

  }
</script>
