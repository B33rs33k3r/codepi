require('./bootstrap');

import Vue from 'vue';

var vm = new Vue({
    mounted: function() {
        console.log('VueJS');
    },
    el: '#app',
    data: function() {
        return {};
    }
})