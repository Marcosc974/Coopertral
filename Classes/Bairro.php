<?php

class Bairro {
   private $bid;
   private $bnome;

   function getBid() {
       return $this->bid;
   }

   function getBnome() {
       return $this->bnome;
   }

   function setBid($bid) {
       $this->bid = $bid;
   }

   function setBnome($bnome) {
       $this->bnome = $bnome;
   }


}
