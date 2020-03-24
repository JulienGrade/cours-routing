<?php


namespace App\Controller;


use Exception;

class TaskController
{
    // Lister, montrer, ajouter

    public function index(array $currentRoute)
    {
        // On récupère les tâches
        $data = require_once 'data.php';

        $generator = $currentRoute['generator'];
        require __DIR__.'/../../pages/list.html.php';
    }

    public function show(array $currentRoute)
    {
        // On appelle la liste des tâches
        $data = require_once "data.php";

        // Par défaut, on imagine qu'aucun id n'a été précisé
        $id = $currentRoute['id'];

        // Si un id est précisé en GET, on le prend
        //if (isset($_GET['id'])) {
        //    $id = $_GET['id'];
        //}

        // Si aucun id n'est passé ou que l'id n'existe pas dans la liste des tâches, on arrête tout !
        if (!$id || !array_key_exists($id, $data)) {
            throw new Exception("La tâche demandée n'existe pas !");
        }

        // Si tout va bien, on récupère la tâche correspondante et on affiche
        $task = $data[$id];

        $generator = $currentRoute['generator'];
        require __DIR__.'/../../pages/show.html.php';
    }

    public function create(array $currentRoute)
    {
        // Si la requête arrive en POST, c'est qu'on a soumis le formulaire :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Traitement à la con (enregistrement en base de données, redirection, envoi d'email, etc)...
            var_dump("Bravo, le formulaire est soumis (TODO : traiter les données)", $_POST);

            // Arrêt du script
            return;
        }

        // Sinon, si on est en GET, on affiche :

        $generator = $currentRoute['generator'];
        require __DIR__.'/../../pages/create.html.php';
    }

}