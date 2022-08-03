$(document).ready(
    
    function(){
    //cep: 00.000-000
    $('#m').mask('#00,00', {reverse: true})}); 

    $(function(){
        $("#money").maskMoney({
           prefix: 'R$ ',
           allowNegative: true,
           thousands: '.',
           decimal: ',',
        });
        

});

$(function(){

    String.prototype.trim = function () {
        return this.replace(/\s/g, "");
    };

    $('.datepicker, .date').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.monthpicker').mask("00/0000", {placeholder: "__/____"});
    $('.cpf').mask("000.000.000-00", {placeholder: "___.___.___-__"});
    $('.cnpj').mask("00.000.000/0000-00", {placeholder: "__.___.___/____-__"});
    $('.cep').mask("00000-000", {placeholder: "_____-___"});
    $('.fone').mask("(00) 00000-0000", {placeholder: "(__) _____-_____"});
    $(".valor").maskMoney({prefix:'', allowNegative: true, thousands:'.', decimal:',', precision:2, affixesStay: false});

    $('input[type="checkbox"], input[type="radio"]').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass : 'iradio_flat-blue',
    });

    $('[data-toggle="tooltip"],[data-toggle="modal"]').tooltip();

    bootbox.setLocale('br');

    $('.close-callout').click(function(){
        $('.callout-danger').hide(); 
    });

    //WEBSERVICE CEP
    $("body").on("keyup", "#cep", function(e) {
        if($(this).attr('readonly') == "readonly"){
            return;
        }
        if(this.value.length == 9){
            ChangeCEP(this.value);
        }
    });

});

function ChangeCEP(cep){
    cep = cep.replace('-','');
    if(cep.length != 8){
        return;
    }
    $('.spin-loading').show();
    $.ajax({
        method: "GET",
        url: "https://viacep.com.br/ws/"+cep+"/json/",
        cache: false,
        success: function (data) {
            $('#rua').val(data.logradouro); 
            $('#bairro').val(data.bairro); 
            $('#cidade').val(data.localidade);
            $('#uf').val(data.uf).change();
            $('#numero').focus();
            $('.spin-loading').hide();
        }
    }).fail(function (jqXHR, textStatus, error) {
        $('.spin-loading').hide();
    });
}

function now(){
    var today = new Date();
    var dd    = today.getDate();
    var mm    = today.getMonth()+1;
    var yyyy  = today.getFullYear();
    if(dd < 10) {
        dd = '0'+dd;
    } 
    if(mm < 10) {
        mm = '0'+mm;
    } 
    return  dd + '/' + mm + '/' + yyyy;
}

function FloatToStr(valor) {
    var n = false;
    if(valor == 0){
        return '0,00';
    }
    valor = parseFloat(valor);
    if(valor < 0){
        n     = true;
        valor = Math.abs(valor);
    }
    valor = valor.toFixed(2).split('.');
    valor[0]  = valor[0].split(/(?=(?:...)*$)/).join('.');
    return n ? '-'+valor.join(',') : valor.join(',');
}

function StrToFloat(valor) {
    if(valor == ''){
        return 0.00;
    }
    valor = valor.toString().replace('.','');
    valor = valor.replace(',','.');
    valor = parseFloat(valor);
    if (valor === NaN){
        return 0.00;
    }else{
        return valor;
    }
}

function ValidaCPF(cpf) {

    cpf = cpf.replace(/[^\d]+/g,'');

    if(cpf == '') 
        return false; 

    if (cpf.length != 11)
        return false;

    // Elimina CPFs invalidos conhecidos
    if (cpf == "00000000000" ||
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
            return false;
    // Valida 1o digito 
    add = 0;
    for (i=0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(9)))
            return false;
    // Valida 2o digito 
    add = 0;    
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}

function ValidaCNPJ(cnpj) {
 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') 
        return false;

    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;

    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;

    return true;

}

function ValidaSenha(senha){
    var regex = /^(?=(?:.*?[A-Z]){1})(?=(?:.*?[0-9]){1})(?!.*\s)[0-9a-zA-Z!@#$%;*(){}_+^&]*$/; 
    if(senha.length < 8)
    {
        return false;
    }
    else if(!regex.exec(senha))
    {
        return false;
    }
    return true;
}

//GERADOR DE SENHAS
var Password = function() {
    this.pass = "";
    this.generate = function(chars) {
        for (var i= 0; i<chars; i++) {
            this.pass += this.getRandomChar();
        }
        return this.pass;
    }
    this.getRandomChar = function() {
        var ascii = [[48, 57],[64,90],[97,122]];
        var i = Math.floor(Math.random()*ascii.length);
        return String.fromCharCode(Math.floor(Math.random()*(ascii[i][1]-ascii[i][0]))+ascii[i][0]);
    }
}

function EmailValid(email){
    er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2,3}$/; 
    if(!er.exec(email)){
        return false;
    }else{
        return true;
    }
}