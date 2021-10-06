<?php

    class BankAccount {

        private int $accountNbr;
        private bool $blocked = true;
        private float $balance = 1000;

        public function addAmount (float $amount) : void {
            $this -> balance += $amount;
        }
        
        public function substractAmount (float $amount) : void {
            $this -> balance -= $amount;
        }

        public function toggleBlock () : void {
            if ($this -> blocked == true) {
                $this->blocked = false;
            } else {
                $this->blocked = true;
            }
        }

    }

?>
