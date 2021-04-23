require('./bootstrap');

import Vue from 'vue';

import Product from './/vueComponents/Product.vue';
Vue.component('product', Product);

var vm = new Vue({
    el: '#app',
    data: function() {
        return {};
    }
});
