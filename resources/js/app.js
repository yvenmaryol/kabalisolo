

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import Vuetify from 'vuetify'

Vue.use(Vuetify)

//importer pour markdown
import VueSimplemde from 'vue-simplemde'
import 'simplemde/dist/simplemde.min.css'
Vue.component('vue-simplemde', VueSimplemde)
import md from 'marked'
window.md = md
// Vue.use(VueSimplemde)

import User from './Helpers/User'
window.User = User
// console.log(User.loggedIn())
// console.log(User.id())

window.EventBus = new Vue();



Vue.component('AppHome', require('./components/AppHome.vue').default);
Vue.component('AppAuth', require('./components/AppAuth.vue').default);


import router from './Router/router.js'
 
new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router,
  })

