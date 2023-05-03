<template>
    <div class="container login-page mt-5">
        <form class="login-form">
            <h2>Логин</h2>
            <div class="mb-3">
                <label for="email" class="form-label">Почта:</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль:</label>
                <input type="password" class="form-control" id="password" />
            </div>
            <button type="submit" class="btn btn-primary">
                Войти
            </button>
        </form>
    </div>
</template>


<script>
    export default {

    }

</script>


<style>
    .login-page {
        display: flex;
        justify-content: center;
    }
    .login-page form {
        min-width: 300px;;
    }

</style>
