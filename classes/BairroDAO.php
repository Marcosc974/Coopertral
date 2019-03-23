<?php
require_once'Conexao.php';
Class BairroDAO {

    public function salvar(Bairro $b) {
        try {
            $sql = "INSERT INTO bairro(bnome) VALUES (?)";

            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1,$b->getBnome());
            $stm->execute();
            return "categoria Salvo Com sucesso!";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM bairro ORDER BY bnome ASC";
            $stm = Conexao::conectar()->query($sql);
            if ($stm->rowCount() > 0) {
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function atualizar(Bairro $b) {
        try {
            $sql = "UPDATE bairro SET bnome =? WHERE bid=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $b->getBnome());
            $stm->bindValue(2, $b->getBid());
            $stm->execute();
            return "Bairro atualizada com sucesso!";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function buscar($id) {
        try {
            $sql = "SELECT * FROM bairro WHERE bid=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();

            if ($stm->rowCount() > 0) {
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        } catch (Exception $e) {
            return "Erro: buscarBuscar(CDAO):".$e->getMessage();
        }
    }

}