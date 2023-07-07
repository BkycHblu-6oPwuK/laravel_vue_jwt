import './bootstrap';
import Index from './components/Index.vue';
import { createApp } from 'vue';
import router from './router';

const app = createApp({});
app.use(router)
app.component('Index', Index);
app.mount('#app');
