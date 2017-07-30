/**
 * Created by desenv029 on 04/01/2016.
 */
var trabalheconosco = new function trabalheconosco() {
    var prosseguir = function prosseguir() {
        $('.button-dados-pessoais').on('click', function() {
            $(' form .step-one').css({'display':'none'});
            $('form .step-two').css({'display':'block'});
            $('.workwithus > .steps > .fase-one').css({'background':'white'});
            $('.workwithus > .steps >  .fase-one > h6').css({'position':'relative','z-index':'10000','color':'#666'});
            $('.workwithus > .steps > .fase-one > #seta-one').css({'background-color':'white','z-index':'100'});
            $('.workwithus > .steps >  .fase-two').css({'background-color':'#5186cc'});
            $('.workwithus > .steps > .fase-two > #seta-two').css({'background-color':'#5186cc','z-index':'-100'});
            $('.workwithus > .steps > .fase-two > h6').css({'color':'white','position':'relative'});
        });
        $('.button-educacao').on('click', function() {
            $('form  .step-two').css({'display':'none'});
            $('form .step-three').css({'display':'block'});
            $('.workwithus > .steps >  .fase-two').css({'background':'white'});
            $('.workwithus > .steps >  .fase-two > h6').css({'position':'relative','z-index':'10000','color':'#666'});
            $('.workwithus > .steps > .fase-two > #seta-two').css({'background-color':'white','z-index':'100'});
            $('.workwithus > .steps > .fase-three').css({'background-color':'#5186cc'});
            $('.workwithus > .steps > .fase-three > #seta-three').css({'background-color':'#5186cc','z-index':'-100'});
            $('.workwithus > .steps > .fase-three > h6').css({'position':'relative','color':'white'});
        });
        $('.button-experiencia').on('click', function() {
            $('form .step-three').css({'display':'none'});
            $('form .step-four').css({'display':'block'});
            $('.workwithus > .steps >  .fase-three').css({'background':'white'});
            $('.workwithus > .steps > .fase-three > h6').css({'position':'relative','z-index':'10000','color':'#666'});
            $('.workwithus > .steps > .fase-three > #seta-three').css({'background-color':'white','z-index':'0'});
            $('.workwithus > .steps > .fase-four').css({'background-color':'#5186cc'});
            $('.workwithus > .steps > .fase-four > #seta-four').css({'background-color':'#5186cc','z-index':'-100'});
            $('.workwithus > .steps > .fase-four > h6').css({'color':'white'});
        });
        $('.button-habilidades').on('click', function() {
            $('form .step-four').css({'display':'none'});
            $('form .step-five').css({'display':'block'});
            $('.workwithus > .steps > .fase-four').css({'background':'white'});
            $('.workwithus > .steps > .fase-four > h6').css({'position':'relative','z-index':'10000','color':'#666'});
            $('.workwithus > .steps >.fase-four > #seta-four').css({'background-color':'white','z-index':'0'});
            $('.workwithus > .steps >  .fase-five').css({'background-color':'#5186cc'});
            $('.workwithus > .steps > .fase-five > #seta-five').css({'background-color':'#5186cc','z-index':'-100'});
            $('.workwithus > .steps > .fase-five > h6').css({'color':'white'});
        });
    }
    var voltar_trabalhe_conosco = function voltar_trabalhe_conosco() {
        $('.button-voltar-habilidades').on('click', function() {
            $('form .step-five').css({'display':'none'});
            $('form .step-four').css({'display':'block'});
            $('.workwithus > .steps >  .fase-five').css({'background':'white'});
            $('.workwithus > .steps > .fase-five > h6').css({'position':'relative','z-index':'10000','color':'#666'});
            $('.workwithus > .steps > .fase-five > #seta-five').css({'background-color':'white','z-index':'-0'});
            $('.workwithus > .steps > .fase-four').css({'background-color':'#5186cc'});
            $('.workwithus > .steps > .fase-four > #seta-four').css({'background-color':'#5186cc','z-index':'100'});
            $('.workwithus > .steps > .fase-four > h6').css({'color':'white'});
        });
        $('.button-voltar-experiencia').on('click', function() {
            $('form .step-four').css({'display':'none'});
            $('form .step-three').css({'display':'block'});
            $('.workwithus > .steps >  .fase-four').css({'background':'white'});
            $('.workwithus > .steps > .fase-four > h6').css({'position':'relative','z-index':'10000','color':'#666'});
            $('.workwithus > .steps > .fase-four > #seta-four').css({'background-color':'white','z-index':'-0'});
            $('.workwithus > .steps > .fase-three').css({'background-color':'#5186cc'});
            $('.workwithus > .steps > .fase-three > #seta-three').css({'background-color':'#5186cc','z-index':'100'});
            $('.workwithus > .steps > .fase-three > h6').css({'color':'white'});
        });
        $('.button-voltar-educacao').on('click', function() {
            $('form  .step-three').css({'display':'none'});
            $('form .step-two').css({'display':'block'});
            $('.workwithus > .steps >  .fase-three').css({'background':'white'});
            $('.workwithus > .steps >  .fase-three > h6').css({'position':'relative','z-index':'10000','color':'#666'});
            $('.workwithus > .steps > .fase-three > #seta-three ').css({'background-color':'white','z-index':'-0'});
            $('.workwithus > .steps > .fase-two').css({'background-color':'#5186cc'});
            $('.workwithus > .steps > .fase-two > #seta-two').css({'background-color':'#5186cc','z-index':'100'});
            $('.workwithus > .steps > .fase-two > h6').css({'position':'relative','color':'white'});
        });
        $('.button-voltar-dadospessoais').on('click', function() {
            $(' form .step-two').css({'display':'none'});
            $('form .step-one').css({'display':'block'});
            $('.workwithus > .steps > .fase-two').css({'background':'white'});
            $('.workwithus > .steps >  .fase-two > h6').css({'position':'relative','z-index':'10000','color':'#666'});
            $('.workwithus > .steps > .fase-two > #seta-two').css({'background-color':'white','z-index':'-100'});
            $('.workwithus > .steps >  .fase-one').css({'background-color':'#5186cc'});
            $('.workwithus > .steps > .fase-one > #seta-one').css({'background-color':'#5186cc','z-index':'100'});
            $('.workwithus > .steps > .fase-one > h6').css({'color':'white'});
        });
    }
    var parceiro = function parceiro() {
        $('.button-contato').on('click', function() {
            $('form .step-one').css({'display':'none'});
            $('form .step-two').css({'display':'block'});
            $('.bepartner > .steps > .fase-one').css({'background':'white'});
            $('.bepartner > .steps > .fase-one > h6').css({'color':'#666'});
            $('.bepartner > .steps > .fase-one > #seta-one').css({'background-color':'white','z-index':'100'});
            $('.bepartner > .steps > .fase-two').css({'background-color':'#5186cc'});
            $('.bepartner > .steps > .fase-two > #seta-two').css({'background-color':'#5186cc','z-index':'100'});
            $('.bepartner > .steps > .fase-two > h6').css({'color':'white'});
        });
        $('.button-empresa').on('click', function() {
            $('form .step-two').css({'display':'none'});
            $('form .step-three').css({'display':'block'});
            $('.bepartner > .steps > .fase-two').css({'background':'white'});
            $('.bepartner > .steps > .fase-two > h6').css({'color':'#666','position':'relative','z-index':'10000','color':'#666'});
            $('.bepartner > .steps > .fase-two > #seta-two').css({'background-color':'white','z-index':'100'});
            $('.bepartner > .steps > .fase-three').css({'background-color':'#5186cc'});
            $('.bepartner > .steps > .fase-three > #seta-three').css({'background-color':'#5186cc','z-index':'100'});
            $('.bepartner > .steps > .fase-three > h6').css({'color':'white'});
        });
        $('.button-socios').on('click', function() {
            $('form .step-three').css({'display':'none'});
            $('form .step-four').css({'display':'block'});
            $('.bepartner > .steps > .fase-three').css({'background':'white'});
            $('.bepartner > .steps > .fase-three > h6').css({'color':'#666'});
            $('.bepartner > .steps > .fase-three > #seta-three').css({'background-color':'white','z-index':'0'});
            $('.bepartner > .steps > .fase-four').css({'background-color':'#5186cc'});
            $('.bepartner > .steps > .fase-four > #seta-four').css({'background-color':'#5186cc','z-index':'-100'});
            $('.bepartner > .steps > .fase-four > h6').css({'color':'white','position':'relative'});
        });
    }
    var voltar_parceiro = function voltar_parceiro(){
        $('.button-voltar-socios').on('click', function() {
            $('form .step-four').css({'display':'none'});
            $('form .step-three').css({'display':'block'});
            $('.bepartner > .steps > .fase-four').css({'background':'white'});
            $('.bepartner > .steps > .fase-four > h6').css({'color':'#666','position':'relative','z-index':'100'});
            $('.bepartner > .steps > .fase-four > #seta-four').css({'background-color':'white','z-index':'-100'});
            $('.bepartner > .steps > .fase-three').css({'background-color':'#5186cc'});
            $('.bepartner > .steps > .fase-three > #seta-three').css({'background-color':'#5186cc','z-index':'100'});
            $('.bepartner > .steps > .fase-three > h6').css({'color':'white','position':'relative','z-index':' 100'});
        });
        $('.button-voltar-dadosempresa').on('click', function() {
            $('form .step-three').css({'display':'none'});
            $('form .step-two').css({'display':'block'});
            $('.bepartner > .steps > .fase-three').css({'background':'white'});
            $('.bepartner > .steps > .fase-three > h6').css({'color':'#666'});
            $('.bepartner > .steps > .fase-three > #seta-three').css({'background-color':'white','z-index':'100'});
            $('.bepartner > .steps > .fase-two').css({'background-color':'#5186cc'});
            $('.bepartner > .steps > .fase-two > #seta-two').css({'background-color':'#5186cc','z-index':'100'});
            $('.bepartner > .steps > .fase-two > h6').css({'color':'white'});
        });
        $('.button-voltar-contato').on('click', function() {
            $('form .step-two').css({'display':'none'});
            $('form .step-one').css({'display':'block'});
            $('.bepartner > .steps > .fase-two').css({'background':'white'});
            $('.bepartner > .steps > .fase-two > h6').css({'color':'#666'});
            $('.bepartner > .steps > .fase-two > #seta-two').css({'background-color':'white','z-index':'0'});
            $('.bepartner > .steps > .fase-one').css({'background-color':'#5186cc'});
            $('.bepartner > .steps > .fase-one > #seta-one').css({'background-color':'#5186cc','z-index':'100'});
            $('.bepartner > .steps > .fase-one > h6').css({'color':'white'});
        });
    }
    var validando = function validando(){
        $(".step-five").validate({
            // Define as regras
            rules:{
                nome:{
                    // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
                    required: true, minlength: 2
                },
                telefone:{
                    required: true, minlength: 2
                },
                sexo:{
                    required: true, minlength: 2
                },
                email:{
                    required: true, minlength: 2
                },
                naturalidade:{
                    required: true, minlength: 2
                },
                nacionalidade:{
                    required: true, minlength: 2
                },
                endereco:{
                    required: true, minlength: 2
                },
                cidade:{
                    required: true, minlength: 2
                },
            },
            // Define as mensagens de erro para cada regra
            messages:{
                nome:{
                    required: "Enter your name",
                },
                telefone:{
                    required: "Enter your name",
                },
                sexo:{
                    required: "Enter your name",
                },
                email:{
                    required: "Enter your name",
                },
                naturalidade:{
                    required: "Enter your name",
                },
                nacionalidade:{
                    required: "Enter your name",
                },
                endereco:{
                    required: "Enter your name",
                },
                cidade:{
                    required: "Enter your name",
                },
            }
        });
        $(".button-dados-pessoais").click(function(){
            if ($(".step-five").valid()) {
                $.post("mensagem.php", $("#trabalhe_conosco").serialize(), function(data) {
                    $("#datamensagem").html(data);
                    alert('Obrigado! entraremos em contato.');
                });
                $('#trabalhe_conosco').each (function(){
                    this.reset();
                });
            }
            else{
                alert('Campo vazio');
                return false;
            }
        });
        $("#submit").click(function(){
            if ($("#trabalhe_conosco").valid()) {
                $.post("mensagem.php", $("#trabalhe_conosco").serialize(), function(data) {
                    $("#datamensagem").html(data);
                    alert('Obrigado! entraremos em contato.');
                });
                $('#trabalhe_conosco').each (function(){
                    this.reset();
                });
            }
            else{
                alert('Campo vazio');
                return false;
            }
        });
    }
    var mascara = function mascara(){
        $("#tel_trab").mask("(999) 99999-9999");
    }
    this.init = function init() {
        $("document").ready(function () {
            mascara();
            prosseguir();
            /*validando();*/
            voltar_trabalhe_conosco();
            parceiro();
            voltar_parceiro();
        });
    }
}
