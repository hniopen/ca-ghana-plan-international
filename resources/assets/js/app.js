
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.c3 = require('c3');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue'
import lodash from 'lodash'
import VueLodash from 'vue-lodash'

import Dashboard from './components/Dashboard.vue'
import store from './components/vuex/store.js'
import slugify from './utils/mySlugify.js'

Vue.mixin({
  methods: {
    slugify: slugify
  }
})

Vue.use(VueLodash, lodash)

new Vue({
  el: '#dashboard',
  store,
  render: h => h(Dashboard)
})
