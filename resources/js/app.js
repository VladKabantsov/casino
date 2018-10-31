import router from  './app-routes';

import App from './views/App';

const app = new Vue({
                        el: '#app',
                        components: { App },
                        router,
                    });
