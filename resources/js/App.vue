<template>
    <navbar></navbar>
    <router-view />
</template>

<script>
    import Navbar from './components/Navbar.vue';
    export default {
        components: {
            Navbar
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
