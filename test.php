<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'classes/Usuario.php';
        require_once 'classes/UsuarioDAO.php';
        $u = new Usuario();
        $ud= new UsuarioDAO();
        
        $u->setUemail("marcosc974@gmail.com");
        $u->setUsenha("marcosc974@gmail.com");
        if ($ud->trocarSenha($u)) {
            echo 'Atualizou';
        }
        else{
            echo 'Não atualizou';
        }
        ?>
    </body>
</html>
