

/*document.getElementById("senha").onfocusout = function () {
 var senha = document.getElementById("senha").value;
 var confsenha = document.getElementById("confsenha").value;
 if (senha != confsenha) {
 document.getElementById("confsenha").classList.add("invalid");
 document.getElementById("confsenha").classList.remove("valid");
 document.getElementById("bt").disabled = true;
 }
 else {
 document.getElementById("confsenha").classList.remove("invalid");
 document.getElementById("confsenha").classList.add("valid");
 document.getElementById("bt").disabled = false;
 }

 };*/

/*function botao (){
 var botao = document.getElementById("tr").value;
 if(botao === "Sem protocolo"){
 document.getElementById("numprot").disabled = true;
 document.getElementById('tr').value = 'Com protocolo';
 }
 else{
 document.getElementById("numprot").disabled = false;
 document.getElementById('tr').value = 'Sem protocolo';
 }
 }*/

// validação senha
document.getElementById("confsenha").onkeyup = function () {
    var senha = document.getElementById("senha").value;
    var confsenha = document.getElementById("confsenha").value;
    if (senha != confsenha) {
        document.getElementById("confsenha").classList.add("invalid");
        document.getElementById("confsenha").classList.remove("valid");
        document.getElementById("bt").disabled = true;
    }
    else {
        document.getElementById("confsenha").classList.remove("invalid");
        document.getElementById("confsenha").classList.add("valid");
        document.getElementById("bt").disabled = false;
    }

};

// botão do protocolo
$('#tr').click(function () {
    var botao = document.getElementById("tr").value;
    $("#prot").toggle();
    if (botao === "Sem protocolo") {
        document.getElementById('tr').value = 'Com protocolo';
    }
    else{
        document.getElementById('tr').value = 'Sem protocolo';
    }

});

