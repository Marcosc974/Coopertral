<?php

require_once'Conexao.php';

Class UsuarioDAO {

    public function salvar(Usuario $u) {
        try {
            $sql = "INSERT INTO usuario(unome,uemail,usenha,ustatus,uestabelecimento,uperfil) VALUES (?,?,?,?,?,?)";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getUnome());
            $stm->bindValue(2, $u->getUemail());
            $stm->bindValue(3, password_hash($u->getUsenha(), PASSWORD_DEFAULT));
            $stm->bindValue(4, $u->getUstatus());
            $stm->bindValue(5, $u->getUestabelecimento());
            $stm->bindValue(6, $u->getUperfil());
            $stm->execute();
            return true;
        } catch (Exception $e) {
            if ($e->errorInfo[1] == 1062) {
                return 'Este e-mail já está sendo utilizado!';
            }
            return $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM usuario";
            $stm = Conexao::conectar()->query($sql);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function atualizar(Usuario $u) {
        try {
            $sql = "UPDATE usuario SET nomeUser=?, sobrenomeUser=?, nascimentoUser=?, sobreUser=? WHERE idUser=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getNome());
            $stm->bindValue(2, $u->getSobrenome());
            $stm->bindValue(3, date('Y-m-d', strtotime($u->getNascimento())));
            $stm->bindValue(4, $u->getSobre());
            $stm->bindValue(5, $u->getIdUser());
            $stm->execute();

            return "Dados Atualizados Com sucesso!";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function trocarSenha(Usuario $u) {
        try {
            $sql = "UPDATE usuario SET senhaUser =? WHERE emailUser=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, password_hash($u->getSenha(), PASSWORD_DEFAULT));
            $stm->bindValue(2, $u->getEmail());
            $stm->execute();
            return "Senha atualizada com sucesso! ";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function confirmarCadastro($email) {
        try {
            $sql = "UPDATE usuario SET statusUser= 1 WHERE emailUser=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $email);
            $stm->execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function trocarFoto(Usuario $u) {
        try {
            $sql = "UPDATE usuario SET fotoUser =? WHERE idUser=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getFoto());
            $stm->bindValue(2, $u->getIdUser());
            $stm->execute();
            return "Imagem alterada com suceso!";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function excluir(Usuario $u) {
        try {
            $sql = "DELETE FROM usuario WHERE id=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getId());
            $stm->execute();
            return "Usuário excluído com Sucesso!";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function buscar(Usuario $u) {
        try {
            $sql = "SELECT * FROM usuario WHERE idUser=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getIdUser());
            $stm->execute();
            if ($stm->rowCount() > 0) {
                $result = $stm->fetchObject();
                return $result;
            }
            return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function buscarLogin(Usuario $u) {
        $sql = "SELECT * FROM usuario WHERE uemail=?";
        $stm = Conexao::conectar()->prepare($sql);
        $stm->bindValue(1, $u->getUemail());
        $stm->execute();
        if ($stm->rowCount() > 0) {
            $result = $stm->fetchAll();
            return $result;
        }
        return false;
    }

}
