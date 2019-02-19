<?php
class Upload {

    var $dir;
    var $foto;
    
    var $t = array(
        'image/png',
        'image/svg+xml',
        'image/jpg',
        'image/jpeg',
        'image/gif'
    );
    
    public function enviarArquivo() {

        #Verifica se o método de envio foi POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            #A variável recebe o $_FILES["imagem"];
            $this->foto = $_FILES["imagem"];
            
            #Verifica se o tamanho da imagem é igual a 4MB
            if ($this->foto['size'] <= '4194304') {
                #Verifica se o tipo de imagem é aceito
                if ($this->foto['type'] == $this->t[0] || $this->foto['type'] == $this->t[1] || $this->foto['type'] == $this->t[2] || $this->foto['type'] == $this->t[3] || $this->foto['type'] == $this->t[4]) {

                    #Verifica se a pasta existe se não ela cria
                    $this->dir = "fotos";
                    if (!is_dir($this->dir)) {
                        mkdir($this->dir);
                    }
                    #Verifica se  o Upload aconteceu
                    if (move_uploaded_file($this->foto["tmp_name"], $this->dir . DIRECTORY_SEPARATOR . date("dmYHms") . str_replace(' ', '', $this->foto["name"]))) {
                        $nome = date("dmYHms") . str_replace(' ', '', $this->foto["name"]);
                        return $nome;
                    } else {
                        return null;
                    }
                }
                throw new Exception("O tipo de Imagem não é válido!");
            }
            throw new Exception("O tamanho da imagem é maior que 4MB!");
        }
    }

}
