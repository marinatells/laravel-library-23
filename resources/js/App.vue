<template>
    <navbar :user="user"></navbar>
    <router-view v-if="isLoaded"/>
</template>

<script>
    import Navbar from './components/Navbar.vue';
    export default {
        components: {
            Navbar
        },
        data() {
            return {
                user: null,
                isLoaded: false
            }
        },
        mounted() {
            let token = localStorage.getItem("token");
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            this.getUser();
        },
        methods: {
            async getUser() {
                try {
                    let response = await axios.get('/api/user');
                    this.user = response.data;

                    if (this.user.isAdmin) {
                        this.$router.push('/admin');
                    } else {
                        this.$router.push('/user');
                    }
                } catch (err) {
                    this.$router.push('/login');
                }

                this.isLoaded = true;
            }
        }
    }
</script>


<style>
    .app {
        background-color: rgb(235, 233, 233);
        padding: 20px;
        text-align: center;
        border-radius: 8px;
    }

    .app nav {
        display: flex;
        justify-content: center;
        gap: 20px;
    }
</style>
