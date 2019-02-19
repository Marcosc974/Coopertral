<?php

class Usuario {

    private $uid;
    private $unome;
    private $email;
    private $senha;
    private $status;
    private $perfil;
    
    public function getIdUser() {
        return $this->idUser;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getNascimento() {
        return $this->nascimento;
    }

    public function getSobre() {
        return $this->sobre;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setIdUser($idUser) {
        $this->idUser = filter_var($idUser, FILTER_VALIDATE_INT);
    }

    public function setNome($nome) {
        if (!empty($nome) && trim($nome)) {
            $this->nome = filter_var($nome, FILTER_SANITIZE_STRING);
        }
    }

    public function setSobrenome($sobrenome) {
        if (!empty($sobrenome) && trim($sobrenome)) {
            $this->sobrenome = filter_var($sobrenome, FILTER_SANITIZE_STRING);
        }
    }

    public function setEmail($email) {
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

    public function setSobre($sobre) {
        $this->sobre = $sobre;
    }

    public function setStatus($status) {
        $this->status = filter_var($status, FILTER_VALIDATE_BOOLEAN);
    }

    public function setPerfil($perfil) {
        $this->perfil = filter_var($perfil, FILTER_VALIDATE_INT);
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

}
