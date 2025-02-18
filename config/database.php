<?php

$databaseName = 'database';
$username = 'root';

connectToDatabase($databaseName, $username);
disconnectFromDatabase();

function connectToDatabase($databaseName, $username)
{
    try {
        $dbh = new PDO('mysql:host=localhost;dbname='.$databaseName, $username, '');
        echo "Connexion réussie.";
    } catch (PDOException $e) {
        echo "Connexion échouée. Veuillez réesayer.";
    }
}


function disconnectFromDatabase()
{
    //
}

