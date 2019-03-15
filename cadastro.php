<?php
include_once"template/header.php";
require_once '_autoload.php';
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
            <div class="modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#3CB371;">
                            <h5 class="modal-title" id="exampleModalLongTitle" >Termos de Uso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Bem-vindo a Cooperativa Coopertral. A Cooperativa Coopertral apresenta os Termos de Uso (“Termos de Uso”) de seu website (https://www.cooperativacoopertral.com.br), sua plataforma e seus serviços (juntos, a “Plataforma”) estabelecidos neste documento. Nossa Política de Privacidade, também aplicável aos serviços, pode ser encontrada em https://www.cooperativacoopertral.com.br/politica-privacidade.html.
        Reservamo-nos o direito de alterar ou modificar estes Termos de Uso ao nosso exclusivo critério, a qualquer momento. Qualquer alteração ou modificação a estes Termos de Uso entrará em vigor imediatamente após a publicação em nosso website. Você é responsável por analisar periodicamente a mais atualizada versão destes Termos de Uso.
        Os Termos de Uso e a Política de Privacidade são válidos para todos os usuários de nossa Plataforma.
        O uso continuado dos nossos serviços constitui a aceitação de quaisquer alterações ou modificações feitas nos Termos de Uso.
        1. Aceitação aos Termos de Uso
        1.1 Você está autorizado a utilizar os Serviços da Cooperativa Coopertral somente se você concorda com todas regras e condições estabelecidas nos Termos de Uso.
        1.2 Se você não concorda com estes Termos de Uso, você não está autorizado a acessar ou utilizar os Serviços oferecidos em nosso website. A utilização dos Serviços Cooperativa Coopertral está expressamente condicionada ao seu consentimento às regras dos Termos de Uso.
        2. Usuários e Parceiros:
        2.1 Usuários: O uso das áreas públicas da Cooperativa Coopertral está disponível para qualquer pessoa, sem necessidade de registro. Para poder usufruir dos serviços privados, reservados aos Parceiros, o usuário deve se registrar para se tornar um Parceiro da Cooperativa Coopertral. A palavra “Usuário” se referirá a qualquer usuário que não tenha se registrado como Parceiro da Cooperativa Coopertral.
        2.2 Senha e Segurança. Quando você completar o seu processo de registro, você criará uma senha que habilitará seu acesso à nossa Plataforma. Você concorda em manter a confidencialidade da sua senha e é inteiramente responsável por qualquer dano resultante da não manutenção dessa confidencialidade e de todas as atividades que ocorrerem através do uso de sua senha. Você concorda em nos notificar imediatamente de qualquer acesso não autorizado de sua senha ou outra quebra de segurança. Você concorda que a Cooperativa Coopertral não será responsabilizada por qualquer perda ou dano que ocorra a partir do não cumprimento desta cláusula.
        3. Informações Públicas e Privadas:
        3.1 “Suas Informações”: são definidas como qualquer informação postada por você ou que você nos dê (direta ou indiretamente), inclusive através do seu processo de registro ou do seu uso de nossa Plataforma, comentários em blogs, mensagens enviadas dentro de nossa Plataforma, ou e-mail. Você é o único responsável por Suas Informações, e nós agimos como um canal passivo para a distribuição e publicação de suas Informações Públicas (como definidas abaixo).
        3.2 “Informações Públicas”: seu nome, afiliação a companhias e localidade, bem como qualquer parte de Suas Informações que, através do uso de nossa Plataforma ou de outra maneira, você envie ou disponibilize para a inclusão em áreas públicas de nosso website.
        3.3 “Informação Privada”: qualquer outra parte de Suas Informações que não sejam Informações Públicas será referida como Informação Privada.
        3.4 “Áreas públicas”: são aquelas áreas do nosso website que são acessíveis para alguns ou todos os nossos Parceiros (p.ex., não restritas à sua visualização apenas) ou para o público geral.
        3.5 Acessibilidade das Informações Públicas. As suas Informações Públicas podem ser acessíveis e publicadas por programas de publicação automática e por ferramentas de busca, ferramentas de metabusca, crawlers, metacrawlers e outros similares.
        3.6 Restrições. Ao considerar o uso de nossa Plataforma, você concorda que as Suas Informações: (a) não devem ser fraudulentas; (b) não devem infringir nenhum direito autoral de terceiros, patente, marca registrada, direito de distribuição ou outro direito de propriedade intelectual, de publicação ou privacidade; (c) não devem violar nenhuma lei, estatuto, ordenação ou regulamento; (d) não devem ser difamatórias, caluniosas, ameaçadoras ou abusivas; (e) não devem ser obscenas ou conter pornografia, pornografia infantil, ou fotos de pessoas despidas; (f) não devem conter vírus, cavalos de tróia, worms, time bombs, cancelbots, easter eggs ou outras rotinas de programação que possam danificar, interferir, interceptar ou desapropriar qualquer sistema, dado ou informação pessoal; (g) não devem nos responsabilizar ou fazer com que percamos (total ou parcialmente) o serviço do nosso Provedor de Internet ou outros fornecedores; (h) não devem criar links direta ou indiretamente a qualquer material que você não tenha direito de incluir ou linkar.
        3.7 Obrigações: Você concorda também que deverá nos informar um endereço válido de e-mail, tanto na hora de seu registro conosco quanto a cada vez que o seu e-mail mudar. Você concorda também que o seu perfil de Parceiro, a Newsletter da Cooperativa Coopertral, postagens de comentários em blogs, uploads de fotos ou quaisquer porções do website reservadas apenas a uso dos Parceiros não devem ser usadas por você para atividades comerciais, vendas de bens e serviços, ou a promoção de uma companhia, bem ou serviço não relacionado ao tópico ou espírito da Cooperativa Coopertral ou de Grupo de Parceiros em particular. Você será exclusivamente responsável pelas informações que você postar nas áreas publicamente acessíveis da Plataforma, independente de sua intenção ou não de fazê-lo.
        3.8 Privacidade: Todas as informações pessoais relacionadas ao uso dos Serviços ou ao uso do website Cooperativa Coopertral estão sujeitas à nossa Política de Privacidade que pode ser encontrada em https://www.cooperativacoopertral.com.br/politica-privacidade.html.
        3.9 Licença. Nós não clamamos propriedade de Suas Informações. Nós usaremos as suas Informações Pessoais Identificáveis apenas de acordo com a nossa Política de Privacidade. Entretanto, para nos autorizar a usar suas Informações Públicas e para nos assegurar de que não violamos nenhum direito que você possa ter sobre suas Informações Públicas, você garante a Cooperativa Coopertral o direito não-exclusivo, universal, sem pagamento de royalties, em caráter total, definitivo, irrevogável e irretratável, de utilizar, a qualquer tempo, no Brasil e/ou no exterior e de exercer, comercializar e explorar todos os direitos de cópia, publicidade, e direitos de base de dados que você possua sobre suas Informações Públicas, através de qualquer meio conhecido ou que venha a ser criado futuramente, e para qualquer fim.
        3.10 Restrições no Nosso Uso de Suas Informações. Exceto se especificado contrariamente em nossa Política de Privacidade, nós não venderemos, alugaremos ou divulgaremos nenhuma parte de suas Informações Pessoais Identificáveis (como definidas em nossa Política de Privacidade) sobre você (incluindo seu endereço de e-mail) para terceiros.
        3.11 Consentimento de Divulgação. Você entende e concorda que a Cooperativa Coopertral pode divulgar Suas Informações se requerida a fazê-lo por lei ou por acreditar de boa fé que essa divulgação é razoável e necessária para: (a) cooperar com um procedimento judicial, uma ordem judicial ou processo legal sobre nós ou nosso website; (b) reforçar os Termos de Uso; (c) replicar a respeito da infração do direito de terceiros por Suas Informações; (d) proteger os direitos, propriedades ou a segurança pessoal da Cooperativa Coopertral, seus empregados, usuários e público.
        3.12 Consentimento de divulgação: A Cooperativa Coopertral reserva-se o direito, a seu exclusivo critério, de suspender ou terminar o seu uso de nossa Plataforma e de nossos Serviços, de recusar todo e qualquer uso corrente ou futuro de todas ou algumas partes de nossa Plataforma e/ou Serviços.
        4. Condições gerais de uso dos Serviços
        4.1 Ao aceitar estes Termos de Uso, você tem o direito não exclusivo, intransferível, não sub-licenciável e limitado de entrar, acessar e usar os Serviços, para uso pessoal e comercial.
        4.2 Todos os direitos não previstos expressamente nestes Termos de Uso estão reservados a Cooperativa Coopertral.
        4.3. Você concorda que os Serviços são para o seu uso pessoal e não comercial e que ninguém além de você usará os Serviços. Você não tem direitos de cópia ou reprodução no todo ou em parte, de qualquer parte dos Serviços de propriedade da Cooperativa Coopertral.
        4.4 Além da licença limitada de uso estabelecida nestes Termos de Uso, você não tem qualquer outro direito, título ou propriedade sobre os Serviços. Você entende e reconhece que, em quaisquer circunstâncias, os seus direitos com relação ao Serviços serão limitados pelos direitos autorais e/ou leis de propriedade intelectual aplicáveis e ainda por estes Termos de Uso.
        4.5 A Cooperativa Coopertral poderá modificar os Serviços e/ou Conteúdo ou descontinuar a sua disponibilidade a qualquer momento.
        4.6 Você é o único responsável pela obtenção, pagamento e manutenção de todos os serviços de telefonia, acesso à internet, plano de dados, tarifas e/ou outras taxas, mensalidades e custos associados ao seu acesso e uso dos Serviços, bem como pelo software, hardware de computador e outros equipamentos necessários para o uso e acesso aos Serviços.
        4.7. Não obstante outras disposições contidas nestes Termos de Uso, os Serviços estão disponíveis para seu uso por um período que começa a partir do registro de seus dados.
        4.8. Você não deve tentar nem apoiar as tentativas de terceiros para driblar, reverter a engenharia, decodificar, decompilar, desmontar ou fraudar ou interferir de qualquer forma com aspectos dos Serviços. Você não deve distribuir, intercambiar, modificar, vender ou revender ou retransmitir a qualquer pessoa qualquer parte dos Serviços, incluindo, mas não se limitando, a qualquer texto, imagem ou áudio, para qualquer finalidade empresarial comercial ou pública. Você concorda em não copiar, vender, distribuir ou transferir o Conteúdo e/ou Serviços Cooperativa Coopertral.
        6. Uso da Plataforma
        6.1 Responsabilidade e Controle. Você, e não a Cooperativa Coopertral, é inteiramente responsável por Suas Informações que faça upload, poste, distribua, envie por e-mail ou de alguma outra forma torne disponível via nossa Plataforma. Nós não controlamos suas Informações Públicas ou as Informações Públicas de outros Parceiros ou postadas por eles, e não garantimos a precisão, integridade ou a qualidade de Suas Informações ou das Informações postadas por ou sobre outros Parceiros, nem endossamos nenhuma opinião expressada por você ou por outros Parceiros. Você entende que usando nossa Plataforma, você pode ser exposto a informações ofensivas, indecentes ou com as quais não concorde. Nós não temos nenhuma obrigação de monitorar, nem tomamos qualquer responsabilidade pelas Suas Informações, pelas Informações Públicas ou informações a respeito de quaisquer assuntos ou postadas por outros Usuários. Você concorda que sob nenhuma circunstância a Cooperativa Coopertral, seus diretores, sócios ou funcionários poderão ser responsabilizados por quaisquer informações, incluindo, mas não se limitando a erros ou omissões nas Suas Informações ou nas Informações Públicas postadas por ou sobre outros Parceiros, por perdas e danos de qualquer tipo, ocorridas como resultado do uso das Suas Informações ou de quaisquer Informações Públicas de ou sobre outros Parceiros que venham a ser postadas, enviadas por e-mail, transmitidas ou disponibilizadas de qualquer outra maneira conectada à nossa Plataforma, ou por qualquer falha em corrigir ou remover quaisquer dessas informações.
        6.2 Condições para Suspensão ou Término dos Serviços.
        6.2.1 Os seguintes tipos de ação são vedados no website e na Plataforma Cooperativa Coopertral e são passíveis de suspensão e/ou término imediato do seu status de Parceiro:
        (a) Uso de nossa Plataforma para: (i) ameaçar ou intimidar outra pessoa de qualquer forma, incluindo a restrição ou inibição do uso de nossa Plataforma; (ii) personificar qualquer pessoa (incluindo a equipe da Cooperativa Coopertral ou outros Parceiros), ou atestar falsamente afiliação ou representação de qualquer pessoa ou companhia, através do uso de endereços de e-mail similares, apelidos, ou a criação de contas falsas ou qualquer outro método ou procedimento; (iii) disfarçar a origem de quaisquer Informações Públicas que sejam transmitidas a terceiros; (iv) perseguir ou perturbar outrem; (v) coletar ou armazenar dados pessoais de outros usuários;
        (b) Postar quaisquer Informações Públicas ou outro material: (i) que seja ilegal, ofensivo, racista, preconceituoso, ameaçador, abusivo, perturbador, difamatório, intimidador, vulgar, obsceno, profano, acusatório, que invada a privacidade de outrem (inclusive a postagem de e-mails privados ou informações de contato de outros usuários), odioso, racial, eticamente ou de qualquer outra forma contestável, incluindo quaisquer Informações Públicas ou outro material que possa ser considerado um discurso de ódio; (ii) que seja obsceno, pornográfico ou adulto por natureza; (iii) que você não tenha o direito de disponibilizar por qualquer lei ou por contrato; (iv) que infrinja qualquer patente, marca registrada, segredo comercial, direitos autorais ou quaisquer outros direitos de propriedade intelectual ou direitos de terceiros; (v) que seja qualquer tipo de propaganda ou material promocional não solicitado, ou qualquer outra forma de solicitação (incluindo, mas não se limitando a “spam”, “junk mail”, e correntes de e-mail); ou (vi) que seja de qualquer outra forma inapropriado ou postado de má fé;
        (c) Encorajar outrem a violar os Termos de Uso ou se recusar a seguir instruções da equipe da Cooperativa Coopertral;
        (e) Violar (intencional ou não intencionalmente) os Termos de Uso, ou de qualquer lei, ordenação, estatuto ou regulamento local, estadual, nacional ou internacional aplicável.
        6.2.2 Mesmo que nós proibamos o conteúdo e as condutas acima, você entende e concorda que você poderá vir a ser exposto a tais condutas e conteúdos e que usa a Plataforma a seu próprio risco. Para os propósitos destes Termos de Uso, “postar” inclui o upload, a postagem, distribuição, envio de e-mails, publicação, transmissão ou disponibilização de alguma outra forma.
        6.2.3 Sem se limitar aos ao disposto acima, a Cooperativa Coopertral tem o direito de remover quaisquer Informações Públicas ou outro material que viole esses Termos de Uso ou seja de outra maneira questionável.
        6.3 Não-Interferência com a Plataforma. Você concorda que não irá: (a) fazer upload, postar, publicar, distribuir, enviar por e-mail ou transmitir de qualquer outra forma rotinas de programação, arquivos ou programas com a intenção de interromper, destruir ou limitar as funcionalidades de qualquer software ou hardware ou equipamento de telecomunicação; (b) interferir com ou perturbar nossa Plataforma ou com as redes conectadas ao nosso website através do uso de nossa Plataforma, ou desobedecer quaisquer requerimentos, procedimentos, políticas ou regulamentos das redes conectadas ao nosso website, ou de alguma outra maneira interferir com a nossa Plataforma em qualquer sentido, incluindo através do uso de JavaScript, ou outros códigos; (c) agir de qualquer maneira que imponha uma carga excessivamente pesada, que seja desproporcional ou não razoável, em nossa infraestrutura; (d) copiar, reproduzir, alterar, modificar ou exibir publicamente qualquer informação que esteja disponível em nosso website (exceto as Suas Informações), ou criar trabalhos derivados do nosso website (exceto Suas Informações), com o entendimento de que tais ações constituiriam infração de direitos autorais ou outro tipo de violação à propriedade intelectual e/ou industrial da Cooperativa Coopertral ou de quaisquer terceiros, exceto se autorizado por escrito e com antecedência pela Cooperativa Coopertral ou pelo terceiro.
        6.4 Práticas Gerais de Uso da Plataforma. Você declara saber e entender que nós podemos estabelecer práticas e limites gerais no que diz respeito ao uso de nossa Plataforma. Você concorda que nós não nos responsabilizamos nem podemos ser responsabilizados pelo armazenamento ou apagamento, ou pela falha em armazenar ou apagar, qualquer uma de Suas Informações. Você entende que nós nos reservamos o direito de suspender Parceiros que estejam inativos por um período extenso de tempo. Você entende que nós nos reservamos o direito de mudar essas práticas e limites gerais a qualquer momento, a nosso critério, com ou sem aviso.
        7. Comunicados da Equipe Cooperativa Coopertral
        7.1 Você entende e concorda que nós podemos enviar certos comunicados, como anúncios de serviços da Cooperativa Coopertral e newsletters, bem como ofertas de bens e serviços relevantes e que beneficiem você ou qualquer grupo de Parceiros unidos por afinidade que você possa vir a participar, e que esses comunicados são considerados parte de nossa Plataforma.
        8. Links
        8.1 Nós podemos providenciar, ou terceiros podem providenciar e publicar, links para outros websites ou recursos. Por não termos controle sobre tais websites ou recursos, você entende e concorda que nós não somos responsáveis pela disponibilidade de tais websites e recursos, e nós não endossamos e não nos responsabilizamos nem somos passíveis de ser responsabilizados por qualquer conteúdo, publicidade, produto, ou outro material disponível neste ou através deste website ou recurso.
        8.2 Você também entende e concorda que a Cooperativa Coopertral não será responsável nem poderá ser responsabilizada, direta ou indiretamente, por quaisquer perdas e danos causadas ou alegadas de terem sido causadas ou relacionadas ao uso de qualquer conteúdo, bem ou serviço disponível na Plataforma ou através do uso de qualquer um desses websites, recursos e/ou serviços.
        9. Garantias e Responsabilidades
        9.1 Isenção de Garantias. Você usa a nossa Plataforma a seu próprio e exclusivo risco. Nossa Plataforma é oferecida a você “como é” e “como está disponível”. Nós nos isentamos de garantias e condições de qualquer tipo, sejam expressas, implícitas ou instituídas, incluindo mas não se limitando a garantias relacionadas à segurança, confiabilidade, conveniência e performance de nossa Plataforma. Nós nos isentamos ainda de quaisquer garantias sobre informações ou conselhos obtidos através de nossa Plataforma. Isentamo-nos de quaisquer garantias de terceiros por serviços ou bens recebidos através ou anunciados em nossa Plataforma ou recebidos através de links exibidos em nossa Plataforma, bem como por qualquer informação ou conselho recebido através de quaisquer links exibidos em nossa Plataforma. Além disso, nenhum conselho ou informação, seja oral ou escrita, obtida de você por nós, deve criar nenhum tipo de garantia.
        9.2 Limitação de Responsabilidade. Você concorda que, em nenhuma circunstância, a Cooperativa Coopertral poderá ser responsabilizada por qualquer dano direto, indireto, incidental, especial, consequencial ou punitivo, incluindo mas não se limitando a perdas e danos, lucros cessantes, perda de uma chance, outras perdas e danos intangíveis (ainda que a Cooperativa Coopertral tenha sido alertada sobre a possibilidade de ocorrência de tais danos), relacionado ao uso dos Serviços ou de nossa Plataforma, nem com relação à incapacidade e/ou impossibilidade de usá-los (incluindo hipóteses de negligência).
        10. Rescisão
        10.1 Você concorda que nós, ao nosso critério, podemos disparar um alerta, suspender temporariamente, indefinidamente ou remover completamente qualquer conteúdo ou informação postada por você, ou encerrar com o seu status de Parceiro ou com a sua capacidade de uso total ou parcial de nossa Plataforma, por qualquer razão, incluindo mas não se limitando a (a) por falta de uso; (b) se nós acreditarmos que você violou ou agiu de forma inconsistente com o espírito destes Termos de Uso ou dos documentos incorporados como referência; (c) se não formos capazes de verificar ou autenticar qualquer informação que você nos forneça; (d) se acreditarmos que suas ações possam gerar responsabilidade civil a você, aos nossos usuários ou a nós.
        10.2 Você declara-se ciente de que o encerramento da sua conta ou do acesso total ou parcial à Plataforma por motivo esclarecido nesses Termos de Uso poderá ser efetuado sem aviso prévio, e entende e concorda que poderemos imediatamente desativar ou apagar a sua conta e todas as informações e arquivos relativos a ela e/ou barrar seu acesso futuro à nossa Plataforma. Você também concorda que nós não podemos ser responsabilizados por você ou por terceiros pelo encerramento do seu uso de todas ou quaisquer partes da Plataforma.
        10.3 A Cooperativa Coopertral reserva-se o direito de rescindir o seu plano de Serviços e/ou o seu acesso aos Serviços por violação dos Termos de Uso. Caso a sua inscrição e contratação dos Serviços sejam rescindidas, nenhum pagamento, mensalidade, taxa ou despesa será reembolsável.
        12. Propriedade Intelectual
        12.1 Direitos autorais. O conteúdo publicado no website Cooperativa Coopertral e outros trabalhos de autoria encontrados na Plataforma como parte dos Serviços ("Conteúdo") estão protegidos pelas leis e tratados de direitos autorais nacionais e internacionais, assim como outras leis e tratados de propriedade intelectual. O Conteúdo é licenciado, não vendido. Você não pode fazer cópias não autorizadas ou usar nenhum Conteúdo, exceto como especificado aqui e de acordo com as leis aplicáveis. Todos os direitos autorais do Conteúdo e dos Serviços (incluindo, mas não se limitando a imagens, fotografias, animações, vídeos, áudio, música, texto, layout e “look and feel” incorporados nos Serviços) são de propriedade da Cooperativa Coopertral. Você concorda em cumprir com todas as leis de proteção dos direitos autorais relacionadas ao uso dos Serviços e do Conteúdo. A Cooperativa Coopertral reserva-se o direito de tomar as medidas que julgar apropriadas, a seu exclusivo critério, a fim de proteger os direitos autorais do Conteúdo e dos Serviços, além das condições previstas nestes Termos de Uso.
        12.3 Não é permitido aos Usuários e Parceiros tentar reconfigurar, desmontar ou fazer engenharia reversa no website, nos Serviços e/ou no Conteúdo da Cooperativa Coopertral.
        12.4 Marcas. Você não esta autorizado a utilizar nenhum marca e/ou sinais distintivos encontrados no website, no Conteúdo e/ou nos Serviços da Cooperativa Coopertral. Você não pode copiar, exibir ou usar nenhuma das marcas comerciais sem consentimento prévio por escrito do seu proprietário. Qualquer uso não autorizado poderá violar as leis de propriedade industrial, leis de privacidade, de propriedade intelectual e ainda estatutos civis e/ou criminais.
        12.5 Todos os direitos e licenças não concedidos expressamente nestes Termos de Uso são reservados aos proprietários dos Conteúdos e/ou Serviços. Estes Termos de Uso não concedem quaisquer licenças implícitas.
        14. Disposições Gerais
        14.1. Estes Termos de Uso, juntamente com a Política de Privacidade publicada no nosso website, constituem o acordo integral entre as Partes com relação ao objeto em questão, e substituem todos os acordos anteriores, escritos ou verbais.
        14.2. As Partes são contratantes independentes, não resultando este instrumento na criação de qualquer sociedade, franquia, representação de vendas ou relações que não as expressamente previstas nestes Termos de Uso.
        14.3. Caso qualquer uma das cláusulas e condições destes Termos de Uso venha a ser declarada nula, no todo ou em parte, por qualquer motivo legal ou contratual, as demais cláusulas continuarão em pleno vigor e efeito.
        14.4 A tolerância ou o não exercício, por qualquer das Partes, de quaisquer direitos a ela assegurados nestes Termos de Uso ou na lei em geral não importará em novação ou em renúncia a qualquer desses direitos, podendo a referida Parte exercê-los durante a vigência destes Termos de Uso.
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
