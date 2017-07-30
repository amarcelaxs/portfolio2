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
    var urlPages = function urlPages(){

    	$(".menu > ul > li > a[data-href]").click(function(i, e){

			var self = this;

			setTimeout(function(){

			    window.location.href = $(self).attr("data-href");
			}, 500);
		});
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
    var menu_responsivo = function() {
        $(".solucoes > a ").css("display", "none");
        $("li.solucoes").prepend("<a class='solucoes menu-item' role='button' href='javascript:void(0);'>Soluções</a>");
        if ($(window).width() <= 640) {
            $("li.solucoes > a").addClass("solucoes");
            $(".solucoes > a").css("display", "none");
            //$( "li.solucoes" ).prepend( "<a class='solucoes menu-item ' role='button' >Soluções</a>" );
            $("li.solucoes").prepend("<a class='solucoes menu-item dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='button' href='#'>Soluções</a>");
            $(".caracteristicas-gerais").click(function() {
                $(".caracteristicas-gerais").addClass("active");
            /* window.location.replace("http://www.cmcorp.com.br/solucoes");*/
            });
            $(".advocacia").click(function() {
                $(".advocacia").addClass("active");
                window.location.replace("http://www.cmcorp.com.br/escritorio-de-advocacia-segmento");
            });
            $(".previdencia").click(function() {
                $(".previdencia").addClass("active");
                window.location.replace("http://www.cmcorp.com.br/previdencia-privada-segmento");
            });
            $(".hotrest").click(function() {
                $(".hotrest").addClass("active");
                window.location.replace("http://www.cmcorp.com.br/hoteis-e-restaurantes-segmento");
            });
            $(".industrias").click(function() {
                $(".industrias").addClass("active");
                window.location.replace("http://www.cmcorp.com.br/industria-segmento");
            });
            $(".comercio").click(function() {
                $(".comercio").addClass("active");
                window.location.replace("http://www.cmcorp.com.br/comercio-segmento");
            });    
            $(".servicos").click(function() {
                $(".servicos").addClass("active");
                window.location.replace("http://www.cmcorp.com.br/servicos-segmento");
            });
            $('#nav-icon1').click(function() {
                $(this).toggleClass('open');
            });
            $('#nav-icon1').on('click', function() {
                var menu_collapse = $('header .menu')[0].classList[1];
                if (menu_collapse == 'uncollapsed') {
                    $('header .menu').removeClass('uncollapsed').addClass('collapsed').css('height', '243px');
                };
                if (menu_collapse == 'collapsed') {
                    $('header .menu').removeClass('collapsed').addClass('uncollapsed').css('height', '1px');
                    $('header .menu .menu-solucoes').removeClass('collapsed').addClass('uncollapsed');
                    $(".contato").css("top", "0");
                    $(".noticias").css("top", "0");
                };
            });
            $('header .menu li.solucoes').on('click', function() {
                var submenu_collapse = $('header .collapsed .menu-solucoes')[0].classList[1];
                if (submenu_collapse == 'uncollapsed') {
                    $('header .collapsed .menu-solucoes').removeClass('uncollapsed').addClass('collapsed');
                    $('header .menu').css('height', '561px');
                    $(".contato").css("top", "326px");
                    $(".noticias").css("top", "326px");
                };
                if (submenu_collapse == 'collapsed') {
                    $('header .collapsed .menu-solucoes').removeClass('collapsed').addClass('uncollapsed');
                    $('header .menu').css('height', '243px');
                    $(".contato").css("top", "0");
                    $(".noticias").css("top", "0");
                };
            });
        }
    }
    var reset_chat_style = function reset_chat_style(chat, chat_opened)
    {
        var iframe = chat.find('iframe').contents().find('head');
        iframe.append('<link href="http://www.cmcorp.com.br/wp-content/themes/cmcorp/css/style.css" rel="stylesheet">');
        $('#tawkchat-drag-element').removeAttr('style').css('display', 'none');
        chat.find('#tawkchat-maximized-iframe-element').removeAttr('style').addClass('tawkchat-default');
        chat.find('[id*="tawkchat-resize-"]').removeAttr('style').addClass('tawkchat-default').addClass('border-default');
        chat.find('#tawkchat-resize-left').addClass('border-sides-default');
        chat.find('#tawkchat-resize-right').addClass('border-sides-default');
        chat.find('#tawkchat-resize-top').addClass('border-sides-default');
        chat.find('#tawkchat-resize-bottom').addClass('border-sides-default');
        chat.find('#tawkchat-resize-top-left').addClass('border-corners-default');
        chat.find('#tawkchat-resize-top-right').addClass('border-corners-default');
        chat.find('#tawkchat-resize-bottom-left').addClass('border-corners-default');
        chat.find('#tawkchat-resize-bottom-right').addClass('border-corners-default');
        if (chat_opened == false)
        {
            chat.removeAttr('style').css('display', 'none').css('transform', 'translateY(431px)');
        }
        else
        {
            chat.removeAttr('style').css('transform', 'translateY(0px)');
        };
    }
    var startchat = function startchat(chat)
    {
        chat.css('display', 'block');
        chat.find('#tawkchat-maximized-iframe-element').css('display', 'block');
        setTimeout(function()
        {
            if (chat[0].style.transform == 'translateY(431px)')
            {
                chat.removeAttr('style').css('transform', 'translateY(0px)');
            }
            else
            {
                chat.removeAttr('style').css('transform', 'translateY(431px)');
            };
        }, 100);
    }
    var open_chat_alert = function open_chat_alert()
    {
        $('.nav-top .aviso').css('display', 'block');
        $('body').css('overflow', 'hidden');
        setTimeout(function()
        {
            $('.nav-top .aviso').css('opacity', '1');
        }, 10);
    }
    var close_chat_alert = function close_chat_alert(element)
    {
        if (element.target.className == 'aviso' || element.target.className == 'box-close' || element.target.className == 'fa fa-times')
        {
            $('.nav-top .aviso').css('opacity', '0');
            $('body').css('overflow', 'visible');
            setTimeout(function()
            {
                $('.nav-top .aviso').css('display', 'none');
            }, 210);
        };
    }
    var get_user_info = function get_user_info(iframe_maximized)
    {
        /*$.post("/wp-content/themes/cmcorp/tst.php",
        {
            name: iframe_maximized.find('#formContainer .form input[type="text"]').val(),
            email: iframe_maximized.find('#formContainer .form input[type="email"]').val()
        },
        function(resp)
        {
            console.log(resp);
            alert(resp);
        });
        */
        $.ajax({
            type: 'POST',
            url: '/wp-content/themes/cmcorp/listas_email.php',
            dataType: 'html',
            data: {
                name:iframe_maximized.find('#formContainer .form input[type="text"]').val(),
                email: iframe_maximized.find('#formContainer .form input[type="email"]').val()
            },
            success: function(response) {
                console.log(response);
                alert(response);                
                $('#result').html(response);
            }
        });
    }
    var bp = false;
    var batePapo = function batePapo()
    {
        var chat = $('#tawkchat-iframe-container');
        var iframe_maximized = chat.find('iframe').contents().find('#tawkchat-maximized-wrapper #innerWrapper');
        if (chat[0] != undefined && iframe_maximized[0] != undefined)
        {
            bp = true;
            var chat_opened = false;
            if (iframe_maximized.find('#chatPanel #chatWrapper')[0].children.length > 1)
            {
                chat_opened = true;
            };
            reset_chat_style(chat, chat_opened);

            $('.nav-top li.chat').css('display', 'block');

            $('.chat-email').css('display', 'block');

            $('.nav-top li.chat').on('click', function()
            {
                var horario = new Date();
                if ($('.nav-top li.chat').hasClass('diautil') && horario.getHours() >= 9 && horario.getHours() < 18)
                {
                    Tawk_API.toggle();
                    startchat(chat);
                }
                else
                {
                    open_chat_alert();
                };
            });
            $('.chat-email').on('click', function()
            {
                var horario = new Date();
                if ($('.chat-email').hasClass('diautil') && horario.getHours() >= 9 && horario.getHours() < 18)
                {
                    Tawk_API.toggle();
                    startchat(chat);
                }
                else
                {
                    open_chat_alert();
                };
            });
            $('.nav-top .aviso').on('click', function(element)
            {
                element.stopPropagation();
                close_chat_alert(element);
            });
            $('.nav-top .aviso .aviso-box .box-header .box-close').on('click', function(element)
            {
                element.stopPropagation();
                close_chat_alert(element);
            });
            iframe_maximized.find('#formContainer button').on('click', function()
            {
                get_user_info(iframe_maximized);
            });
            iframe_maximized.find('#headerBox #headerBoxControlsContainer #endChat').on('click', function()
            {
                var dsp = iframe_maximized.find('#chatPanel #greetingsOverlay').attr('style');
                if (dsp == undefined || dsp == "display: block;")
                {
                    startchat(chat);
                }
                else
                {
                    iframe_maximized.find('#formContainer').removeAttr('style').attr('style', 'display: block; height: 109px ! important; top: 304px;');
                    iframe_maximized.find('#endChatForm .longFormBottomContainer #formCancel').on('click', function()
                    {
                        iframe_maximized.find('#formContainer').removeAttr('style').css('display', 'none');
                    });
                    iframe_maximized.find('#endChatForm .longFormBottomContainer #formSubmit').on('click', function()
                    {
                        var timer = setInterval(function()
                        {
                            if (iframe_maximized.find('#formContainer')[0].style.display == 'none')
                            {
                                startchat(chat);
                                clearInterval(timer);
                            };
                        }, 10);
                    });
                };
            });
            iframe_maximized.find('#endChatForm .longFormBottomContainer #formSubmit').on('click', function()
            {
                startchat(chat);
            });
        };
    }
    this.init = function init(){
        menu_responsivo();
        var tentativas = 0;
        var bp_timer = setInterval(function()
        {
            batePapo();
            if (bp == true)
            {
                console.log('Chat carregado');
                clearInterval(bp_timer);
            }
            else
            {
                console.log('Chat ainda não carregado');
            };
            tentativas++;
            if (tentativas > 150)
            {
                console.log('O chat não pôde ser carregado');
                clearInterval(bp_timer);
            };
        }, 200);
        $(document).ready(function(){
            menuLineAnimation();
            subir();
            urlPages();
            footerSolucoes();
        });
    }
};