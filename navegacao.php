<nav>
    <ul>
        <?php
        if ($_SESSION['perfil'] == 2) {
            ?>
            <li><a href="minhapagina.php">Página Inicial</a></li>
            <li><a href="editarloja.php">Meu Estabelecimento</a></li>
            <li><a href="perfil.php">Meus Dados Pessoais</a></li>
            <li><a href="galeria.php">Minha Galeria</a></li>
            <li><a href="logoff.php">Sair</a></li>
            <?php
        } else {
            ?>
            <li><a href="minhapagina.php">Página Inicial</a></li>
            <li><a href="bairroadm.php">Bairros</a></li>
            <li><a href="categoriaadm.php">Categorias</a></li>
            <li><a href="parceiros.php">Parceiros</a></li>
            <li><a href="logoff.php">Sair</a></li> 
        <?php } ?>
    </ul>
</nav>