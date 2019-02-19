<?php

class ControllerUsuario {

    var $user;
    var $login;

    public function index() {
        $u = new Usuario();
        $uDAO = new UsuarioDAO();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastrar'])) {
            try {
                $u->setIdUser(filter_input(INPUT_POST, 'idUser', FILTER_VALIDATE_INT));
                $u->setNome(filter_input(INPUT_POST, 'nome', FILTER_DEFAULT));
                $u->setSobrenome(filter_input(INPUT_POST, 'sobrenome', FILTER_DEFAULT));
                $u->setEmail(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
                $u->setSenha(filter_input(INPUT_POST, 'senha', FILTER_DEFAULT));
                $u->setNascimento(filter_input(INPUT_POST, 'nascimento', FILTER_DEFAULT));
                $u->setSobre(filter_input(INPUT_POST, 'sobre', FILTER_DEFAULT));
                if (isset($_FILES['imagem'])) {
                    $foto = $_FILES['imagem'];
                    if ($foto['name']) {
                        $up = new Upload();
                        $u->setFoto($up->enviarArquivo());
                        $uDAO->trocarFoto($u);
                    }
                }
                $u->setPerfil(2);
                if (!$u->getIdUser()) {
                    if ($uDAO->salvar($u) === true) {
                        $this->confirmar($u->getEmail(), $u->getNome());
                        header("location:sucesso.php?index=true");
                    } else {
                        return $this->user = $uDAO->salvar($u);
                    }
                } else {
                    return $this->user = $uDAO->atualizar($u);
                }
            } catch (Exception $e) {
                $this->user = $e->getMessage();
            }
        }
    }

    public function forgout() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['forgout'])) {
            $u = new Usuario();
            $getEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $u->setEmail($getEmail);
            $udao = new UsuarioDAO();
            if ($udao->buscarLogin($u)) {
                foreach ($udao->buscarLogin($u) as $email) {
                    if ($email['statusUser']) {
                        if ($getEmail === $email['emailUser']) {
                            $key = base64_encode($email['emailUser']);
                            require_once './PHPMailer/class.phpmailer.php';
                            $link = "<a href='teste.marcoscss.com.br/NovaSenha.php?key=".$key."'>Clique no link para Alterar a senha!</a>";
                            $mail = new PHPMailer(true);
                            $mail->CharSet = 'UTF-8';
                            $mail->isSMTP();
                            $mail->Host = 'mail.marcoscss.com.br';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'noreply@marcoscss.com.br';
                            $mail->Password = 'YHWH@33yauhu';
                            $mail->SMTPSecure = 'tls';
                            $mail->Port = 587;
                            $mail->setFrom('noreply@marcoscss.com.br', 'Projeto Patrocinadores');
                            $mail->addAddress($email['emailUser'], $email['nomeUser']);
                            $mail->isHTML(true);
                            $mail->Subject = 'Patrocinadores';
                            $mail->Body = 'Olá <b>' . $email['nomeUser'] . '<b> ' . $link . "<br/>Caso não tenha sido você, desconsidere este e-mail.";
                            if ($mail->send()) {
                                header("location:sucesso.php?forgout=true");
                            } else {
                                header("location:sucesso.php?forgout=false");
                            }
                        }
                    }else{
                        header("location:sucesso.php?status=false");
                    }
                }
            } else {
                header("location:sucesso.php?login=false");
            }
        }
    }

    public function updatePassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatePassword'])) {
            $email = filter_input(INPUT_POST, 'key', FILTER_DEFAULT);
            $newPassword = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
            $user = new Usuario();
            $user->setEmail(base64_decode($email));
            $user->setSenha($newPassword);
            $udao = new UsuarioDAO();
            if ($udao->trocarSenha($user)) {
                header("location:sucesso.php?update=true");
            } else {
                return $this->user = "Ocorreu algum erro na execução tente novamente mais tarde!";
            }
        }
    }

    public function logar() {
        $u = new Usuario();
        $uDAO = new UsuarioDAO();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logar'])) {
            #Recebe os dados enviados via post setando no objeto usuario
            $u->setEmail(filter_input(INPUT_POST, 'mail'));
            $u->setSenha(filter_input(INPUT_POST, 'senha'));
            #se o login(email) existir
            if ($uDAO->buscarLogin($u)) {
                #executa o foreach
                foreach ($uDAO->buscarLogin($u) as $hash) {
                    #se o usuario estiver ativo
                    if ($hash['statusUser']) {
                        #se a senha enviada via POST conferir com o hash da consulta
                        if (password_verify($_POST['pass'], $hash['senhaUser'])) {
                            #encaminha para o home
                            session_regenerate_id();
                            $_SESSION['idUser'] = $hash['idUser'];
                            $_SESSION['nomeUser'] = $hash['nomeUser'];
                            $_SESSION['emailUser'] = $hash['emailUser'];
                            $_SESSION['perfil'] = $hash['perfil'];
                            header('location:Home.php');
                        } else {
                            #se as senhas não conferirem volta para o index entregando o erro.
                            $this->login = "Usuário ou senha inválidos";
                        }
                    } else {
                        #Se não ouver status para o user volte para o login entregando a mensagem de erro.
                        $this->login = "Esta conta está Inativa.<br/>Caso não tenha confirmado o endereço de email faça antes de entrar!";
                    }
                }
            } else {
                #se o login não existir voltar para o login entregando o erro
                $this->login = "Usuário não Encontrado em nosso Banco de  Dados!";
            }
        }
    }

    function verificaLogin() {
        #Este método verifica se a sessão do usuário existe se não volta pro login
        if (!isset($_SESSION['nomeUser'])) {
            session_destroy();
            header("Location:Login.php");
        }
    }

    function verificaPerfil() {
        #Este método verifica se a sessão do usuário existe se não volta pro login
        if ($_SESSION['perfil'] == 2) {
            header("location:Home.php");
        }
    }

    function bloqueiaAcesso() {
        #Este método Verifica se o usuário tem permissão para acessar a página. quando estiver logado
        #Se não tive faz retornar a página anterior.
        if (isset($_SESSION['nomeUser'])) {
            $this->login = "Você não pode acessar esta página!";
            header("location:Home.php");
        }
    }

    function confirmar($email, $nome) {
        $key = base64_encode($email);
        require_once './PHPMailer/class.phpmailer.php';
        $link = "<a href='teste.marcoscss.com.br/confirmar.php?key=" . $key . "&a=yhwh'>Clique no link para Confirmar o cadastro!</a>";
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'mail.marcoscss.com.br';
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply@marcoscss.com.br';
        $mail->Password = 'YHWH@33yauhu';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('noreply@marcoscss.com.br', 'Projeto Patrocinadores');
        $mail->addAddress($email, $nome);
        $mail->isHTML(true);
        $mail->Subject = 'Patrocinadores';
        $mail->Body = 'Olá <b>' . $nome . '<b> ' . $link . " Caso não tenha sido você, desconsidere este e-mail.";
        
        if ($mail->send()) {
            return "Um link de confirmação foi enviado para o seu email!";
        } else {
            return "Erro ao enviar email de confirmação!";
        }
    }

}
