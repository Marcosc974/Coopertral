<?php include_once"template/header.php" ?>
<main role="main">
    <br/>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/banner.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/banner2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/banner3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Voltar</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Avançar</span>
        </a>
    </div>
    <!--End Carrousel-->

    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h1 class="display-4 text-success">O que é a coopertral?</h1>
                <p class="lead">Somos a cooperativa dos trabalhadores de Águas Lindas de Goiás, temos o plano de realizar uma união de todos os trabalhadores da cidade, sejam eles autônomos, empreendedores, comerciantes ou empresários.</p>
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
                    Ao juntar-se conosco você adquire o cartão <strong>VIP COOPERTRAL</strong>, com ele terá descontos ao comprar nos comércios <srong>parceiros</srong> além poder participar ativamente de sorteios e eventos promovidos pela Cooperativa.
                </p>
            </div>
        </div>
    </div>
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-4 text-success">Como são os sorteios?</h2>
                <p class="lead">
                    São realizados três sorteios mensais. Sempre no ultimo dia de cada mês, o sorteio é realizado no nosso escritório e pode ser acompanhado através de nossas redes sociais.
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
include_once"template/footer.php";
