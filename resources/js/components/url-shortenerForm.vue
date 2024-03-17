<template>
  <div>
     <input v-model="url" type="text" placeholder="Enter URL" @keyup.enter="createShortUrl">
     <button @click="createShortUrl">Shorten</button>
     <p v-if="message">{{ message }}</p>
     <p v-if="shortUrl"><a :href="shortUrl">http://localhost:8000/{{ shortUrl }}</a></p>
  </div>
 </template>
 
 <script>
 import axios from 'axios';
 
 export default {
  name: 'UrlShortenerForm',
  data() {
     return {
       url: '',
       shortUrl: '',
       error: '',
       message: '', 
     };
  },
  methods: {
    
    // Function to check if URL is valid
     validateUrl(url) {
       const regex = /^(http|https):\/\/[^ "]+$/;
       return regex.test(url);
     },

     // Function where i'm calling the create method from the controller
     createShortUrl() {
       if (!this.url) {
         this.error = 'Please enter a URL.';
         return;
       }
 
       // Here i'm calling the function that validates the url
       if (!this.validateUrl(this.url)) {
         this.error = 'Please enter a valid URL.';
         this.message = 'Please enter a valid URL.';
         this.shortUrl = null 
         return;
       }
 
       // Check URL with Google Safe Browsing API
       // 
       /*
       axios.post('https://safebrowsing.googleapis.com/v4/threatMatches:find?key=YOUR_API_KEY', {
         client: {
           clientId: "Company Name",
           clientVersion: "1.0"
         },
         threatInfo: {
           threatTypes: ["MALWARE", "SOCIAL_ENGINEERING"],
           platformTypes: ["ANY_PLATFORM"],
           threatEntryTypes: ["URL"],
           threatEntries: [{url: this.url}]
         }
       })
       .then(response => {
         if (response.data.matches) {
           this.error = 'The URL is unsafe.';
           this.message = 'The URL is unsafe.';
           return;
         }
         // Proceed with URL shortening if the URL is safe
         this.proceedWithShortening();
       })
       .catch(error => {
         this.error = 'An error occurred while checking the URL. Please try again.';
         this.message = 'An error occurred while checking the URL. Please try again.';
       });
       */
 
       // Since I do not have an API key, I'm just calling proceedWithShortening() directly 
       this.proceedWithShortening();
     },
     proceedWithShortening() {
       axios.post('/create', { url: this.url })
         .then(response => {
           this.shortUrl = response.data.short_url;
           this.error = '';
           if (response.data.message === 'created') {
             this.message = `Shortened URL: ${this.shortUrl}`; 
           } else if (response.data.message === 'exists') {
             this.message = `URL already shortened. Shortened URL: ${this.shortUrl}`;
           }
         })
         .catch(error => {
           this.error = 'An error occurred. Please try again.';
           this.message = 'An error occurred. Please try again.';
         });
     },
  },
 };
 </script>
 