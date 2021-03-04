require('./bootstrap');

window.Vue = require('vue');

Vue.component('petfinderapi', require('./components/PetfinderAPI.vue').default);

const app = createApp({
    el: '#services',
});
