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

        }
        public function findAll(){
            return [];
        }
        public function findById($id){
            
        }
        public function create(Card $Card){
            
        }
        public function update(Card $Card){
            
        }
        public function destroy($id){
            
        }
    }