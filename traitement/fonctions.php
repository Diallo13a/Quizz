<?php

function connexion($login,$pwd){
    $users=getData();
    foreach ($users as $key => $user) {
        if ($user["login"]===$login && $user["password"]===$pwd) {  //===egalité de type et de valeur
           $_SESSION['user']=$user;
           $_SESSION['statut']="login";
            if ($user["profil"]==="admin") {
                return "accueil";
            }else {
                return "jeux";
            }
        }
    }
   return "error";
}

function is_connect(){
    if (!isset($_SESSION['statut'])) {
        header("location:index.php");
    }
}

function deconnexion(){
    unset($_SESSION['user']);
    unset($_SESSION['statut']);
    session_destroy();
}

function getData($file="utilisateur"){
    $data=file_get_contents("./data/".$file.".json");
    $data=json_decode($data,true);
    return $data;
}

function getDatadd($file="questions"){
    $data=file_get_contents("./data/".$file.".json");
    $data=json_decode($data,true);
    return $data;
}

function getDataq($file="nombrequestion"){
    $data=file_get_contents("./data/".$file.".json");
    $data=json_decode($data,true);
    return $data;
}

function is_in($login)
{
    $users = getData();
    foreach ($users as $key => $user) {
        if ($user['login'] === $login) {
            return true;
        }
    }
    return false;
}
?>