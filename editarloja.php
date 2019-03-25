<?php
session_start();
require_once 'classes/ControllerUser.php';
$ccu= new ControllerUser();
$ccu->verifySession();
require_once 'Classes/EstabelecimentoDAO.php';
require_once 'Classes/ControllerEstabelecimento.php';
require_once 'Classes/CategoriaDAO.php';
require_once 'Classes/BairroDAO.php';

if (isset($_SESSION['eid'])) {
    $eid = intval($_SESSION['eid']);
} else {
    $eid = intval($_GET['eid']);
}
$edao = new EstabelecimentoDAO();
$data = $edao->store($eid);
$ce = new ControllerEstabelecimento();
$ce->editar();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
        <div class="container">
            <?php
            require_once 'navegacao.php';
            ?>
            <br/>
            <form enctype="multipart/form-data" method="POST">
                <input type="hidden" name="eid" value="<?= $data[0]['eid'] ?>">
                <div class="row">
                    <div class="col-md-4">
                        <?php
                        if ($data[0]['eimagem'] == NULL || !isset($data[0]['eimagem'])) {
                            echo '<img class="thumbnail" width=300 src="images/teste.svg">';
                        } else {
                            echo '<img class="thumbnail" width=300 src="fotos/' . $data[0]['eimagem'] . '">';
                        }
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Nome do estabelecimento</label>
                            <input  id="name" name="enome" type="text" value="<?= $data[0]['enome']; ?>" class="form-control" maxlength="255" minlength="3" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone">Telefone Comercial</label>
                            <input  id="phone" name="ephone" id="tel" type="tel" value="<?= $data[0]['etelefone']; ?>" class="form-control" maxlength="11" minlength="11" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select class="form-control" name="ecategory" id="category" required>
                                <?php
                                $categoria = new CategoriaDAO();
                                foreach ($categoria->listar() as $ca) {
                                    if ($ca['cnome'] == $data[0]['cnome']) {
                                        ?>
                                        <option selected value="<?= $ca['cid']; ?>"><?= $ca['cnome']; ?></option>
                                        <?php
                                    } elseif ($ca['cnome'] != $data[0]['cnome']) {
                                        ?>
                                        <option value="<?= $ca['cid']; ?>"><?= $ca['cnome']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mail">Email</label>
                            <?php if (isset($_SESSION['eid'])): ?>
                            <input id="mail" name="eemail" type="email" value="<?= $data[0]['eemail']; ?>" class="form-control" disabled>
                                <?php else:
                                ?>
                            <input id="mail" name="eemail" type="email" value="<?= $data[0]['eemail']; ?>" class="form-control">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site">Site</label>
                            <input id="site" name="esite" type="url" value="<?= $data[0]['esite']; ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="maps">Link do Google maps</label>
                            <textarea name="emaps" class="form-control" rows="1"><?= $data[0]['elink']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="adress">Endereço</label>
                            <input  id="adress" name="eadress" type="text" value="<?= $data[0]['eendereco']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="district" data-toggle="tooltip" data-placement="right" title="Caso o seu bairro não esteja aparecendo nos envie uma mensagem de contato">Bairro</label>
                            <select class="form-control" name="edistrict" required>
                                <?php
                                $bairro = new BairroDAO();
                                foreach ($bairro->listar() as $ba) {
                                    if ($ba['bnome'] == $data[0]['bnome']) {
                                        ?>
                                        <option selected value="<?= $ba['bid']; ?>"><?= $ba['bnome']; ?></option>
                                    <?php } elseif ($ba['bnome'] != $data[0]['bnome']) {
                                        ?>
                                        <option value="<?= $ba['bid']; ?>"><?= $ba['bnome']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="describe">Sobre</label>
                            <textarea name="edescribe" id="describe" class="form-control"><?= $data[0]['edescricao']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="imagem">Tamanho máximo da imagem 4MB</label>
                            <input class="form-control-file" id="imagem" name="imagem" type="file">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <button class="btn btn-success" name="cadastrar" value="true"><i class="fa fa-save"></i> Salvar Edição</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
