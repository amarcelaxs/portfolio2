var all = new function all(){
    var helpers = new function helpers(){

        //Código para adicionar os IDs de notícias e linhas e a descrição da notícia em seus respectivos lugares.
        String.prototype.fmt = function ()
        {
            var args = arguments;
            return this.replace
            (
                /\{(\d+)\}/g, function ($0, $1)
                {
                    return args[$1] !== void 0 && args[$1] !== null ? args[$1] : '';
                }
            );
        };
    } 
    /*menu ativo*/
    this.menu = function menu()
    {        
        $(".page-template-contato .navbar-right > .contato").addClass("active");
        $(".page-template-empresa .navbar-right .empresa").addClass("active");
        $(".page-template-noticias .navbar-right > .noticias").addClass("active");
        $(".page-template-page-homepage .navbar-right > .home").addClass("active");
        $(".page-template-segmentos .navbar-right > .solucoes").addClass("active");
        $(".page-template-segmentos_280116-1820 .navbar-right > .solucoes").addClass("active");
        $(".page-template-solucoes .navbar-right > .solucoes").addClass("active");
        $(".single-post .navbar-right > .noticias").addClass("active");
    }
	var menuLineAnimation = function menuLineAnimation()
    {
        var mls = document.querySelector('.menu .line').style;
        var bmla = $('nav.menu > ul > li.active');
        if (bmla.length > 0)
        {
            setTimeout
            (
                function ()
                {   // Delay para pegar a tamanho correto do width e left
                    mls.left = bmla[0].offsetLeft + 'px';
                    mls.width = bmla[0].clientWidth + 'px';
                },
                100
            );
            window.mlsLeft = bmla[0].offsetLeft;
            window.mlsWidth = bmla[0].clientWidth;
        }
        setTimeout
        (
            function()
            {
                $('.menu .line').addClass("transition");
            },
            200
        )
        $('nav.menu > ul > li').click
        (
            function ()
            {
                $('nav.menu > ul > li').removeClass("active");
                $(this).addClass("active");
                var self = this;
                if (this.offsetLeft > window.mlsLeft)
                {
                    mls.width = (this.offsetLeft - window.mlsLeft + this.clientWidth) + 'px';
                    setTimeout
                    (
                        function ()
                        {
                            mls.left = self.offsetLeft + 'px';
                            mls.width = self.clientWidth + 'px';
                        },
                        350
                    );
                }
                else
                {
                    mls.left = this.offsetLeft + 'px';
                    mls.width = (window.mlsWidth + window.mlsLeft - this.offsetLeft) + 'px';
                    setTimeout
                    (
                        function ()
                        {
                            mls.width = self.clientWidth + 'px';
                        },
                        350
                    );
                }
                window.mlsLeft = this.offsetLeft;
                window.mlsWidth = this.clientWidth;
            }
        );
    };
    var subir = function subir(){

	    $('#subir').click(function(){
	        $('html, body').animate({scrollTop:0}, 'slow'),1000;
	        return false;
	    });
    };
    /*var batePapo = function batePapo() {
        $(".chat").click(function(){
            Formilla.initFormillaChat();
        });       
    }*/
    var urlPages = function urlPages(){

    	$(".menu > ul > li > a[data-href]").click(function(i, e){

			var self = this;

			setTimeout(function(){

			    window.location.href = $(self).attr("data-href");
			}, 500);
		});
    }
    
    
     var animation = function  animation(){
        window.scrollReveal = new scrollReveal();
    }
    var  footerSolucoes = function  footerSolucoes(){
        $(".cmflex").click(function(){
              window.location.replace("http://www.cmcorp.com.br/solucoes");            
        });
        $(".cmprev").click(function(){
                window.location.replace("http://www.cmcorp.com.br/solucoes");
        });
        $(".totalprev").click(function(){
                   window.location.replace("http://www.cmcorp.com.br/solucoes");
        });
        $(".link-contato").click(function(){
            window.location.replace("http://www.cmcorp.com.br/contato");
        });
    }


    var  menu_responsivo = function() {
            $(" .solucoes>a ").css("display","none");
            $( "li.solucoes" ).prepend( "<a class='solucoes menu-item ' role='button'  href='javascript:void(0);' >Soluções</a>" );
            
        var tam = $(window).width();
         if ( tam <= 720 ){
                $( "li.solucoes " ).addClass( "dropdown" );   
               $( "li.solucoes > a" ).addClass( "solucoes" );    
               $(" .solucoes>a ").css("display","none");
               //$( "li.solucoes" ).prepend( "<a class='solucoes menu-item ' role='button' >Soluções</a>" );
               $( "li.solucoes" ).prepend( "<a class='solucoes menu-item dropdown-toggle' data-toggle='dropdown'  aria-haspopup='true' aria-expanded='false' role='button'  href='#' >Soluções</a>" );
           
                $(".solucoes > .menu-solucoes").addClass( "dropdown-menu" );  
          
            $('.solucoes').toggle(function() {
                  //$( "li.solucoes" ).addClass( "active" );
                    $(" #navbar > ul").css("height","540px");
                    //$(" .menu .solucoes:active .open + .noticias + .contato {").css("top","282px");
                    $(".contato").css("top","326px");
                $(".noticias").css("top","326px")
                        
                $(".menu-solucoes").css("display","block")
                }, function() {
                $(".contato").css("top","0");
                $(".noticias").css("top","0");
                
                    $("#navbar > ul").css("height","220px");
                    $(".menu-solucoes").css("display","none");
                });
                
                 
                $(".caracteristicas-gerais").click(function(){
                     $(".caracteristicas-gerais").addClass("active");
                   /* window.location.replace("http://www.cmcorp.com.br/solucoes");*/
                  
                });
				
                $(".advocacia").click(function(){
                    $(".advocacia").addClass("active");
                    window.location.replace("http://www.cmcorp.com.br/escritorio-de-advocacia-segmento");
                });
                $(".previdencia").click(function(){
                     $(".previdencia").addClass("active");
                    window.location.replace("http://www.cmcorp.com.br/previdencia-privada-segmento");
                });
                $(".hotrest").click(function(){
                     $(".hotrest").addClass("active");
                    window.location.replace("http://www.cmcorp.com.br/hoteis-e-restaurantes-segmento");
                });
                $(".industrias").click(function(){
                     $(".industrias").addClass("active");
                    window.location.replace("http://www.cmcorp.com.br/industria-segmento");
                });
                $(".comercio").click(function(){
                     $(".comercio").addClass("active");
                    window.location.replace("http://www.cmcorp.com.br/comercio-segmento");
                });    
                $(".servicos").click(function(){
                     $(".servicos").addClass("active");
                    window.location.replace("http://www.cmcorp.com.br/servicos-segmento");
                });
				
				$('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
                    $(this).toggleClass('open');
                });
         }
    }
    this.init = function init(){
              menu_responsivo();
    	$(document).ready(function(){
            menuLineAnimation();
            subir();
            urlPages();
            animation();
            footerSolucoes();
          
           // batePapo();  
        
        });
    }

};