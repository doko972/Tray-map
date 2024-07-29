<?php

try {
    $dbCo = new PDO(
        'mysql:host=db;
        dbname=trailmap;charset=utf8',
        'trailmap',
        'trailmap'
    );
    $dbCo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die('ERREUR CONNEXION MYSQL: ' . $e->getMessage());
}