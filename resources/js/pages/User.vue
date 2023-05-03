<template>
    <div class="user-page container mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Наличие</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in books" :key="item.id">
                    <th scope="row">{{item.id}}</th>
                    <td>{{item.title}}</td>
                    <td>{{item.author}}</td>
                    <td>
                        {{ item.availability ? 'Доступна' : 'Выдана' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            // Сразу после загрузки страницы подгружаем список книг и отображаем его
            this.loadBookList();
        },
        data() {
            return {
                books: []
            }
        },
        methods: {
            async loadBookList() {
                // Получаем книги
                let response = await axios.get('/api/book/all');

                // Сохраняем книги в данные компонента
                this.books = response.data;
            }
        }
    }
</script>


<style>
</style>
