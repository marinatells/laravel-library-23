<template>
    <div class="container login-page mt-5">
        <form class="login-form" @submit="this.login">
            <h2>Логин</h2>
            <div class="mb-3">
                <label for="email" class="form-label">Почта:</label>
                <input v-model="form.email" type="email" class="form-control" id="email" aria-describedby="emailHelp" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль:</label>
                <input v-model="form.password" type="password" class="form-control" id="password" />
            </div>
            <button type="submit" class="btn btn-primary">
                Войти
            </button>
            <div v-if="!isCorrect">
                Ошибка, попробуйте ещё раз
            </div>
        </form>
    </div>
</template>


<script>
import axios from 'axios';

    export default {
        data() {
            return {
                form: {
                    email: null,
                    password: null,
                },
                token: null,
                isCorrect: true,
            };
        },

        methods: {
            async login(evt) {
                evt.preventDefault();

                try {
                    let response = await axios.post(`/api/user/login`, {
                        email: this.form.email,
                        password: this.form.password,
                        device_name: navigator.userAgent
                    });

                    let token = response.data;
                    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                    localStorage.setItem("token",  token);
                    window.location.reload();
                } catch (response) {
                    this.isCorrect = false;
                }
            },
        },
    }

</script>


<style>
    .login-page {
        display: flex;
        justify-content: center;
    }

    .login-page form {
        min-width: 300px;
        ;
    }

</style>
