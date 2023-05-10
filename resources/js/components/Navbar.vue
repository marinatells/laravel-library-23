<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Библиотека</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-auto" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item" v-if="!user">
                        <router-link class="nav-link" aria-current="page" to="/login">Логин</router-link>
                    </li>
                    <li class="nav-item" v-if="!user">
                        <router-link class="nav-link" aria-current="page" to="/register">Регистрация</router-link>
                    </li>
                    <li class="nav-item" v-if="user">
                        <div class="nav-link">{{ user.name }}</div>
                    </li>
                    <li class="nav-item" v-if="user">
                       <button @click="logout" class="nav-link">Выйти</button>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</template>


<script>
import axios from 'axios';

    export default {
        props: ['user'],

        methods: {
            async logout() {
                await axios.post('/api/user/logout');
                localStorage.removeItem('token');
                window.axios.defaults.headers.common['Authorization'] = null;
                window.location.reload();
            }
        }
    }

</script>


<style>
    .navigation {}

</style>
