// Ho creato un' applicazione Vue che consente agli utenti di aggiungere nuove attività e contrassegnare le attività come completate o incomplete. La comunicazione con il server è gestita tramite Axios, inviando richieste POST e GET a due endpoint diversi (urlStore e urlApi) nel server PHP.

const { createApp } = Vue;
createApp({
    data() {
        return {
            // Ho utilizzato la funzione data per definire lo stato iniziale dell'applicazione. In questo caso, ho dichiarato le proprietà urlApi, urlStore, tasksList, e newTask.
            urlApi: './api.php',
            urlStore: './store.php',
            tasksList: [],
            newTask: {
                "task": "",
                "done": false
            }
        }
    },
    methods: {
        // Ho definito un metodo createNewTask che viene chiamato quando viene inviato il form per aggiungere una nuova attività.
        createNewTask() {
            /* Ho inserito un console log per visualizzare il nuovo compito prima di inviarlo al server. In questo modo, verifico che i dati siano prima dell'invio. */
            console.log(this.newTask)
            axios.post(this.urlStore, { /* Ho utilizzato axios.post per inviare i dati del nuovo compito al server PHP (urlStore). this.urlStore rappresenta l'URL dell'endpoint del server PHP a cui sto inviando i dati (urlStore).*/
                task: this.newTask /* Ho gestito la risposta del server e aggiornato la lista delle attività (tasksList) con i nuovi dati. Con { task: this.newTask } ho inviato un oggetto con il nuovo compito come dato della richiesta. Questo oggetto è incluso nel corpo della richiesta POST. */
            }, {
                headers: { /* Ho specificato l'intestazione della richiesta, indicando che i dati sono in formato multipart/form-data.*/
                    'Content-Type': 'multipart/form-data'
                }
            })
                //  Ho utilizzato il metodo .then per gestire la risposta del server quando la richiesta POST ha successo.
                //  Con response.data.data ho estratto i dati ricevuti dal server e li ho assegnati alla lista di attività (tasksList).
                .then((response) => {
                    this.tasksList = response.data.data;
                })
            this.newTask.task = ''; /* Dopo aver aggiunto la nuova attività con successo, ho svuotato il campo di input (this.newTask.task) per prepararlo ad una nuova attività. */
        },
        /* Ho definito un metodo completedTask che viene chiamato quando un'attività viene contrassegnata come completata o incompleta. Questo metodo inverte il valore della proprietà done dell'attività selezionata.*/
        completedTask(singleTask) {
            singleTask.done = !singleTask.done
        }
    },
    /* Ho utilizzato l'hook created per eseguire delle azioni quando l'istanza di Vue è stata creata. */
    created() {
        axios.get(this.urlApi) /* Ho utilizzato axios.get per ottenere i dati delle attività dal server PHP (urlApi). this.urlApi rappresenta l'URL dell'endpoint del server dal quale richiedo i dati.*/
            .then(response => {
                console.log('response', response.data) // Contiene i dati ricevuti dal server. 
                this.tasksList = response.data.data; // Ho assegnato i dati ricevuti alla variabile tasksList nell'istanza Vue, in modo che possano essere utilizzati per la visualizzazione nell'interfaccia utente.
                console.log('array', this.tasksList)
            })

    }
}).mount('#app');