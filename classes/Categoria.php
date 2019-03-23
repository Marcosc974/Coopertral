<?php

class Categoria {

    private $cid;
    private $cnome;
    function getCid() {
        return $this->cid;
    }

    function getCnome() {
        return $this->cnome;
    }

    function setCid($cid) {
        $this->cid = $cid;
    }

    function setCnome($cnome) {
        $this->cnome = $cnome;
    }


}
