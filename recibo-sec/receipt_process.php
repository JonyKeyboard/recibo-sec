<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Receipt.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");
require_once("dao/receiptDAO.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);
$receiptDao = new ReceiptDAO($conn, $BASE_URL);

// Regate do tipo de formulário
$type = filter_input(INPUT_POST, "type");

$userData = $userDao->verifyToken();

if($type === "create"){

    $payer = filter_input(INPUT_POST, "payer");
    $value = filter_input(INPUT_POST, "value");
    $emission = filter_input(INPUT_POST, "emission");
    $description = filter_input(INPUT_POST, "description");
  
    $receipt = new Receipt();

    if(!empty($payer) && !empty($value) && !empty($emission)) {

        $receipt->payer = $payer;
        $receipt->value = number_format($value, 2);
        $receipt->emission = $emission;
        $receipt->description = $description;
        $receipt->users_id = $userData->id;

        $receiptDao->create($receipt);
    
    } else {
        $message->setMessage("Sacado, Valor e Emissão devem estar preenchidos", "danger", "back");
    }

} else if($type === "update"){

    $payer = filter_input(INPUT_POST, "payer");
    $value = filter_input(INPUT_POST, "value");
    $emission = filter_input(INPUT_POST, "emission");
    $description = filter_input(INPUT_POST, "description");
    
    $receipt = new Receipt();

    if(!empty($payer) && !empty($value) && !empty($emission)) {

        $receipt->payer = $payer;
        $receipt->value = number_format($value, 2);
        $receipt->emission = $emission;
        $receipt->description = $description;

        $receiptDao->create($receipt);
    
    } else {
        $message->setMessage("Sacado, Valor e Emissão devem estar preenchidos", "danger", "back");
    }
    
} else if($type === "delete"){

    echo "FUNFOU";exit;

}