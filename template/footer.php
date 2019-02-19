<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3CB371;">
                <h5 class="modal-title" id="exampleModalLongTitle" >Painel de parceiro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <h2>Faça Login</h2>
                    <div class="form-group">
                        <input type="text" name="login" placeholder="Login" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" placeholder="senha" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Entrar</button>
                    <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<footer class="text-muted" style="background-color: SeaGreen;"><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-white">Coopertral</h5>
                <div class="fb-group" data-href="https://www.facebook.com/groups/2155999794420180/" data-width="350" data-show-social-context="true" data-show-metadata="false"></div>
                <br/><br/>
            </div>

            <div class="col-md-3">
                <h5 class="text-white">Navegação</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="text-white" href="index.php">Início</a></li>
                    <li class="nav-item"><a class="text-white" href="catalogo.php">Catálogo</a></li>
                    <li class="nav-item"><a class="text-white" href="cadastro.php">Cadastre-se</a></li>
                    <li class="nav-item"><a class="text-white" href="contato.php">Contato</a></li>
                    <li class="nav-item"><a href="#" class="text-white" data-toggle="modal" data-target="#login"> Login</a></li>

                    <!--<li class="nav-item"><a class="text-white" href="">Notícias</a></li>
                    <li class="nav-item"><a class="text-white" href="">Sobre</a></li>-->
                </ul>  
            </div>
            <div class="col-md-3">
                <h5 class="text-white">Siga-nos</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="https://www.facebook.com/cooperativacoopertral/" target="_blank" class="text-white"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <!--<li class="nav-item"><a href="#" class="text-white"><i class="fab fa-instagram"></i> Instagram</a></li>-->
                    <li class="nav-item"><a href="#" class="text-white"><i class="fab fa-whatsapp"></i> Whatsapp</a></li>
                </ul>
            </div>
        </div>  
    </div>
    <div style="background-color:#256f46;">
        <br/>
        <div class="container">
            <p class="text-white text-center">Desenvolvido por:<a href="https://www.marcoscss.com.br" target="_blank" class="text-white"> Marcos Cordeiro</a></p>
        </div>
        <br/>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>
</html>