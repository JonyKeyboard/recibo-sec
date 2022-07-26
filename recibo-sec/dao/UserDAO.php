<?php

    require_once("models/User.php");
    require_once("models/Message.php");

    class UserDAO implements UserDAOInterface {

        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }


        public function buildUser($data){

        }
        public function create(User $user, $authUser = false) {
            $stmt = $this->conn->prepare("INSERT INTO users(name, email, password) 
            VALUES (:name, :email, :password)");

            $stmt->bindParam(":name", $user->name);
            $stmt->bindParam(":email", $user->email);
            $stmt->bindParam(":password", $user->password);

            $stmt->execute();

        }
        public function update(User $user, $redirect = true){


            
        }
        public function verifyToken($protected = false){
            
        }
        public function setTokenToSession($token, $redirect = true){
            
        }
        public function authenticateUser($email, $password){
            
        }
        public function findByEmail($email) {
            
            if($email != "") {
                
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");

                $stmt->bindParam(":email", $email);

                $stmt->execute();

                if($stmt->rowCount() > 0){
                    
                    $data = $stmt->fetch();
                    $user = $this->buildUser($data);

                    return $user;

                } else {
                    return false;
                }

            } else {
                return false;
            }

        }
        public function findById($id){
            
        }
        public function findByToken($token){
            
        }
        public function destroyToken(){
            
        }
        public function changePassword(User $user){
            
        }
    
    }