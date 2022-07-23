<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Receipt.php");
require_once("dao/receiptDAO.php");

$receiptDao = new receiptDAO($conn);

// Regate do tipo de formulário
$type = filter_input(INPUT_POST, "type");

if($type === "create"){

    // Recebendo os dados dos inputs
    $payer = filter_input(INPUT_POST, "payer");
    $value = filter_input(INPUT_POST, "value");
    $emission = filter_input(INPUT_POST, "emission");
    $description = filter_input(INPUT_POST, "description");
  
    $receipt = new Receipt();

    // Validação mínima dos dados
    if(!empty($payer) && !empty($value) && !empty($emission)) {

        $receipt->payer = $payer;
        $receipt->value = $value;
        $receipt->emission = $emission;
        $receipt->description = $description;

        $receiptDao->create($receipt);
    
    }
}