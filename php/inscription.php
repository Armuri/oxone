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


$pseudo = postVar("pseudo");
$email = postVar("email");
$password = postVar("password");
$conf_password = postVar("conf_password");


if($password !== $conf_password){
    header('Location : /inscription.html');
    die;
} else {
    $password = password_hash($password,PASSWORD_BCRYPT);
    include "db.php";
    $db = getConnection();
    $insert = $db->prepare('INSERT INTO comptes (pseudo, email, password) VALUES (:pseudo, :email, :password)');
    $insert->execute(array('pseudo' => $pseudo, 'email' => $email, 'password' => $password));
    header('Location: /projet_perso/connexion.html');
    die;
}








?>