<?php

    class Card {

        public $id;
        public $name;
        public $register;
        public $position;
        public $function;
        public $image;
        public $generalRecord;
        public $cpf;
        public $maritalStatus;
        public $placeOfBirth;
        public $worksplace;
        public $validity;
        public $users_id;

        public function imageGenerateName() {
            return bin2hex(random_bytes(60)) . ".jpg";
        }

    }

    interface CardDAOInterface {

        public function buildCard($data);
        public function findAll();
        public function findById($id);
        public function findByCpf($cpf);
        public function create(Card $card);
        public function update(Card $card);
        public function updateValidity($id);
        public function destroy($id);

    }