<?php

require_once("globals.php");
require_once("db.php");
require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);

$userDao = new UserDAO($conn, $BASE_URL);

// Regate do tipo de formulário
$type = filter_input(INPUT_POST, "type");

if($type === "login") {

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    // Tenta autenticar usuário
    if($userDao->authenticateUser($email, $password)){

        // Redireciona o usuário, caso não conseguir autenticar
        $message->setMessage("Seja bem-vindo!", "success", "/editprofile.php");
    
    } else {

        $message->setMessage("Usuário e/ou senha incorretos.", "error", "back");

    }

} else {

    $message->setMessage("Informações inválidas!", "error", "/index.php");

}