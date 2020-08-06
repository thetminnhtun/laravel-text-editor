
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('trumbowyg-create', require('./components/TrumbowygCreate.vue').default);
Vue.component('trumbowyg-edit', require('./components/TrumbowygEdit.vue').default);


const app = new Vue({
    el: '#app',
});
