import './bootstrap';
import * as Vue from 'vue/dist/vue.esm-bundler';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import NewsFeed from './components/NewsFeed.vue';
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
// Vue.component('chat-messages', require('./Components/ChatMessages.vue').default);
// Vue.component('chat-form', require('./Components/ChatForm.vue').default);
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy);

        // Register your NewsFeed component here
        app.component('news-feed', NewsFeed);

        app.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});



