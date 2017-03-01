/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./jquery-2.1.1.min')
require('./materialize');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueRouter from "vue-router";
import router from "./router";
import Vue from "vue";
import VueResource from "vue-resource";
import VueCookie from "vue-cookie";
import Collection from "./collection";

Vue.use(VueResource)
Vue.use(VueRouter)
Vue.use(VueCookie)
Vue.use(Collection)

// lazy load components
const Grid = (resolve) => require(['./components/Grid.vue'], resolve)
const List = (resolve) => require(['./components/List.vue'], resolve)

// Create and mount root instance.
// Make sure to inject the router.
// Route components will be rendered inside <router-view>.
window.bus = new Vue({

    router,

    components: {
        Grid
    },

    data: {
        isGrid: true,
        isFavourite: false
    },
    methods: {
        displayGrid: function (grid) {
            this.$set(this, 'isGrid', grid)
        },
        selectFavourite: function () {
            this.$set(this, 'isFavourite', !this.isFavourite)
            this.$cookie.set('favourite', this.isFavourite, 1)
            bus.$emit('onFavourite', this.isFavourite);
        }
    },
    created: function () {
        var favourite = this.$cookie.get('favourite');
        if (favourite == 'true')
            this.$set(this, 'isFavourite', true);
    }

}).$mount('#app')