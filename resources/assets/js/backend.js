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
const Dashboard = Vue.component('dashboard', require('./components/backend/dashboard.vue'));
const LeftMenu = Vue.component('leftmenu', require('./components/backend/leftMenu.vue'));
const Role = Vue.component('role', require('./components/backend/Role.vue'));
const HeaderName = Vue.component('contentheader', require('./components/backend/contentHeader.vue'));
const RoleTabs = Vue.component('roletabs', require('./components/backend/roleTabs.vue'));
const AddRole = Vue.component('addrole', require('./components/backend/addRole.vue'));
const AddEmployees = Vue.component('addemployees', require('./components/backend/addEmployees.vue'));
const RoleMapping = Vue.component('rolemapping', require('./components/backend/roleMapping.vue'));

//end of components

//routers
const router = new VueRouter({
    history:true,
    mode:'history',
    hashbang: false,
    linkActiveClass: 'active',
    routes: [
        { path: '/admin/menu', component: Example },
        { path: '/admin/dashboard', component: Dashboard },
        { path: '/admin/role', component: Role },
        { path: '/admin/role/addrole', component: AddRole },
        { path: '/admin/role/addemployees', component: AddEmployees },
        { path: '/admin/role/rolemapping', component: RoleMapping }
    ]
})
//end of routers
const backend = new Vue({
    router
}).$mount('#main');