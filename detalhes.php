<?php
include_once"template/header.php";
require_once '_autoload.php';
$lista = new EstabelecimentoDAO();
?>
<main role="main">
    <div class="bg-light">
        <div class="container">
            <section class="album py-5 bg-light">
                <?php
                foreach ($lista->store($_GET['store']) as $detail) {
                    ?>
                    <div class="row">

                        <div class="col-md-4">
                            <?php
                            if (isset($detail['eimagem'])) {
                                ?>
                                <img class="card-img-top img-thumbnail" src="fotos/<?= $detail['eimagem']; ?>">
                            <?php } else {
                                ?>
                                <img class="card-img-top" src="images/teste.svg">
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-8">
                            <h1><?= $detail['enome']; ?></h1>
                            <strong><i class="fa fa-home"></i> Endereço: </strong><?= $detail['eendereco']; ?><br/>
                            <strong><i class="fa fa-phone"></i> Telefone: </strong><a href="tel:<?= $detail['etelefone']; ?>"><?= $detail['etelefone']; ?></a><br/>
                            <strong><i class="fa fa-envelope"></i> E-mail: </strong> <a href="mailto:<?= $detail['eemail']; ?>"><?= $detail['eemail']; ?></a><br/>
                            <strong><i class="fa fa-globe"></i> Site: </strong> <a target="_blank" href="<?= $detail['esite']; ?>"><?= $detail['esite']; ?></a><br/>
                            <strong><i class="fa fa-building"></i> Bairro: </strong> <?= $detail['bnome']; ?><br/>
                            <strong><i class="fa fa-clipboard-list"></i> Categoria: </strong>
                            <span class="badge badge-pill badge-success"><?= $detail['cnome']; ?></span>
                            <br/>
                            <strong><i class="fa fa-file-signature"></i> Descrição:</strong>
                            <p><?= $detail['edescricao']; ?></p>
                        </div>

                    </div>
                    <br/>
                    <div class="row col-md-12">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?= $detail['elink']; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </section>
        </div> 
    </div>
</main>
<?php include_once"template/footer.php"; ?>
