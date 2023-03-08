<?php

function getConnection(){
    try {
        return new PDO('mysql:host=localhost;dbname=oxone', 'Arthur', 'password');
    } catch (Exception $e) {
        echo "Échec : " . $e->getMessage();
        die();
    }
}


?>