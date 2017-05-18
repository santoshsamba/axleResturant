import VueRouter from 'vue-router';

let routes=[
  {
    path: '/addFoodCat',
    component: require('./components/backend/addFoodCat.vue')
  }
];
export default new VueRouter({
    routes
});
