window.Vue = require('vue');

import imageComponent from './component/imageComponent';

const imageVue = new Vue({
    el: '#image-vue',
    components: {
        'imageComponent': imageComponent
    }
});
