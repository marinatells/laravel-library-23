<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Шаблон</title>

        <!-- подключаем файл со стилями -->
        @vite('resources/css/index.css')
    </head>
    <body>
        <div id="app">
            Error loading vue scripts
        </div>
    </body>
    <footer>
        <!-- подключаем файл с vue js -->
        @vite('resources/js/index.js')
    </footer>
</html>
