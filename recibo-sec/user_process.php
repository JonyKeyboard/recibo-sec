<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);

$type = filter_input(INPUT_POST, "type");

//-- REGISTER USER
if($type === "register"){

    $name = filter_input(INPUT_POST, "name");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

    if($name && $email && $password){

        if($password === $confirmpassword) {

            if($userDao->findByEmail($email) === false){

                $user = new User();

                $finalPassword = $user->generatePassword($password);
                $user->name = $name;
                $user->email = $email;
                $user->password = $finalPassword;

                $userDao->create($user);

                $message->setMessage("Usuário cadastrado com sucesso", "success", "user.php");

            } else {
                $message->setMessage("Usuário já cadastrado, tente outro email.", "danger", "back");
            }

        } else {
            $message->setMessage("As senhas não são iguais.", "danger", "back");
        }

    } else {
        $message->setMessage("Por favor, preencha todos os campos.", "danger", "back");
    }

//-- DELETE USER
} else if($type === "delete") {

    
//-- UPDATE USER
} else if ($type === "update"){



} else {

    $message->setMessage("Informações inválidas!", "error", "/index.php");

}