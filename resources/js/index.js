

// Настройка axios
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Настройка vue
import { createApp } from 'vue';
import App from './App.vue';
const app = createApp(App);

app.mount('#app');
