<?php

class ControllerContato {

    var $mensagem;

    public function enviaMensagem() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['mensagem'])) {

                $name = filter_var($_POST['nome'], FILTER_DEFAULT);
                $remetente = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $phone = filter_var($_POST['telefone'], FILTER_DEFAULT);
                $message = filter_var($_POST['mensagem'], FILTER_DEFAULT);

                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify",
                    CURLOPT_POSTFIELDS => [
                        'secret' => 'YOUR_KEY',
                        'response' => $_POST['g-recaptcha-response'],
                        'remoteip' => $_SERVER['REMOTE_ADDR']
                    ]
                ]);

                $response = json_decode(curl_exec($curl));
                curl_close($curl);

                if ($response->success == true) {
                    require_once './PHPMailer/class.phpmailer.php';
                    $mail = new PHPMailer(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->Host = '';
                    $mail->SMTPAuth = true;
                    $mail->Username = '';
                    $mail->Password = '';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom($remetente, $name);
                    //endereço e assunto de quem receberá o email
                    $mail->addAddress('', 'Coopertral');
                    $mail->addAddress('', 'Coopertral');
                    $mail->isHTML(true);
                    $mail->Subject = 'Coopertral';
                    $mail->Body = '<b>E-mail: </b>' . $remetente . '</b><br/> <b>Nome: </b> ' . $name . '<br/><b>Telefone: </b> ' . $phone . "<br/><b>Mensagem:</b>" . $message;
                    if ($mail->send()) {
                        $this->mensagem = "Sua Mensagem foi enviada com sucesso!";
                    } else {
                        $this->mensagem = "Sua Mensagem não pôde ser enviada!, tente mais tarde.";
                    }
                } else {
                    return $this->mensagem = "O Recapcha não pode ficar desmarcado!";
                }
            } else {
                return $this->mensagem = "Verifique o preenchimento dos campos e tente novamente!.";
            }
        }
    }

}
