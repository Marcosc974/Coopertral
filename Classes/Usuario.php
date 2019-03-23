<?php

class Usuario {

    private $uid;
    private $unome;
    private $uemail;
    private $usenha;
    private $ustatus;
    private $uestabelecimento;
    private $uperfil;

    function getUid() {
        return $this->uid;
    }

    function getUnome() {
        return $this->unome;
    }

    function getUemail() {
        return $this->uemail;
    }

    function getUsenha() {
        return $this->usenha;
    }

    function getUstatus() {
        return $this->ustatus;
    }

    function getUestabelecimento() {
        return $this->uestabelecimento;
    }

    function getUperfil() {
        return $this->uperfil;
    }

    function setUid($uid) {
        $this->uid = $uid;
    }

    function setUnome($unome) {
        $this->unome = $unome;
    }

    function setUemail($uemail) {
        if (filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
            $this->uemail = $uemail;
        }
        return false;
    }

    function setUsenha($usenha) {
        $this->usenha = $usenha;
    }

    function setUstatus($ustatus) {
        $this->ustatus = $ustatus;
    }

    function setUestabelecimento($uestabelecimento) {
        $this->uestabelecimento = $uestabelecimento;
    }

    function setUperfil($uperfil) {
        $this->uperfil = $uperfil;
    }

}
