<?php
include_once"template/header.php";
require_once 'autoload.php';
$ce = new ControllerEstabelecimento();
$ce->cadastrar();
?>

<main role="main">
    <div class="container">
        <section class="album py-5">

            <?php
            if (isset($ce->cadastrar)) {
                echo "<p class='alert alert-info'>";
                print_r($ce->cadastrar);
                echo '</p>';
            }
            ?>
            <h2 class="display-4 text-success">Seja nosso parceiro!</h2>
            <small>O preenchimento correto das opções abaixo facilitarão na indexação do seu negócio.</small>
            <br/><br/>
            <form enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nome do estabelecimento</label>
                            <input  id="name" name="enome" type="text" placeholder="EX:. Farmácia Coopertral" class="form-control" maxlength="255" minlength="3" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Telefone Comercial</label>
                            <input  id="phone" name="ephone" type="tel" placeholder="EX:. 61000000000" class="form-control" maxlength="11" minlength="11" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select class="form-control" name="ecategory" id="category" required>
                                <option disabled selected>Selecione</option>
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mail">Email</label>
                            <input id="mail" name="eemail" type="email" placeholder="EX:. email@email.com" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site">Site</label>
                            <input id="site" name="esite" type="url" value="http://" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="maps">Link do Google maps</label>
                            <textarea name="emaps" class="form-control" rows="1" placeholder="Cole o código aqui, para melhorar a visualização recomenda-se que retite o atributo WIDTH='600'. "></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="adress">Endereço</label>
                            <input  id="adress" name="eadress" type="text" placeholder="EX:." class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="district" data-toggle="tooltip" data-placement="right" title="Caso o seu bairro não esteja aparecendo nos envie uma mensagem de contato">Bairro</label>
                            <select class="form-control" name="edistrict" required>
                                <option selected disabled>Bairro</option>
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="describe">Descrição</label>
                            <textarea name="edescribe" id="describe" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="imagem">Tamanho máximo da imagem 4MB</label>
                            <input class="form-control-file" id="imagem" name="imagem" type="file">
                            <input  type="checkbox" name="eterms" value="1" required><small><a href="#" data-toggle="modal" data-target="#exampleModalLong"> Aceito os termos de uso</a></small><br>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="g-recaptcha" data-sitekey="6LcboIwUAAAAAJYczHzfjt4t7FObIh-r93wFVjkG"></div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <button class="btn btn-success" name="cadastrar" value="true"><i class="fa fa-save"></i> Cadastrar</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#3CB371;">
                            <h5 class="modal-title" id="exampleModalLongTitle" >Termos de Uso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Termos de Uso
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 
</main>
<?php include_once"template/footer.php"; ?>
