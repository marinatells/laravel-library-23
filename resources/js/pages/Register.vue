<template>
    <div class="container register-page mt-5">
        <form class="register-form" @submit="register">
            <h2>Регистрация</h2>
            <div class="mb-3">
                <label for="username" class="form-label">Имя:</label>
                <input v-model="form.name" type="text" class="form-control" id="username" aria-describedby="emailHelp" />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Почта:</label>
                <input v-model="form.email" type="email" class="form-control" id="email" aria-describedby="emailHelp" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль:</label>
                <input v-model="form.password" type="password" class="form-control" id="password" />
            </div>
            <button type="submit" class="btn btn-primary">
                Зарегестрироваться
            </button>
        </form>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    password: null,
                }
            };
        },

        methods: {
            async register(evt) {
                evt.preventDefault();

                try {
                    let response = await axios.post(`/api/user/register`, {
                        email: this.form.email,
                        password: this.form.password,
                        name: this.form.name
                    });

                    this.$router.push('/login');
                } catch (response) {
                    this.isCorrect = false;
                }
            },
        },
    }

</script>


<style>
    .register-page {
        display: flex;
        justify-content: center;
    }
    .register-page form {
        min-width: 300px;;
    }

</style>
