import "babel-polyfill";
window.Vue = require('vue');
window.axios = require("axios");
import { cacheAdapterEnhancer, throttleAdapterEnhancer } from 'axios-extensions';

window.http = axios.create({
	baseURL: '/',
	headers: { 'Cache-Control': 'no-cache' },
	adapter: throttleAdapterEnhancer(axios.defaults.adapter, { threshold: 2 * 1000 })
});

import VueParallaxJs from 'vue-parallax-js'
Vue.use(VueParallaxJs)

import PortalVue from 'portal-vue';
Vue.use(PortalVue);

require('./load-components')

const app = new Vue({
    el: '#app',

    data: {
        clientHeight: 0,
        windowHeight: 0,
        windowWidth: 0,
        isScrolling: false,
        scrollPosition: 0,
        footerStuck: false,
        mobileMenuOpen: false
    },

    methods: {
        handleScroll () {
            this.scrollPosition = window.scrollY;
            this.isScrolling = this.scrollPosition > 75;
        },
        handleResize() {
            this.windowWidth = window.innerWidth;
            this.windowHeight = window.innerHeight;
        },
        toggleMenu() {
            this.mobileMenuOpen = ! this.mobileMenuOpen;
        },
        itemClicked() {
            this.mobileMenuOpen = false;
        }
    },

    mounted () {
        this.footerStuck = window.innerHeight > this.$root.$el.children[0].clientHeight;
        this.clientHeight = this.$root.$el.children[0].clientHeight;
        this.windowHeight = window.innerHeight;
        this.windowWidth = window.innerWidth;
        this.handleScroll();
    },

    created () {
        window.addEventListener('scroll', this.handleScroll);
        window.addEventListener('resize', this.handleResize);
        this.handleScroll();
        this.handleResize();
    },

    destroyed () {
        window.removeEventListener('scroll', this.handleScroll);
        window.removeEventListener('resize', this.handleResize);
    }

})
