
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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
            integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="app">
            <header>
                <h1>ToDo List</h1>
            </header>
            <main>
                <div class="container">
              <!-- ToDo list -->
                    <ul>
                    <!-- Ho utilizzato il v-for per iterare sulla lista tasksList e creare un elemento <li> per ogni elemento nella lista -->
                        <li v-for="element in tasksList">
                        <!-- Ho utilizzato :class per applicare dinamicamente la classe CSS in base alla condizione (element.done) ? 'done' : ''. 
                        Se element.done è true, la classe 'done' viene applicata, altrimenti viene applicata una stringa vuota. -->
                            <span :class="(element.done) ? 'done' : ''" @click="completedTask(element)"> <!-- Ho associato l'evento click su <span> alla funzione 
                                                                                                            completedTask(element). Quando l'utente clicca su una attività, 
                                                                                                            questa funzione viene chiamata con l'elemento corrispondente della 
                                                                                                            lista tasksList. -->
                                {{element.task}} <!-- Ho utilizzato le graffe per visualizzare dinamicamente il testo dell'attività all'interno del tag <span>. -->
                            </span>
                            <div class="delete-task">
                                <i class="fa-solid fa-trash-can"></i> <!-- Ho incluso un'icona di cestino per eliminare l'attività. -->
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                 <!-- ToDo form per aggiungere nuove attività alla lista di ToDo. -->
                 <!-- L'attributo action specifica l'URL a cui verranno inviati i dati del form. 
                 In questo caso, ho impostato action su una stringa vuota (""). Questo significa che il form invierà i dati a se stesso. 
                 Quando l'URL di action è vuoto, il form invia i dati alla stessa pagina. -->
                    <form action="" method="post" @submit.prevent="createNewTask()"> <!-- I dati del form saranno inviati come parte del corpo della richiesta HTTP POST per aggiungere/modificare risorse sul server. 
                                                                                        @submit.prevent impedisce il comportamento predefinito del form, che è ricaricare la pagina. 
                                                                                        Invece, quando il form viene sottomesso, viene chiamato il metodo createNewTask().-->
                        <input type="text" v-model="newTask.task" name="my-task" placeholder="Aggiungi nuova task"> <!--Ogni volta che l'utente 
                                                                                                                    inserisce qualcosa nell'input, il valore di newTask.task viene aggiornato, e viceversa. -->
                        <button type="submit">Inserisci</button>
                    </form>
                </div>
            </main>
        </div>
</body>
<!-- Incluso VueJS e Axios tramite CDN -->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="./js/script.js"></script>

</html>