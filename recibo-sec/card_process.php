<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Card.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");
require_once("dao/CardDAO.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);
$cardDao = new CardDAO($conn, $BASE_URL);

$type = filter_input(INPUT_POST, "type");

$userData = $userDao->verifyToken();

if($type === "create"){

    $name = filter_input(INPUT_POST, "name");
    $register = preg_replace( '/[^0-9]/is', '', filter_input(INPUT_POST, "register"));
    $position = filter_input(INPUT_POST, "position");
    $function = filter_input(INPUT_POST, "function");
    $generalRecord = filter_input(INPUT_POST, "generalRecord");
    $cpf = preg_replace( '/[^0-9]/is', '', filter_input(INPUT_POST, "cpf"));
    $maritalStatus = filter_input(INPUT_POST, "maritalStatus");
    $placeOfBirth = filter_input(INPUT_POST, "placeOfBirth");
    $worksplace = filter_input(INPUT_POST, "worksplace");
    //$users_id = filter_input(INPUT_POST, "users_id");
        
    if(!empty($name) && !empty($cpf) && !empty($position)) {

        if($cardDao->findByCpf($cpf) === false){
            
            $card = new Card();

            $card->name = $name;
            $card->register = intval($register);
            $card->position = $position;
            $card->function = $function;
            $card->generalRecord = $generalRecord;
            $card->cpf = $cpf;
            $card->maritalStatus = $maritalStatus;
            $card->placeOfBirth = $placeOfBirth;
            $card->worksplace = $worksplace;
            $currentDate = new DateTime('+2 Year');
            $card->validity = $currentDate->format('m-Y');
            
            $card->users_id = $userData->id;
            
            $cardDao->create($card);

        }else {
            $message->setMessage("Cpf já cadastrado", "danger", "back");
        }

    } else {
        $message->setMessage("Adicione nome, cpf e cargo!", "danger", "back");
    }

} else if($type === "update"){

    $name = filter_input(INPUT_POST, "name");
    $register = preg_replace( '/[^0-9]/is', '', filter_input(INPUT_POST, "register"));
    $position = filter_input(INPUT_POST, "position");
    $function = filter_input(INPUT_POST, "function");
    $generalRecord = filter_input(INPUT_POST, "generalRecord");
    $cpf = preg_replace( '/[^0-9]/is', '', filter_input(INPUT_POST, "cpf"));
    $maritalStatus = filter_input(INPUT_POST, "maritalStatus");
    $placeOfBirth = filter_input(INPUT_POST, "placeOfBirth");
    $worksplace = filter_input(INPUT_POST, "worksplace");
    $users_id = filter_input(INPUT_POST, "users_id");
    $id = filter_input(INPUT_POST, "id");

    $cardData = $cardDao->findById($id);
        
    if(!empty($name) && !empty($cpf) && !empty($position)) {

        $cardData->name = $name;
        $cardData->register = intval($register);
        $cardData->position = $position;
        $cardData->function = $function;
        $cardData->generalRecord = $generalRecord;
        $cardData->cpf = $cpf;
        $cardData->maritalStatus = $maritalStatus;
        $cardData->placeOfBirth = $placeOfBirth;
        $cardData->worksplace = $worksplace;
        $currentDate = new DateTime('+2 Year');
        $cardData->validity = $currentDate->format('m-Y');
        $cardData->users_id = $userData->id;
        $cardData->id = $id;


        if(isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])){

            $image = $_FILES["image"];
            $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
            $jpgArray = ["image/jpeg", "image/jpg"];
        
            if(in_array($image["type"], $imageTypes)) {

                if(in_array($image["type"], $jpgArray)){
                    $imageFile = imagecreatefromjpeg($image["tmp_name"]);
                } else {
                    $imageFile = imagecreatefrompng($image["tmp_name"]);
                }

                $imageName = $cardData->imageGenerateName();

                imagejpeg($imageFile, "./img/members/". $imageName, 100);

                $cardData->image = $imageName;

            } else {
                $message->setMessage("Tipo de imagem inválida, insira png ou jpg!", "danger", "back");
            }
        }

        $cardDao->update($cardData);

    } else {
        $message->setMessage("Adicione nome, cpf e cargo!", "danger", "back");
    }

} else if($type === "delete"){

    $id = filter_input(INPUT_POST, "id");

    $cardData = $cardDao->findById($id);

    if($cardData) {

        if($userData->access_level === "administrator") {

            $cardDao->destroy($cardData->id);

        } else {
            $message->setMessage("Você não tem permissão para deletar membros!", "danger", "back");
        }

    } else {
        $message->setMessage("Membro não encontrado!", "danger", "back");
    }

}