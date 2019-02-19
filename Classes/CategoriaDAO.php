<?php
require_once'Conexao.php';
Class CategoriaDAO {

    public function salvar(Categoria $c) {
        try {
            $sql = "INSERT INTO categoria(cnome) VALUES (?)";

            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $c->getCnome());
            $stm->execute();
            return "categoria Salvo Com sucesso!";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM categoria ORDER BY cnome ASC";
            $stm = Conexao::conectar()->query($sql);
            
            if ($stm->rowCount() > 0) {
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function atualizar(Categoria $c) {
        try {
            $sql = "UPDATE categoria SET cnome=? WHERE cid=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $c->getCnome());
            $stm->bindValue(2, $c->getCid());
            $stm->execute();
            return "Categoria atualizada com sucesso!";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function excluir($id) {
        try {
            $sql = "DELETE FROM categoria WHERE cid=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            return "Excluído com sucesso!";
        } catch (Exception $e) {
           return $e->getMessage();
        }
    }

    public function buscar($id) {
        try {
            $sql = "SELECT * FROM categoria WHERE cid=?";
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