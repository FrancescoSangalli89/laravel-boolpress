window.axios = require('axios');
window.Vue = require('vue');

import App from './views/App';
import router from './router.js';

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});