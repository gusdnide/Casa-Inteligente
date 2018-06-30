/*function atualizar() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var te = this.responseText;
            if (te == null) {
                return;
            }

            function BuscarPorta(porta, texto) {
                try {
                    if (texto.charAt(porta - 2) == '1')
                        return "Ligado.";
                    else
                        return "Desligado.";
                } catch (err) {
                    return "Ligado.";
                }
            }
            //Quarto 1

            var tQuarto1 = document.getElementById("lquarto1");
            var cQuarto1 = document.getElementById("cquarto1");

            if (BuscarPorta(2, te) === "Ligado.") {
                tQuarto1.innerText = "Ligado.";
                cQuarto1.checked = true;
            } else {
                tQuarto1.innerText = "Desligado.";
                cQuarto1.checked = false;
            }

            //Quarto 2
            var tQuarto2 = document.getElementById("lquarto2");
            var cQuarto2 = document.getElementById("cquarto2");

            if (BuscarPorta(3, te) === "Ligado.") {
                tQuarto2.innerText = "Ligado.";
                cQuarto2.checked = true;
            } else {
                tQuarto2.innerText = "Desligado.";
                cQuarto2.checked = false;
            }

            //Sala
            var tSala = document.getElementById("lsala");
            var cSala = document.getElementById("csala");
            if (BuscarPorta(5, te) === "Ligado.") {
                tSala.innerText = "Ligado.";
                cSala.checked = true;
            } else {
                tSala.innerText = "Desligado.";
                cSala.checked = false;
            }

            //cozinha

            var tCozinha = document.getElementById("lcozinha");
            var cCozinha = document.getElementById("ccozinha");
            if (BuscarPorta(4, te) === "Ligado.") {
                tCozinha.innerText = "Ligado.";
                cCozinha.checked = true;
            } else {
                tCozinha.innerText = "Desligado.";
                cCozinha.checked = false;
            }

            //piscina
            var tPiscina = document.getElementById("lpiscina");
            var cPiscina = document.getElementById("cpiscina");
            if (BuscarPorta(6, te) === "Ligado.") {
                tPiscina.innerText = "Ligado.";
                cPiscina.checked = true;
            } else {
                tPiscina.innerText = "Desligado.";
                cPiscina.checked = false;
            }
        }
    };
    xhttp.open("GET", "info.php");
    xhttp.send();
}

setTimeout(function() {
    atualizar();
}, 2);*/