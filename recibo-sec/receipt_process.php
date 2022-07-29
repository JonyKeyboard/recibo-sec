<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Receipt.php");
require_once("models/Message.php");
require_once("dao/receiptDAO.php");

$message = new Message($BASE_URL);

$receiptDao = new ReceiptDAO($conn, $BASE_URL);

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
        $receipt->value = number_format($value, 2);
        $receipt->emission = $emission;
        $receipt->description = $description;

        $receiptDao->create($receipt);

        // GERAR UM PDF E VOLTAR PARA A PÁGINA DE LISTAGEM DE RECIBO

        //$message->setMessage("Recibo gerado com sucesso", "success", "editreceipt.php?");
    
    } else {
        $message->setMessage("Sacado, Valor e Emissão devem estar preenchidos", "danger", "back");
    }
}