<template>
        <!-- <v-container fluid grid-list-md> -->
  <router-link :to="data.path">
  <v-card
    class="mx-auto mb-2"
    max-width="344"
    :elevation="1"
  >
    <v-list-item three-line>
      <v-list-item-avatar
        tile
        size="100"
        color="grey"
      >

      <!-- <img src="https://www.coghlans.com/images/products/products-camp-kitchen-thumb.jpg" alt=""> -->
  <v-row align="center" justify="center">
    <v-img
      src="https://scontent.flad3-1.fna.fbcdn.net/v/t1.0-9/67653825_2299914933389480_3618124473565184000_n.png?_nc_cat=104&_nc_oc=AQm7Jjh6hBbLC8q71oAfW4o-_xSYBTU4NEiDfzTvna4yypp4Nc94ZuKAbaOZt0Z4Qxo&_nc_ht=scontent.flad3-1.fna&oh=dfd55cb4e4e6d0291dbb0f8a1b5c6a85&oe=5E0FA9FC"
      lazy-src="https://picsum.photos/id/11/100/60"
      aspect-ratio="1"
      class="grey lighten-2"
      max-width="500"
      max-height="300"
    >
      <template v-slot:placeholder>
        <v-row
          class="fill-height ma-0"
          align="center"
          justify="center"
        >
          <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
        </v-row>
      </template>
    </v-img>
  </v-row>


      </v-list-item-avatar>
      <v-list-item-content>
        <div class="titre">{{data.title}}</div>
        <span class="price">{{data.price}} FCFA</span>

        <div class="">
          <span class="details">{{data.subcategory}}</span>
          <span class="details">{{data.city}}</span>
          <!-- <v-btn icon>
              <v-icon>mdi-heart</v-icon>
            </v-btn> -->
          <span class="details">{{data.created_at}}</span>
        </div>
      </v-list-item-content>

    
    </v-list-item>
  </v-card>
  </router-link>
    <!-- </v-container> -->
</template>

<script>
export default {
    props:['data']
}
</script>

<style>
  .titre{
    /* font-weight: bold; */
    font-size: 15px;
  }
  .price{
    color:rgb(243, 8, 47);
    padding-top: 0px;
    font-size: 13px;

  }
  .details{
    display:block;
    font-size: 11px;
    padding-top: none;
    margin-bottom: 3px;
  }
  v-list-item-avatar{
    margin-right:10px;
  }
</style>