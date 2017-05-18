import VueRouter from 'vue-router'
window.Vue = require('vue');
Vue.use(VueRouter);
window.$ = window.jQuery = require('jquery');
require('vue-resource');
require('./bootstrap');
Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});
// require('vue-resource');

//components

const AddFoodCategory = Vue.component('foodcategory', require('./components/backend/addFoodCat.vue'));
const Example = Vue.component('foodcategory', require('./components/Example.vue'));
const AdminMenu = Vue.component('adminmenu', require('./components/backend/adminMenu.vue'));

//end of components

//routers
const router = new VueRouter({
    history:true,
    mode:'history',
    routes: [
        { path: '/admin/menu', component: Example },
        { path: '/admin', component: AdminMenu }
    ]
})
//end of routers
const backend = new Vue({
    router
}).$mount('#main');