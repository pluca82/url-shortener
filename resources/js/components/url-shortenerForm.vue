<template>
 <div>
    <input v-model="url" type="text" placeholder="Enter URL" @keyup.enter="createShortUrl">
    <button @click="createShortUrl">Shorten</button>
    <p v-if="shortUrl">{{ shortUrl }}</p>
    <p v-if="error">{{ error }}</p>
 </div>
</template>

<script>
export default {
 data() {
    return {
      url: '',
      shortUrl: '',
      error: '',
    };
 },
 methods: {
    createShortUrl() {
      if (!this.url) {
        this.error = 'Please enter a URL.';
        return;
      }

      axios.post('/create', { url: this.url })
        .then(response => {
          this.shortUrl = response.data.short_url;
          this.error = '';
        })
        .catch(error => {
          this.error = 'An error occurred. Please try again.';
        });
    },
 },
};
</script>
