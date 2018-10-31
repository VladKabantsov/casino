import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './components/App'

Vue.use(VueRouter);

const router = new VueRouter({
                                 mode: 'history',
                                 routes: [
                                     {
                                         path: '/',
                                         name: 'app',
                                         component: App
                                     },
                                 ],
                             });

