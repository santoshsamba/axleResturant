import VueRouter from 'vue-router'
import vToolTip from 'v-tooltip'
// import vSelect from 'vue-select'


window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(vToolTip);

// window.$ = window.jQuery = require('jquery');
require('vue-resource');
require('./bootstrap');
Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});
// require('vue-resource');

//components
// Vue.component('v-select', vSelect);

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
const SideMenu = Vue.component('sidemenu', require('./components/backend/sidemenu.vue'));
const SelectEg = Vue.component('selecteg', require('./components/backend/selecteg.vue'));

//end of components

//routers
const router = new VueRouter({
    hashbang: false,
    history: true,
    root: '/admin/',
    routes: [
        { path: '/admin/menu', component: AdminMenu },
        { path: '/admin/dashboard', component: Dashboard },
        { path: '/admin/role', component: Role },
        { path: '/admin/role/addrole', component: AddRole },
        { path: '/admin/role/addemployees', component: AddEmployees },
        { path: '/admin/role/rolemapping', component: RoleMapping },
        { path: '/admin/role/select', component: SelectEg }
    ]
})
//end of routers
const backend = new Vue({
    router
}).$mount('#main');


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
            
            
            $(".select2").select2();
});

