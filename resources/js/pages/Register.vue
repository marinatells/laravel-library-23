<template>
    <div class="container register-page mt-5">
        <form class="register-form">
            <h2>Регистрация</h2>
            <div class="mb-3">
                <label for="username" class="form-label">Имя:</label>
                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Почта:</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль:</label>
                <input type="password" class="form-control" id="password" />
            </div>
            <button type="submit" class="btn btn-primary">
                Зарегестрироваться
            </button>
        </form>
    </div>
</template>


<script>
    export default {

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
