let cpfmask = document.getElementById('cpf').innerText;
        let cnpjmask = document.getElementById('cnpj').innerText;
        let telmask = document.getElementById('tel').innerText;
        let celmask = document.getElementById('cel').innerText;
        window.onload = (formataCel(), formatCpf(), formataTel(), formatCnpj());
 
        function formatCpf(){
            //remove qualquer caractere que nao sejam numeros
            cpfmask = cpfmask.replace(/\D/g,"");
 
            //formata na mascara usando o regex para cpf
            cpfmask = cpfmask.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/,"$1.$2.$3-$4");
            document.getElementById('cpf').innerHTML = cpfmask;
            return cpfmask;
        }
 
        function formatCnpj(){
            //remove qualquer caractere que nao seja números
            cnpjmask = cnpjmask.replace(/\D/g,"");
 
            //formata na mascara usando o regex para cnpj
            cnpjmask = cnpjmask.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/,"$1.$2.$3\/$4-$5");
            document.getElementById('cnpj').innerHTML = cnpjmask;
            return cnpjmask;
        }
 
        function formataCel(){
            //celular
            celmask = celmask.replace(/\D/g,"");
            celmask = celmask.replace(/^(\d{2})(\d{1})(\d{4})(\d{4}).*/,"($1) $2 $3-$4");
            document.getElementById('cel').innerHTML = celmask;
            return celmask;
        }
 
        function formataTel(){
            //telefone
            telmask = telmask.replace(/\D/g,"");
            telmask = telmask.replace(/^(\d{2})(\d{4})(\d{4}).*/,"($1) $2-$3");
            document.getElementById('tel').innerHTML = telmask;
            return telmask;
        }