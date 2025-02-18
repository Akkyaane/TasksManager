<?php

function connect()
{
    return new PDO('mysql:host=localhost;dbname=database', 'root', '');
}

function disconnect()
{
    //
}

