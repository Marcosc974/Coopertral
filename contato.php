<?php
include_once "template" . DIRECTORY_SEPARATOR . "header.php";
require_once '_autoload.php';
$cm = new ControllerContato();
$cm->enviaMensagem();
?>
<main role="main">
    <div class="container">
        <section class="album py-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="display-4 text-success">Contato</h2>
                    <?php
                    if (isset($cm->mensagem)) {
                        echo '<div class="alert alert-info">' . $cm->mensagem . '</div>';
                    }
                    ?>
                </div>
                <div class="col-md-8">
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Nome Completo</label>
                            <input name="nome" id="name" type="text" class="form-control" required placeholder="EX:. José da Silva">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone</label>
                            <input name="telefone" id="phone" type="tel" class="form-control" required placeholder="EX:. 61 9 99999999">
                        </div>
                        <div class="form-group">
                            <label for="mail">E-mail</label>
                            <input name="email" id="mail" type="email" class="form-control" required placeholder="EX:. email@email.com">
                        </div>
                        <div class="form-group">
                            <label for="message">Mensagem</label>
                            <textarea id="message" name="mensagem" class="form-control" required placeholder="Sua Mensagem aqui"></textarea>
                            <br />
                            <div class="g-recaptcha" data-sitekey="6LcboIwUAAAAAJYczHzfjt4t7FObIh-r93wFVjkG"></div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success"><i class="fa fa-location-arrow"></i> Enviar Mensagem</button>
                        </div>

                    </form>
                </div>
                <div class="col-md-4">
                    <p class="alert alert-success">Deixe-nos uma mensagem e assim que possível entraremos em contato com você.</p>

                </div>

            </div>
        </section>
    </div>
</main>
<?php include_once "template" . DIRECTORY_SEPARATOR . "footer.php";
