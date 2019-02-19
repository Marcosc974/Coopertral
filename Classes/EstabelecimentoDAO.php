<?php

require_once 'Conexao.php';

class EstabelecimentoDAO {

    public function salvar(Estabelecimento $e) {
        try {
            $sql = "INSERT INTO estabelecimento(enome,eendereco,etelefone,eemail,elink,esite,edescricao,eimagem,eterms,ebairro,ecategoria) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $e->getEnome());
            $stm->bindValue(2, $e->getEendereco());
            $stm->bindValue(3, $e->getEtelefone());
            $stm->bindValue(4, $e->getEemail());
            $stm->bindValue(5, $e->getElink());
            $stm->bindValue(6, $e->getEsite());
            $stm->bindValue(7, $e->getEdescricao());
            $stm->bindValue(8, $e->getEimagem());
            $stm->bindValue(9, $e->getEterms());
            $stm->bindValue(10, $e->getEbairro());
            $stm->bindValue(11, $e->getEcategoria());
            $stm->execute();
            return "Dados do estabelecimento salvos com sucesso!";
        } catch (Exception $e) {
            return "Erro ao salvar a Classe: (Estabelecimento): " . $e->getMessage();
        }
    }

    public function alterarStatus($status, $eid) {
        try {
            $sql = "UPDATE estabelecimento SET estatus=? WHERE eid=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $status);
            $stm->bindValue(2, $eid);
            $stm->execute();
            return "Dados do estabelecimento Editados com sucesso!";
        } catch (Exception $e) {
            return "Erro ao Editar a Classe: (Estabelecimento): " . $e->getMessage();
        }
    }

    public function update(Estabelecimento $e) {
        try {
            $sql = "UPDATE estabelecimento SET enome=?,eendereco=?,etelefone=?,eemail=?,elink=?,esite=?,edescricao=?,ebairro=?,ecategoria=? WHERE eid=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $e->getEnome());
            $stm->bindValue(2, $e->getEendereco());
            $stm->bindValue(3, $e->getEtelefone());
            $stm->bindValue(4, $e->getEemail());
            $stm->bindValue(5, $e->getElink());
            $stm->bindValue(6, $e->getEsite());
            $stm->bindValue(7, $e->getEdescricao());
            $stm->bindValue(8, $e->getEbairro());
            $stm->bindValue(9, $e->getEcategoria());
            $stm->bindValue(10, $e->getEid());
            $stm->execute();
            return "Dados do estabelecimento Editados com sucesso!";
        } catch (Exception $e) {
            return "Erro ao Editar a Classe: (Estabelecimento): " . $e->getMessage();
        }
    }

    public function trocarFoto(Estabelecimento $e) {
        try {
            $sql = "UPDATE estabelecimento SET eimagem=? WHERE eid=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $e->getEimagem());
            $stm->bindValue(2, $e->getEid());
            $stm->execute();
            return "Foto Atualizada com Sucesso!";
        } catch (Exception $e) {
            return "Erro ao Editar a Classe: (Estabelecimento): " . $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT eid,enome,eimagem,etelefone,eemail FROM estabelecimento WHERE estatus = 1 ORDER BY edata DESC LIMIT 12";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();
            return $result;
        } catch (Exception $e) {
            return "Erro- listar- Class: (Estabelecimento): " . $e->getMessage();
        }
    }

    public function listarAdm() {
        try {
            $sql = "SELECT * FROM estabelecimento WHERE eid <> 1";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();
            return $result;
        } catch (Exception $e) {
            return "Erro- listar- Class: (Estabelecimento): " . $e->getMessage();
        }
    }

    public function store($eid) {
        try {
            $sql = "SELECT eid,enome,bnome,cnome,eimagem,etelefone,eendereco,eemail,esite,elink,edescricao FROM estabelecimento
                INNER JOIN bairro on estabelecimento.ebairro = bairro.bid
                INNER JOIN categoria on estabelecimento.ecategoria = categoria.cid
                WHERE eid=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $eid);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            return "Erro- listar- Class: (Estabelecimento): " . $e->getMessage();
        }
    }

    public function catalogar($district, $category, $name) {
        try {

            $sql = "SELECT eid,enome,eimagem,etelefone,eemail,bnome,cnome FROM estabelecimento
                INNER JOIN bairro on estabelecimento.ebairro = bairro.bid
                INNER JOIN categoria on estabelecimento.ecategoria = categoria.cid WHERE bairro.bid=? OR categoria.cid=? OR estabelecimento.enome LIKE ?;";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $district);
            $stm->bindValue(2, $category);
            $stm->bindValue(3, '%' . $name . '%');
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return "Erro ao Catalogar na Classe: (Estabelecimento): " . $e->getMessage();
        }
    }

    public function excluir(Estabelecimento $e) {
        try {
            $sql = "DELETE FROM Estabelecimento WHERE id=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $e->idEstabelecimento);
            $stm->execute();
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro: excluir Class: (Estabelecimento): " . $e->getMessage();
        }
    }

    public function verificaCadastro($email) {
        $sql = "SELECT eemail FROM estabelecimento WHERE eemail=?";
        $stm = Conexao::conectar()->prepare($sql);
        $stm->bindValue(1, $email);
        $stm->execute();
        $res = $stm->rowCount();
        if ($res > 0) {
            return false;
        }
        return true;
    }

}
