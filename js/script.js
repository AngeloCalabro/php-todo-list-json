const { createApp } = Vue;

const app = createApp({
    data() {
        return {
            message: 'Hello Vue!',

        }
    }
}).mount('#app');