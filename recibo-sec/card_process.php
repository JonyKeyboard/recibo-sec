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
    $register = filter_input(INPUT_POST, "register");
    $position = filter_input(INPUT_POST, "position");
    $function = filter_input(INPUT_POST, "function");
    $generalRecord = filter_input(INPUT_POST, "generalRecord");
    $cpf = filter_input(INPUT_POST, "cpf");
    $formattedCpf = preg_replace( '/[^0-9]/is', '', $cpf );
    $maritalStatus = filter_input(INPUT_POST, "maritalStatus");
    $placeOfBirth = filter_input(INPUT_POST, "placeOfBirth");
    $worksplace = filter_input(INPUT_POST, "worksplace");
    //$validity = filter_input(INPUT_POST, "validity");
    $users_id = filter_input(INPUT_POST, "users_id");
        
    if(!empty($name) && !empty($formattedCpf) && !empty($position)) {

        if($cardDao->findByCpf($formattedCpf) === false){
            
            $card = new Card();

            $card->name = $name;
            $card->register = $register;
            $card->position = $position;
            $card->function = $function;
            $card->generalRecord = $generalRecord;
            $card->cpf = $formattedCpf;
            $card->maritalStatus = $maritalStatus;
            $card->placeOfBirth = $placeOfBirth;
            $card->worksplace = $worksplace;
            $currentDate = new DateTime('+2 Year');
            $card->validity = $currentDate->format('m-Y');
            
            //var_dump($card->validity);exit;
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

            //print_r($_POST);
            //print_r($_FILES);exit;

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