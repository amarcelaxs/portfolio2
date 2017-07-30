var contato = new function contato() {

    var hoverMenuBanner = function hoverMenuBanner() {

        /**mouseover no menu-banner em contato.php**/

        $(".menu-contato > div > div").mouseover(function () {
            $(this).find(".um").css("opacity", "0.1");
            $(this).find(".dois").css("display", "block");
        });
        $(".menu-contato > div > div").mouseout(function () {
            $(this).find(".um").css("opacity", "1");
            $(this).find(".dois").css("display", "none");
        });
        /**Fim mouseover no menu-banner em contato.php**/

    }

    var animationseta = function animationseta() {
        $(".workwithus").hide();
        $(".bepartner").hide();
        $(".talktous").show();
        $(".fale-conosco").click(function () {
            $("#menu-interno .barra-seta span").css("margin-left", "15%");
            $(".talktous").show();
            $(".workwithus").hide();
            $(".bepartner").hide();
        });

        $(".trabalhe-conosco").click(function () {
            $("#menu-interno .barra-seta span").css("margin-left", "49%");
            $(".workwithus").show();
            $(".talktous").hide();
            $(".bepartner").hide();
        });
        $(".seja-parceiro").click(function () {
            $("#menu-interno .barra-seta span").css("margin-left", "82%");
            $(".bepartner").show();
            $(".workwithus").hide();
            $(".talktous").hide();


        });

    }

    var mascara = function mascara() {
        $("#telefone").mask("(999) 99999-9999");

    }
    var validation = function validation() {
        $(".wpcf7").submit(function () {
            var email = $("#email").val();
            if (email != "") {
                var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                if (filtro.test(email)) {
                    return true;
                } else {
                    alert("Email não é válido!");

                    return false;
                }
            }
        });
    }



        this.init = function init() {

            $("document").ready(function () {

                //if ($("body[pagina=pcontato]").length > 0) {
                    
                    hoverMenuBanner();
                    animationseta();
                    mascara();
                    validation();
                        
                //}
            });

        }
}