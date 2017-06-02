
// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
//  */

// require('./bootstrap');
// import router from './routes.js';
// require('./components');

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// const app = new Vue({
//     el: '#app',
//     router
// });
import VueRouter from 'vue-router'
window.Vue = require('vue');
Vue.use(VueRouter);

  import Multiselect from 'vue-multiselect'

  // register globally
  Vue.component('multiselect',Multiselect)

//components

// const AddFoodCategory = Vue.component('foodcategory', require('./components/backend/addFoodCat.vue'));
const Example = Vue.component('example', require('./components/Example.vue'));
const Apetizer = Vue.component('compapetizer', require('./components/apetizer.vue'));
const Babrage = Vue.component('comp-babrage', require('./components/babrage.vue'));
const MainCourse = Vue.component('comp-mainCourse', require('./components/maincourse.vue'));
const CategoryMenu = Vue.component('compcategory', require('./components/CategoryMenu.vue'));
const Menu = Vue.component('compmenu', require('./components/Menu.vue'));
const Account = Vue.component('comp-account', require('./components/account.vue'));

//end of components

//routers
const router = new VueRouter({
    hashbang: false,
    history: true,
    routes: [
        { path: '/abc', component: Example },
        { path: '/menu', component: Menu }
    ]
})
//end of routers
const backend = new Vue({
    router
}).$mount('#app');