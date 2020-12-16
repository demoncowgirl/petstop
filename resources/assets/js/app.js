import PetfinderAPI from '/components/PetfinderAPI.vue'

// require('./bootstrap');

 // window.Vue = require('vue');

Vue.component('petfinderapi', require('./components/PetfinderAPI.vue').default);

// Vue.component('vetapi', require('./components/YelpAPI.vue').default);

const app = new Vue({
  el: '#app',
  components: {'petfinderapi':PetfinderAPI
});
