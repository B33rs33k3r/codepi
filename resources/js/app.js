require('./bootstrap');

import Vue from 'vue';
import VueResource from 'vue-resource';

Vue.use(VueResource);

import ProductContainer from './/vueComponents/ProductContainer.vue';
Vue.component('product-container', ProductContainer);

import Product from './/vueComponents/Product.vue';
Vue.component('product', Product);

import Categories from './/vueComponents/Categories.vue';
Vue.component('categories', Categories);


var vm = new Vue({
    el: '#app',
    data: function() {
        return {};
    }
});
