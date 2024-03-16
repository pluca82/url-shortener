import { createApp } from 'vue';
import UrlShortenerForm from './components/url-shortenerForm.vue';
import HelloWorld from './components/HelloWorld.vue';
const app = createApp({
    components: {
        'HelloWorld': HelloWorld
    }
});

app.mount('#app');
