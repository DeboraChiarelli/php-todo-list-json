<?php
    // Ho utilizzato la funzione file_get_contents per leggere il contenuto del file JSON chiamato 'file.json'. 
    $tasksString = file_get_contents('file.json'); // Questo contenuto viene memorizzato nella variabile $tasksString.

    // Ho utilizzato la funzione json_decode per convertire la stringa JSON ($tasksString) in un array associativo PHP. 
    $tasks = json_decode($tasksString, true);  // Il risultato viene memorizzato nella variabile $tasks.

    // Array PHP chiamato $response che contiene informazioni sulla risposta JSON
    $response = [
    'success' => true,  /* Indica che la richiesta è stata eseguita con successo */
    'message' => 'Ok',  /* Un messaggio di testo per indicare che la richiesta è andata a buon fine  */
    'code' => 200,      /* Un codice che indica una risposta di successo */
    'data' => $tasks    /* Contiene i dati effettivi dell'app, ossia l'array associativo delle attività */
    ];

    // Ho utilizzato la funzione json_encode per convertire l'array PHP $response in una stringa JSON
    $jsonResponse = json_encode($response);
    // Ho impostato l'header della risposta per indicare che il contenuto è in formato JSON
    header('Content-Type: application/json');
    // Ho stampato la risposta JSON, che include lo stato di successo, il messaggio, il codice e i dati delle attività
    echo $jsonResponse;

    ?>