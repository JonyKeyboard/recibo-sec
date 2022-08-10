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
    $users_id = filter_input(INPUT_POST, "users_id");
        
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

                    $imageName = $card->imageGenerateName();

                    imagejpeg($imageFile, "./img/members/". $imageName, 100);

                    $card->image = $imageName;

                } else {
                    $message->setMessage("Tipo de imagem inválida, insira png ou jpg!", "danger", "back");
                }
            }

            $cardDao->create($card);

        }else {
            $message->setMessage("Cpf já cadastrado", "danger", "back");
        }

    } else {
        $message->setMessage("Adicione nome, cpf e cargo!", "danger", "back");
    }

} else if($type === "update"){

    
    
    
} else if($type === "delete"){

    

}