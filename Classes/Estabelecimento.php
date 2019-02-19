<?php

class Estabelecimento {

    private $eid;
    private $enome;
    private $ecnpj;
    private $eendereco;
    private $etelefone;
    private $eemail;
    private $elink;
    private $esite;
    private $edescricao;
    private $estatus;
    private $eimagem;
    private $eterms;
    private $ebairro;
    private $ecategoria;
    
    public function getEid(){
        return $this->eid;
    }
    public function setEid($eid){
        $this->eid = $eid;
    }
    public function getEnome(){
        return $this->enome;
    }
    public function setEnome($enome){
        $this->enome = $enome;
    }
    public function getEcnpj(){
        return $this->ecnpj;
    }
    public function setEcnpj($ecnpj){
        $this->ecnpj = $ecnpj;
    }
    public function getEendereco(){
        return $this->eendereco;
    }
    public function setEendereco($eendereco){
        $this->eendereco= $eendereco;
    }
    public function getEtelefone(){
        return $this->etelefone;
    }
    public function setEtelefone($etelefone){
      $this->etelefone = $etelefone; 
    }
    public function getEemail(){
        return $this->eemail;
    }
    public function setEemail($eemail){
        $this->eemail = $eemail;
    }
    public function getElink(){
        return $this->elink;
    }
    public function setElink($elink){
        $this->elink = $elink;
    }
    public function getEsite(){
        return $this->esite;
    }
    public function setEsite($esite){
        $this->esite = $esite;
    }
    public function getEdescricao(){
        return $this->edescricao;
    }
    public function setEdescricao($edescricao){
        $this->edescricao = $edescricao;
    }
    public function getEstatus(){
        return $this->estatus;
    }
    public function setEstatus($estatus){
        $this->elink = $elink;
    }
    public function getEimagem(){
        return $this->eimagem;
    }
    public function setEimagem($eimagem){
        $this->eimagem = $eimagem;
    }
    public function getEterms(){
        return $this->eterms;
    }
    public function setEterms($eterms){
        $this->eterms = $eterms;
    }
    public function getEbairro(){
        return $this->ebairro;
    }
    public function setEbairro($ebairro){
        $this->ebairro = $ebairro;
    }
    public function getEcategoria(){
        return $this->ecategoria;
    }
    public function setEcategoria($ecategoria){
        $this->ecategoria = $ecategoria;
    }
    
    
}
