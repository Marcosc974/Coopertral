
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './classes/Usuario.php';
        require_once './classes/UsuarioDAO.php';
        
        $u = new Usuario();
        $u->setUnome("Marcos");
        $u->setUperfil(1);
        $u->setUemail("marcosc@gmail.com");
        $u->setUsenha("admin");
        $uda= new UsuarioDAO();
        $uda->salvar($u);
        ?>
    </body>
</html>
