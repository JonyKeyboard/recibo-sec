<?php

    class Receipt {

        public $id;
        public $payer;
        public $value;
        public $emission;
        public $description;

    }

    interface ReceiptDAOInterface {

        public function findAll();
        public function findById($id);
        public function create(Receipt $receipt);
        public function update(Receipt $receipt);
        public function destroy($id);

    }