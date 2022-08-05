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

    }

    interface CardDAOInterface {

        public function buildCard($data);
        public function findAll();
        public function findById($id);
        public function create(Card $Card);
        public function update(Card $Card);
        public function destroy($id);

    }