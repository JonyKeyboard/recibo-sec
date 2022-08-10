<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Receipt.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");
require_once("dao/ReceiptDAO.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);
$receiptDao = new ReceiptDAO($conn, $BASE_URL);

$type = filter_input(INPUT_POST, "type");

$userData = $userDao->verifyToken();

if($type === "create"){

    $payer = filter_input(INPUT_POST, "payer");
    $cpf = preg_replace( '/[^0-9]/is', '', filter_input(INPUT_POST, "cpf"));
    $value = str_replace(',', '.', str_replace('.', '', filter_input(INPUT_POST, "value")));
    $emission = filter_input(INPUT_POST, "emission");
    $description = filter_input(INPUT_POST, "description");
  
    $receipt = new Receipt();

    if(!empty($payer) && !empty($value) && !empty($emission)) {

        $receipt->payer = $payer;
        $receipt->cpf = $cpf;
        $receipt->value = floatval($value);
        $receipt->emission = $emission;
        $receipt->description = $description;
        $receipt->users_id = $userData->id;

        var_dump($receipt);exit;

        $receiptDao->create($receipt);
    
    } else {
        $message->setMessage("Sacado, Valor e Emissão devem estar preenchidos", "danger", "back");
    }

} else if($type === "update"){

    $payer = filter_input(INPUT_POST, "payer");
    $cpf = filter_input(INPUT_POST, "cpf");
    $value = filter_input(INPUT_POST, "value");
    $emission = filter_input(INPUT_POST, "emission");
    $description = filter_input(INPUT_POST, "description");
    $users_id = filter_input(INPUT_POST, "users_id");
    $id = filter_input(INPUT_POST, "id");
    
    $receipt = new Receipt();

    if(!empty($payer) && !empty($value) && !empty($emission)) {

        $receipt->payer = $payer;
        $receipt->cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        $receipt->value = floatval(str_replace(',', '.', str_replace('.', '', $value)));
        $receipt->emission = $emission;
        $receipt->description = $description;
        $receipt->users_id = $users_id;    
        $receipt->id = $id;    
        $receiptDao->update($receipt);
    
    } else {
        $message->setMessage("Sacado, Valor e Emissão devem estar preenchidos", "danger", "back");
    }
    
} else if($type === "delete"){

    $id = filter_input(INPUT_POST, "id");

    $receipt = $receiptDao->findById($id);

    if($receipt) {

        if($receipt->users_id === $userData->id) {

            $receiptDao->destroy($receipt->id);

        } else {
            $message->setMessage("Recibo criado por outro usuário!", "danger", "back");
        }

    } else {
        $message->setMessage("Recibo não encontrado!", "danger", "back");
    }

}