<?php

    require_once("models/Receipt.php");
    require_once("models/Message.php");

    class ReceiptDAO implements ReceiptDAOInterface{

        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url ){
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function buildReceipt($data){

            $receipt = new Receipt();

            $receipt->id = $data["id"];
            $receipt->payer  = $data["payer"];
            $receipt->cpf  = $data["cpf"];
            $receipt->value = number_format($data["value"], 2, ",", ".");
            $receipt->emission = $data["emission"];
            $receipt->description = $data["description"];
            $receipt->users_id = $data["users_id"];

            return $receipt;

        }

        public function findAll(){

            $receipts = [];

            $stmt = $this->conn->query("SELECT * FROM receipts ORDER BY id DESC");

            $stmt->execute();

            if($stmt->rowCount() > 0){

                $receiptsArray = $stmt->fetchAll();

                foreach($receiptsArray as $receipt) {
                    $receipts[] = $this->buildReceipt($receipt);
                }
            }
            
            return $receipts;

        }
        public function findById($id){

            if($id != "") {
                
                $stmt = $this->conn->prepare("SELECT * FROM receipts WHERE id = :id");

                $stmt->bindParam(":id", $id);

                $stmt->execute();

                if($stmt->rowCount() > 0){
                    
                    $data = $stmt->fetch();
                    $user = $this->buildReceipt($data);

                    return $user;

                } else {
                    return false;
                }

            } else {
                return false;
            }

        }
   
        public function create(Receipt $receipt){

            $stmt = $this->conn->prepare("INSERT INTO receipts (payer, cpf, value, emission, description, users_id
            ) VALUES (
                :payer, :value, :emission, :description, :users_id
            )");

            $stmt->bindParam(":payer", $receipt->payer);
            $stmt->bindParam(":cpf", $receipt->cpf);
            $stmt->bindParam(":value", $receipt->value);
            $stmt->bindParam(":emission", $receipt->emission);
            $stmt->bindParam(":description", $receipt->description);
            $stmt->bindParam(":users_id", $receipt->users_id);
            
            $stmt->execute();

            $last_id = $this->conn->lastInsertId();

            $this->message->setMessage("Recibo gerado com sucesso!","success", "editreceipt.php?id=". $last_id);

        }
        public function update(Receipt $receipt){

            $stmt = $this->conn->prepare("UPDATE receipts SET 
                payer = :payer, 
                cpf = :cpf,
                value = :value, 
                emission = :emission, 
                description = :description, 
                users_id = :users_id
                WHERE id = :id");

            $stmt->bindParam(":payer", $receipt->payer);
            $stmt->bindParam(":cpf", $receipt->cpf);
            $stmt->bindParam(":value", $receipt->value);
            $stmt->bindParam(":emission", $receipt->emission);
            $stmt->bindParam(":description", $receipt->description);
            $stmt->bindParam(":users_id", $receipt->users_id);
            $stmt->bindParam(":id", $receipt->id);
            
            $stmt->execute();

            $this->message->setMessage("Recibo alterado com sucesso!","success", "editreceipt.php?id=". $receipt->id);

        }
        public function destroy($id){

        }

    }