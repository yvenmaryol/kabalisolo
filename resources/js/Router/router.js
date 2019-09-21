import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


import Login from '../components/Auth/Login'
import Logout from '../components/Auth/Logout'
import Signup from '../components/Auth/Signup'
import Account from '../components/Auth/Account'
import Offres from '../components/Auth/Offres'
import Create from '../components/Auth/Create'
import Details from '../components/Assets/details'

const routes = [
  { path: '/login', component: Login, name: 'login' },
  { path: '/logout', component: Logout },
  { path: '/signup', component: Signup },
  { path: '/my-account', component: Account, name: 'account' },
  { path: '/auth/mes-annonces-offres', component: Offres, name: 'offres' },
  { path: '/auth/annonce/deposer-une-annonce', component: Create, name: 'create' },
  { path: '/mes-annonces/details/:slug', component: Details, name: 'details' },
]


const router = new VueRouter({
  routes, // short for `routes: routes`
  hashbang:false,
  mode: 'history'
})

export default router

  