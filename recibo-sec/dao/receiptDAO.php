<?php

    require_once("models/Receipt.php");

    class receiptDAO implements ReceiptDAOInterface{

        private $conn;

        public function __construct(PDO $conn){
            $this->conn = $conn;
        }

        public function buildReceipt($data){

            $receipt = new Receipt();

            $receipt->id = $data["id"];
            $receipt->payer  = $data["payer"];
            $receipt->value = $data["value"];
            $receipt->emission = $data["emission"];
            $receipt->description = $data["description"];

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

        }
        public function create(Receipt $receipt){

            $stmt = $this->conn->prepare("INSERT INTO receipts (payer, value, emission, description
            ) VALUES (
                :payer, :value, :emission, :description
            )");

            $stmt->bindParam(":payer", $receipt->payer);
            $stmt->bindParam(":value", $receipt->value);
            $stmt->bindParam(":emission", $receipt->emission);
            $stmt->bindParam(":description", $receipt->description);
            
            $stmt->execute();

        }
        public function update(Receipt $receipt){

        }
        public function destroy($id){

        }

    }