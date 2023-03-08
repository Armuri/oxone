<?php
function postVar($name){
    if (isset($_POST [$name])){
        if (! empty ($_POST[$name])){
            return $_POST[$name] ;
        }
        return TRUE;
    }
    return false;
}


$email = postVar("email");
$password = postVar("password");

try {
    include "db.php";   
    $db = getConnection();
    $select = $db->prepare('SELECT * FROM comptes WHERE email=:email');
    $select->execute(array('email' => $email));    
    $result = $select->fetchAll();
    if(password_verify($password, $result)){ 
        $login = $result;
        session_start();
        echo "Connexion effectuée, content de vous revoir $login !"; 
        exit;
    } else {
        echo "ERREUR LOGIN OU MOT DE PASSE, REESAYER";
        exit;
    }
} catch (Exception $e){
    echo "Echec : " . $e->getMessage();
}


    





?>
