<?php

require_once("globals.php");
require_once("db.php");
require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);

$userDao = new UserDAO($conn, $BASE_URL);

$type = filter_input(INPUT_POST, "type");

if($type === "login") {
    
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    if($userDao->authenticateUser($email, $password)){

        $message->setMessage("Seja bem-vindo!", "success", "dashboard.php");
    
    } else {

        $message->setMessage("Email e/ou senha incorreto(a).", "danger", "back");

    }

} else {

    $message->setMessage("Informações inválidas!", "danger", "auth.php");

}