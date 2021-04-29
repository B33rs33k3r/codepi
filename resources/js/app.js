require('./bootstrap');

import Vue from 'vue';

import VueResource from 'vue-resource';
Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("meta[name='csrf-token']").getAttribute('content');

/**
 * Agnostic components.
 */
import List from './/vueComponents/List.vue';
Vue.component('list', List);

import Message from './/vueComponents/Message.vue';
Vue.component('message', Message);

/**
 * Catalogs components.
 */
import CatalogCreateForm from './/vueComponents/CatalogCreateForm.vue';
Vue.component('catalog-create-form', CatalogCreateForm);

import CatalogCard from './/vueComponents/CatalogCard.vue';
Vue.component('catalog-card', Catalog);

/**
 * Products components.
 */
import ProductList from './/vueComponents/ProductList.vue';
Vue.component('product-list', ProductList);

import Product from './/vueComponents/Product.vue';
Vue.component('product', Product);

import ProductUpdate from './/vueComponents/ProductUpdate.vue';
Vue.component('product-update', ProductUpdate);

import ProductCard from './/vueComponents/ProductCard.vue';
Vue.component('product-card', ProductCard);

/**
 * Categories components.
 */
import CategoryPill from './/vueComponents/CategoryPill.vue';
Vue.component('category-pill', CategoryPill);

import CategoryCreateForm from './/vueComponents/CategoryCreateFrom.vue';
Vue.component('category-create-form', CategoryCreateForm);


var vm = new Vue({
    el: '#app',
    data: function() {
        return {};
    }
});
