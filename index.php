<?php include_once "template" . DIRECTORY_SEPARATOR . "header.php"; ?>
<main role="main">
    <br />
    <!--Test new Carrousel-->
    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/banner.png" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Seja Bem Vindo a Cooperativa Coopertral</h2>
                        <p>Você está prestes a conhecer um mundo de Oportunidades maravilhosas.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/banner.png" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Torne-se um Parceiro</h2>
                        <p>Ao tornar-se parceiro você poderá participar ativamente de vários sorteios além de diversas outras vantagens disponilizadas pela cooperativa.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/banner.png" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Adquira já seu cartão VIP COOPERTRAL</h2>
                        <p>Com o Cartão VIP Coopertral Você têm direito a diversos descontos nos nossos comércios parceiros.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!--End Test new Carrousel-->
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h1 class="display-4 text-success">O que é a coopertral?</h1>
                <p class="lead">Somos a cooperativa dos trabalhadores de Águas Lindas de Goiás, temos o plano de realizar uma união de todos os trabalhadores da cidade, sejam eles autônomos, empreendedores, comerciantes ou empresários.
                    <br />
                    <a href="">Leia Mais..</a>
                </p>

            </div>
        </div>
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/eytGy0NmR08" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <img class="img-fluid img-thumbnail" src="images/cartao2.jpg">
            </div>
        </div>
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-4 text-success">Vantagens</h2>
                <p class="lead">
                    Ao juntar-se conosco você adquire o cartão <strong>VIP COOPERTRAL</strong>, com ele terá descontos ao comprar nos comércios <strong>parceiros</strong> além poder participar ativamente de sorteios e eventos promovidos pela Cooperativa.<br />
                    <a href="">Leia Mais..</a>
                </p>

            </div>
        </div>
    </div>
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-4 text-success">Como são os sorteios?</h2>
                <p class="lead">
                    Mensalmente realizamos sorteios em nosso escritório e estes podem ser acompanhados através de nossas redes sociais.<br />
                    <a href="">Leia Mais..</a>
                </p>
            </div>
        </div>
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <img class="img-fluid img-thumbnail" src="images/sorteio.jpg">
            </div>
        </div>

    </div>
</main>
<?php
include_once "template" . DIRECTORY_SEPARATOR . "footer.php";
