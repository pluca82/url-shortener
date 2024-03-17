import { createApp } from 'vue';
import urlShortenerForm from './components/url-shortenerForm.vue';

const app = createApp({});


app.component('UrlShortenerForm', urlShortenerForm);
app.mount('#app');
