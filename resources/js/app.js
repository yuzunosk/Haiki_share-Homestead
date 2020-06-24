/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./components/case/bootstrap");
require("./components/case/partial");
require("./components/case/showSerch.js");
require("./components/case/clickDelete.js");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("top-component", require("./components/Top").default);
Vue.component(
    "storehome-component",
    require("./components/StoreHomeComponent").default
);
Vue.component(
    "userhome-component",
    require("./components/UserHomeComponent").default
);
Vue.component("productdetail", require("./components/ProductDetails").default);
Vue.component("exhibition", require("./components/Exhibition").default);
Vue.component("productStick", require("./components/ProductStick").default);
Vue.component(
    "productcardunit",
    require("./components/ProductCardUnit").default
);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const storeApp = new Vue({
    el: "#storeApp"
});

const userApp = new Vue({
    el: "#userApp"
});

const productApp = new Vue({
    el: "#productApp"
});

const exhibitionApp = new Vue({
    el: "#exhibitionApp"
});

const cardApp = new Vue({
    el: "#cardApp"
});

const topApp = new Vue({
    el: "#topApp"
});
