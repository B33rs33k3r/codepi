require('./bootstrap');

import Vue from 'vue';

import $ from 'jquery';

import Foundation from 'foundation-sites';
Vue.use(Foundation);

import ProductContainer from './/vueComponents/ProductContainer.vue';
Vue.component('product-container', ProductContainer);

import CategoriesContainer from './/vueComponents/CategoriesContainer.vue';
Vue.component('categories-container', CategoriesContainer);

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

$(document).foundation();
