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
import CatalogCard from './/vueComponents/Catalog/CatalogCard.vue';
Vue.component('catalog-card', CatalogCard);

import CatalogPillAction from './/vueComponents/Catalog/CatalogPillAction.vue';
Vue.component('catalog-pill-action', CatalogPillAction);

import CatalogPill from './/vueComponents/Catalog/CatalogPill.vue';
Vue.component('catalog-pill', CatalogPill);

import CatalogCreateForm from './/vueComponents/Catalog/Forms/CatalogCreateForm.vue';
Vue.component('catalog-create-form', CatalogCreateForm);


/**
 * Products components.
 */
import ProductList from './/vueComponents/Product/ProductList.vue';
Vue.component('product-list', ProductList);

import Product from './/vueComponents/Product/Product.vue';
Vue.component('product', Product);

import ProductUpdate from './/vueComponents/Product/ProductUpdate.vue';
Vue.component('product-update', ProductUpdate);

import ProductCard from './/vueComponents/Product/ProductCard.vue';
Vue.component('product-card', ProductCard);

import ProductCardAction from './/vueComponents/Product/ProductCardAction.vue';
Vue.component('product-card-action', ProductCardAction);

import ProductUpdateForm from './/vueComponents/Product/Forms/ProductUpdateForm.vue';
Vue.component('product-update-form', ProductUpdateForm);


/**
 * Categories components.
 */
import CategoryPill from './/vueComponents/Category/CategoryPill.vue';
Vue.component('category-pill', CategoryPill);

import CategoryPillAction from './/vueComponents/Category/CategoryPillAction.vue';
Vue.component('category-pill-action', CategoryPillAction);

import CategoryCard from './/vueComponents/Category/CategoryCard.vue';
Vue.component('category-card', CategoryCard);

import CategoryCreateForm from './/vueComponents/Category/Forms/CategoryCreateFrom.vue';
Vue.component('category-create-form', CategoryCreateForm);

import CategoryUpdateFrom from './/vueComponents/Category/Forms/CategoryUpdateFrom';
Vue.component('category-update-form', CategoryUpdateFrom);

var vm = new Vue({
    el: '#app',
    data: function() {
        return {};
    }
});
