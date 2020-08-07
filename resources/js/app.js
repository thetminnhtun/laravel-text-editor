
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('trumbowyg-list', require('./components/TrumbowygList.vue').default);

const app = new Vue({
    el: '#app',
});
