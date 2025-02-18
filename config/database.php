<?php

function connectToDatabase()
{
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=database', 'root', '');
        echo "Connexion réussie.";
        return $dbh;
    } catch (PDOException $e) {
        echo "Connexion échouée. Veuillez réesayer.";
    }
}

function disconnectFromDatabase()
{
    //
}

