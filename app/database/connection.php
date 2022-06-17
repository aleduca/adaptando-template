<?php

function getConnection()
{
    return new PDO("mysql:host=localhost;dbname=cart", "root", "", [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
}
