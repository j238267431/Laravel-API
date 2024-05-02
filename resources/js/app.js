import './bootstrap';

// window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuelidate from 'vuelidate'

Vue.use(Vuelidate)
Vue.use(VueRouter);

import App from './components/App';
import Home from './components/Home';
import About from './components/About';
import Desks from './components/desks/Desks';
import ShowDesk from './components/desks/ShowDesk';

const router = new VueRouter({
   mode: 'history',
   routes:[
      {
         path: '/',
         name: 'home',
         component: Home
      },
      {
         path: '/about',
         name: 'about',
         component: About
      },
      {
         path: '/desks',
         name: 'desks',
         component: Desks
      },
      {
         path: '/desks/:deskid',
         name: 'showDesk',
         component: ShowDesk,
         props: true,
      }
   ]
})

const app = new Vue({
   el: '#app',
   components:{App},
   router,
   
})
