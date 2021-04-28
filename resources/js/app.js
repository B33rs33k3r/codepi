require('./bootstrap');

import Vue from 'vue';

import VueResource from 'vue-resource';
Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("meta[name='csrf-token']").getAttribute('content');

import ProductList from './/vueComponents/ProductList.vue';
Vue.component('product-list', ProductList);

import Product from './/vueComponents/Product.vue';
Vue.component('product', Product);

import ProductUpdate from './/vueComponents/ProductUpdate.vue';
Vue.component('product-update', ProductUpdate);

import ProductContainer from './/vueComponents/ProductContainer.vue';
Vue.component('product-container', ProductContainer);

import CategoriesContainer from './/vueComponents/CategoriesContainer.vue';
Vue.component('categories-container', CategoriesContainer);


import Category from './/vueComponents/Category.vue';
Vue.component('category', Category);


var vm = new Vue({
    el: '#app',
    data: function() {
        return {};
    }
});
