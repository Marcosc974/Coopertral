<?php

class Messenger {
 
    public function sendMessage($nome,$destinatario) {
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'cooperativacoopertral.com.br';
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply@cooperativacoopertral.com.br';
        $mail->Password = '@coopertral';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom("noreply@cooperativacoopertral.com.br", $nome);
        //endereço e assunto de quem receberá o email
        $mail->addAddress($destinatario,'Coopertral');
        $mail->isHTML(true);
        $mail->Subject = 'Coopertral';
        $mail->Body ="<h1>Segurança Cooperativa Coopertral</h1><p>Você foi cadastrado no site Coopertral e recebeu uma senha temporária para a sua segurança atualize-a agora!<br/> Seu login: $destinatario <br/>Sua senha: $destinatario</p>";
        if ($mail->send()) {
            $this->mensagem = "Sua Mensagem foi enviada com sucesso!";
        } else {
            $this->mensagem = "Sua Mensagem não pôde ser enviada!, tente mais tarde.";
        }
    }

}
