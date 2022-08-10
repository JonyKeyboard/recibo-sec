<?php

    require_once("models/Card.php");
    require_once("models/Message.php");

    class CardDAO implements CardDAOInterface {

        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function buildCard($data){

            $card = new Card();

            $card->id = $data["id"];
            $card->name = $data["name"];
            $card->register = $data["register"];
            $card->position = $data["position"];
            $card->function = $data["function"];
            $card->image = $data["image"];
            $card->generalRecord = $data["general_record"];
            $card->cpf = $data["cpf"];
            $card->maritalStatus = $data["marital_status"];
            $card->placeOfBirth = $data["place_of_birth"];
            $card->worksplace = $data["worksplace"];
            $card->validity = $data["validity"];
            $card->users_id = $data["users_id"];
            
            return $card;

        }
        public function findAll(){
            
            $cards = [];

            $stmt = $this->conn->query("SELECT * FROM cards ORDER BY id DESC");

            $stmt->execute();

            if($stmt->rowCount() > 0){

                $cardsArray = $stmt->fetchAll();

                foreach($cardsArray as $card) {
                    $cards[] = $this->buildCard($card);
                }
            }
            
            return $cards;


        }
        public function findById($id){
            
        }
        public function findByCpf($cpf){

            if($cpf != "") {
                
                $stmt = $this->conn->prepare("SELECT * FROM cards WHERE cpf = :cpf");

                $stmt->bindParam(":cpf", $cpf);

                $stmt->execute();

                if($stmt->rowCount() > 0){

                   
                    
                    $data = $stmt->fetch();
                    $card = $this->buildCard($data);

                    return $card;

                } else {
                    return false;
                }

            } else {
                return false;
            }

        }
        public function create(Card $card){

            $stmt = $this->conn->prepare("INSERT INTO cards (name, register, position, 
            function, image, general_record, cpf, marital_status, place_of_birth, worksplace, validity, users_id
            ) VALUES (
                :name, :register, :position, :function, :image, :general_record, :cpf, :marital_status, :place_of_birth, :worksplace, :validity, :users_id
            )");

            $stmt->bindParam(":name", $card->name);
            $stmt->bindParam(":register", $card->register);
            $stmt->bindParam(":position", $card->position);
            $stmt->bindParam(":function", $card->function);
            $stmt->bindParam(":image", $card->image);
            $stmt->bindParam(":general_record", $card->generalRecord);
            $stmt->bindParam(":cpf", $card->cpf);
            $stmt->bindParam(":marital_status", $card->maritalStatus);
            $stmt->bindParam(":place_of_birth", $card->placeOfBirth);
            $stmt->bindParam(":worksplace", $card->worksplace);
            $stmt->bindParam(":validity", $card->validity);
            $stmt->bindParam(":users_id", $card->users_id);

            $stmt->execute();

            // Msg add com sucesso
            $this->message->setMessage("Membro adicionado com sucesso!", "success", "card.php");
        
        }
        public function update(Card $Card){
            
        }
        public function updateValidity($id){
            
        }
        public function destroy($id){
            
        }
    }