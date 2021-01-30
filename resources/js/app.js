require('./bootstrap');
window.Vue = require('vue');
Vue.component('dash-district-component', require('./components/DashDistrictComponent.vue').default);
Vue.component('district-component', require('./components/DistrictComponent.vue').default);
Vue.component('pages-add-view-artikel-component', require('./components/PagesAddViewArtikel').default);

const app = new Vue({
    el: '#app',
});
