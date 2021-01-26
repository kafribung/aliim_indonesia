require('./bootstrap');
window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('district-component', require('./components/DistrictComponent.vue').default);
const app = new Vue({
    el: '#app',
});
