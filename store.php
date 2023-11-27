<!-- Questo script PHP gestisce l'aggiunta di nuove attività al file JSON, aggiornando il file e restituendo una risposta JSON al frontend VueJS. -->

<?php
    // Ho utilizzato la funzione file_get_contents per leggere il contenuto del file JSON chiamato 'file.json'. La stringa risultante è memorizzata nella variabile $tasksString.
    $tasksString = file_get_contents('file.json');

    // Ho utilizzato la funzione json_decode per convertire la stringa JSON ($tasksString) in un array associativo PHP. Il risultato è memorizzato nella variabile $tasks.
    $tasks = json_decode($tasksString, true);

    // Ho aggiunto la nuova attività all'array di attività. Ho usato le quadre per aggiungere un nuovo elemento all'array.
    $tasks[] = [
        'task' => $_POST['task']['task'], // Ho ottenuto il valore del campo 'task' dalla richiesta POST inviata dal frontend (VueJS).
        // Ho ottenuto il valore del campo 'done' dalla richiesta POST inviata dal frontend.
        'done' => $_POST['task']['done'] == 'false' ? false : true // Ho assegnato il valore booleano corrispondente in base al valore ricevuto dal frontend. Se il valore è 'false', viene assegnato false, altrimenti true.
    ];

    $encodedTask = json_encode($tasks); // Ho utilizzato la funzione json_encode per convertire l'array $tasks in una stringa JSON. Il risultato è memorizzato in $encodedTask.

    file_put_contents('file.json', $encodedTask); // Ho utilizzato la funzione file_put_contents per scrivere la stringa JSON nel file JSON, sovrascrivendo il contenuto esistente.
// Ho creato un array PHP chiamato $response che contiene informazioni sulla risposta JSON.
    $response = [
        'success' => true, // Indica che l'aggiunta dell'attività è stata eseguita con successo.
        'message' => 'Ok', // Un messaggio di testo per indicare che l'operazione è andata a buon fine.
        'code' => 200, // Un codice che indica una risposta di successo.
        'data' => $tasks // Contiene i dati aggiornati dell'array di attività.
    ];
// Ho utilizzato la funzione json_encode per convertire l'array PHP $response in una stringa JSON.
    $jsonResponse = json_encode($response);
// Ho impostato l'header della risposta per indicare che il contenuto è in formato JSON.
    header('Content-Type: application/json');
// Ho stampato la risposta JSON, che include lo stato di successo, il messaggio, il codice e i dati delle attività.
    echo $jsonResponse;

    ?>