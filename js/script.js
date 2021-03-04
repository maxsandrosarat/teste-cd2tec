//PÁGINA INDEX

//limpa o cep e desabilitado o botao buscar, se necessário 
function limpa_formulário_cep() {
    document.getElementById("botao-buscar").setAttribute("disabled", "disabled");
    document.getElementById('cep').value=("");
}

//valida o cep digitado assim que tira o foco do input
function validacep(valor) {
    var cep = valor.replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;

        if(validacep.test(cep)) {
            document.getElementById("botao-buscar").removeAttribute("disabled");
        }
        else {
            limpa_formulário_cep();
            alert("Formato de CEP inválido, verifique e tente novamente.");
            document.getElementById('cep').value=("");
        }
    }
    else {
        limpa_formulário_cep();
    }
};

//habilita o botao buscar assim que for digitado os 8 numeros do cep
let campoCep = document.querySelector('#cep');

campoCep.addEventListener('keyup', function(e) {
    let cep = document.querySelector('#cep');
    if(cep.value.length >= 8){
        document.querySelector('#botao-buscar').removeAttribute("disabled");
    }
});


//PÁGINA RESULTADO

//copia o endereço
function copiarTexto(){
    document.getElementById('endereco').select();
    document.execCommand('copy');
    alert("Endereço Copiado");
}