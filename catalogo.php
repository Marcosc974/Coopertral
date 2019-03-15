<?php
include_once"template/header.php";
require_once '_autoload.php';
$ce = new ControllerEstabelecimento();
$ce->buscar();
?>

<main role="main">
    <section class="jumbotron jumbotron-fluid" style="background-image: url(./images/search.jpg);">
        <div class="container">
            <h1 class="display-4 text-white text-center">Catálogo Comercial</h1></br>
            <form method="post">
                <div class="form-row">
                    <div class="col-md-4 col-sm-12 form-group">
                        <input type="search" class="form-control form-control-lg" name="nome" placeholder="EX:. Nome ou Categoria">
                    </div>
                    <div class="col-md-3 col-sm-12 form-group">
                        <select class="form-control form-control-lg" name="categoria">
                            <option selected disabled value="NULL">Categoria</option>
                            <?php
                            $categoria = new CategoriaDAO();
                            foreach ($categoria->listar() as $ca) {
                                ?>
                                <option value="<?= $ca['cid']; ?>"><?= $ca['cnome']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3 form-group">
                        <select class="form-control  form-control-lg" name="bairro">
                            <option selected disabled value="NULL">Bairro</option>
                            <?php
                            $bairro = new BairroDAO();

                            foreach ($bairro->listar() as $ba) {
                                ?>
                                <option value="<?= $ba['bid']; ?>"><?= $ba['bnome']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12 form-group">
                        <button type="submit" class="btn btn-success btn-lg" name="acao" value="true"><i class="fa fa-search"></i> Pesquisar</button>
                    </div>
                </div>
            </form>
            <p class="lead text-white text-center">Utilize a Opção acima para filtrar os melhores resultados.</p>

        </div>
    </section>
    <section class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <!--Card-->
                <?php
                $lista = new EstabelecimentoDAO();
                if (!$ce->buscar()) {
                    if ($lista->listar()) {
                        foreach ($lista->listar() as $l) {
                            ?>
                            <div class="col-md-3 col-sm-4">
                                <div class="card mb-2 shadow" >
                                    <a href="detalhes.php?store=<?= $l['eid'] ?>" style="text-decoration: none;">
                                        <?php
                                        if (isset($l['eimagem']) || !empty($l['eimagem']) || $l['eimagem'] != "") {
                                            ?>
                                            <img class="card-img-top" src="fotos/<?= $l['eimagem'];?>" alt="<?= $l['eimagem'];?>" rel="nofollow">
                                        <?php } else {
                                            ?>
                                            <img class="card-img-top" src="images/teste.svg" rel="nofollow">
                                            <?php
                                        }
                                        ?>
                                        <div class="card-body">
                                            <p class="card-text text-center">
                                                <b><?= $l['enome'] ?></b><br/>
                                                <?= $l['etelefone'] ?><br/>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo"<div class='alert alert-danger'>Não existem estebelecimentos cadastrados ainda seja o primeiro.</div>";
                    }
                } elseif ($ce->buscar()) {
                    echo '<h1 class="display-4 col-md-12 text-success">Encontrado(s) </h1>';
                    foreach ($ce->buscar as $r) {
                        ?>

                        <div class="col-md-3">
                            <div class="card  mb-4 shadow" >
                                <a href="detalhes.php?store=<?= $r['eid'] ?>" style="text-decoration: none;">
                                    <?php
                                    if (isset($r['eimagem']) || !empty($r['eimagem']) || $r['eimagem'] != "") {
                                        ?>
                                        <img class="card-img-top" src="fotos/<?= $r['eimagem'] ?>">
                                    <?php } else {
                                        ?>
                                        <img class="card-img-top" src="images/teste.svg">
                                        <?php
                                    }
                                    ?>
                                    <div class="card-body">
                                        <p class="card-text text-center">
                                            <b><?= $r['enome'] ?></b><br/>
                                            <?=$r['cnome'] ?><br/>
                                            <?=$r['etelefone'] ?><br/>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-danger"><p class="display-4">Nenhuma busca realizada!</p></div>
                    <?php
                }
                ?>
                <!--End Card-->
            </div>
        </div> 
    </section>
</main>
<?php include_once"template/footer.php"; ?>