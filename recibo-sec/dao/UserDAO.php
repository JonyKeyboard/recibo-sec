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

            $user = new User();

            $user->id = $data["id"];
            $user->name = $data["name"];
            $user->email = $data["email"];
            $user->password = $data["password"];
            $user->image = $data["image"];
            $user->token = $data["token"];

            return $user;

        }

        public function create(User $user) {

            $stmt = $this->conn->prepare("INSERT INTO users(name, email, password) 
            VALUES (:name, :email, :password)");

            $stmt->bindParam(":name", $user->name);
            $stmt->bindParam(":email", $user->email);
            $stmt->bindParam(":password", $user->password);

            $stmt->execute();

        }

        public function update(User $user, $redirect = true){

            $stmt = $this->conn->prepare("UPDATE users SET 
                name = :name,
                email = :email,
                image = :image,
                token = :token
                WHERE id = :id
            ");

            $stmt->bindParam(":name", $user->name);
            $stmt->bindParam(":email", $user->email);
            $stmt->bindParam(":image", $user->image);
            $stmt->bindParam(":token", $user->token);
            $stmt->bindParam(":id", $user->id);

            $stmt->execute();

            if($redirect) {
                $this->message->setMessage("Dados atualizados com sucesso!", "success", "dashboard.php");
            }
            
        }

        public function verifyToken($protected = false){

            if(!empty($_SESSION["token"])) {
                
                $token = $_SESSION["token"];

                $user = $this->findByToken($token);

                if($user) {
                    return $user;
                } else if($protected) {
                    $this->message->setMessage("","danger", "auth.php");
                }

            } else if($protected) {
                $this->message->setMessage("","danger", "auth.php");
            }
            
        }

        public function setTokenToSession($token, $redirect = true){
            
            $_SESSION["token"] = $token;

            if($redirect) {
                $this->message->setMessage("Seja bem-vindo!","success", "dashboard.php");
            }
        }

        public function authenticateUser($email, $password){
           
            $user = $this->findByEmail($email);
            
            if($user) {

                if(password_verify($password, $user->password)) {

                    $token = $user->generateToken();

                    $this->setTokenToSession($token, false);

                    $user->token = $token;

                    $this->update($user, false);

                    return true;

                } else {
                    return false;
                }

            } else {

                return false;

            }   

        }

        public function findAll(){

            $users = [];

            $stmt = $this->conn->query("SELECT * FROM users ORDER BY id DESC");

            $stmt->execute();

            if($stmt->rowCount() > 0){

                $usersArray = $stmt->fetchAll();

                foreach($usersArray as $user) {
                    $users[] = $this->buildUser($user);
                }
            }
            
            return $users;

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

            if($id != "") {
                
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");

                $stmt->bindParam(":id", $id);

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

        public function findByToken($token){
            
            if($token != "") {
                
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");

                $stmt->bindParam(":token", $token);

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

        public function destroyToken(){
            
            $_SESSION["token"] = "";

            $this->message->setMessage("Você fez logout com sucesso!", "success", "auth.php");
        }

        public function changePassword(User $user){
            
        }
    
    }