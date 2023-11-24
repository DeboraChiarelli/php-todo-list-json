
<!-- Descrizione
Dobbiamo creare una web-app che permetta di leggere e scrivere una lista di Todo. Deve essere anche gestita la persistenza dei dati leggendoli da, e scrivendoli in un file JSON.
Stack
Html, CSS, VueJS (importato tramite CDN), axios, PHP
Consigli
Nello svolgere l’esercizio seguite un approccio graduale.
Prima assicuratevi che la vostra pagina index.php (il vostro front-end) riesca a comunicare correttamente con il vostro script PHP (le vostre “API”).
Lo step successivo è quello di “testare” l’invio di un nuovo task, sapendo che manca comunque la persistenza lato server (ancora non memorizzate i dati da nessuna parte).
Solo a questo punto sarà utile passare alla lettura della lista da un file JSON. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ToDo List JSON</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<body>
    <div id="app">
        <!-- Todo List -->
        <div>
            <h2>Todo List</h2>
            <ul>
                <li></li>
            </ul>
        </div>
        <!-- Todo Form -->
        <div>
            <h2>Add Todo</h2>
            <form>
                <input v-model="toDo" type="text" placeholder="Add a new Todo">
                <button type="submit">Add</button>
            </form>
        </div>
    </div>

</body>
</html>