<template>
    <div class="admin-page container mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Наличие</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in books" :key="item.id">
                    <th scope="row">{{item.id}}</th>
                    <td>{{item.title}}</td>
                    <td>{{item.author}}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary"
                                v-on:click="changeBookAvailability(item.id)">
                            {{ item.availability ? 'Доступна' : 'Выдана' }}
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-danger"
                                v-on:click="deleteBook(item.id)">
                            Удалить
                        </button>
                    </td>
                </tr>

                <!-- Строка с полями для добавления новой книги -->
                <tr>
                    <th scope="row">Добавить</th>
                    <td><input type="text" class="form-control" v-model="title"></td>
                    <td><input type="text" class="form-control" v-model="author"></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-outline-success" v-on:click="addBook">
                            Добавить
                        </button>
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
                books: [], // книги
                title: '',
                author: ''
            }
        },
        methods: {
            async loadBookList() {
                // Получаем книги
                let response = await axios.get('/api/book/all');

                // Сохраняем книги в данные компонента
                this.books = response.data;
            },
            async addBook() {
                let response = await axios.post('/api/book/add', {
                    title: this.title,
                    author: this.author
                });
                this.loadBookList();
            },
            async deleteBook(id) {
                let response = await axios.get('/api/book/delete/' + id);
                this.loadBookList();
            },
            async changeBookAvailability(id) {
                let response = await axios.get('/api/book/change_availabilty/' + id);
                console.log(response);
                this.loadBookList();
            }
        }
    }
</script>


<style>
</style>
