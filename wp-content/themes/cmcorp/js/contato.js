var contato = new function contato() {
    var animationseta = function animationseta() {
        $(".workwithus").hide();
        $(".bepartner").hide();
        $(".talktous").show();
        $(".fale-conosco").click(function () {
            $("#menu-interno .barra-seta span").css("left", "15%");
            $(".fale-conosco").css("background","#D79E29");
            $(".trabalhe-conosco").css("background"," #3D3D3D");
            $(".seja-parceiro").css("background"," #3D3D3D");
            $(".talktous").show();
            $(".workwithus").hide();
            $(".bepartner").hide();
        });
        $(".trabalhe-conosco").click(function () {
            $("#menu-interno .barra-seta span").css("left", "49%");
            $(".trabalhe-conosco").css("background","#D79E29");
            $(".fale-conosco").css("background"," #3D3D3D");
            $(".seja-parceiro").css("background"," #3D3D3D");
            $(".workwithus").show();
            $(".talktous").hide();
            $(".bepartner").hide();
        });
        $(".seja-parceiro").click(function () {
            $("#menu-interno .barra-seta span").css("left", "82%");
            $(".seja-parceiro").css("background","#D79E29");
            $(".trabalhe-conosco").css("background"," #3D3D3D");
            $(".fale-conosco").css("background"," #3D3D3D");
            $(".bepartner").show();
            $(".workwithus").hide();
            $(".talktous").hide();
        });
    }
    var mascara = function mascara() {
        $("#contato_telefone").mask("(99) 9999-9999?9");
         $(".tel_trab").mask("(99) 9999-9999?9");       
        $("#sp_telefone").mask("(99) 9999-9999?9");   
    }
     var redirecionar = function redirecionar()
    {
        
        $( "#wpcf7-f390-o1" ).on( "submit", function( event ) {
            event.preventDefault();
        console.log( $( this ).serialize() );        
        //});     
       //$('form.#wpcf7-f390-o1').html('teste');       
      //  $(".button-cadastro").click(function() {
        var formdata = $("#wpcf7-f390-o1").serialize();  
        var motivo =  document.getElementById('motivo').value;
        var contato_nome =  document.getElementById('contato_nome').value;
        var contato_empresa =  document.getElementById('contato_empresa').value;
        var contato_cidade =  document.getElementById('contato_cidade').value;
        var contato_uf =  document.getElementById('contato_uf').value;
        var contato_email =  document.getElementById('contato_email').value;
        var contato_telefone =  document.getElementById('contato_telefone').value;
        var contato_msg =  document.getElementById('contato_msg').value
        $.ajax(
        {
            type: 'POST',
            url: '/wp-content/themes/cmcorp/formfaleconosco.php',
            dataType: 'html',
            data:
            {
                motivo: motivo,
                contato_nome: contato_nome,
                contato_empresa:contato_empresa,
                contato_cidade:contato_cidade,
                contato_uf:contato_uf,
                contato_email:contato_email,
                contato_telefone:contato_telefone,
                contato_msg:contato_msg
            },
            success: function(resposta)
            {
                console.log(resposta);
                console.log('js funcionou');                 
                $('#resultado').html(resposta);         
               
            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                $(XMLHttpRequest).AjaxDebug(
                {
                    containerId : 'load',
                    nativeConsole : false
                });
            }
            })
        });
        
        $( "#wpcf7-f619-o2" ).on( "submit", function( event ) {
        event.preventDefault();
        console.log( $( this ).serialize() );        
        //});     
       //$('form.#wpcf7-f390-o1').html('teste');       
      //  $(".button-cadastro").click(function() {
        var formdata = $("#wpcf7-f619-o2").serialize();  
        var tc_nome = document.getElementById('tc_nome').value;
        var tc_telefone =  document.getElementById('tc_telefone').value;
        var tc_email =  document.getElementById('tc_email').value;
        var tc_msg =  document.getElementById('tc_msg').value;
        $.ajax(
        {
            type: 'POST',
            url: '/wp-content/themes/cmcorp/formtrabalheconosco.php',
            dataType: 'html',
            data:
            {
              tc_nome:tc_nome,
              tc_telefone:tc_telefone,
              tc_email:tc_email,
              tc_msg:tc_msg
            },
            success: function(trabalheconosco)
            {
                console.log(trabalheconosco);
                console.log('js funcionou');                 
               // $('#resultado').html(newsletter);         
               
            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                $(XMLHttpRequest).AjaxDebug(
                {
                    containerId : 'load',
                    nativeConsole : false
                });
            }
            })
        });
        
        
        
        $("#wpcf7-f630-o3" ).on("submit", function( event ) {
        event.preventDefault();
        console.log( $( this ).serialize() );        
        //});     
       //$('form.#wpcf7-f390-o1').html('teste');       
      //  $(".button-cadastro").click(function() {
        var sejaparceiro = $("#wpcf7-f630-o3").serialize();  
      
        
        
        var sp_nomecontato= document.getElementById('sp_nomecontato').value;
        var sp_empresa =  document.getElementById('sp_empresa').value;
        var sp_cidade =  document.getElementById('sp_cidade').value;
        var sp_telefone =  document.getElementById('sp_telefone').value;
        var sp_email =  document.getElementById('sp_email').value;      
        var sp_descricao_geral =  $('#descricaogeral').val();
        var sp_principais_capacidades = $('#principaiscapacidades').val();
        var sp_linha_atuacao = $('#linhaatuacao').val();
        var sp_parceria = $('#parceria').val();   
        $.ajax(
        {
            type: 'POST',
            url: '/wp-content/themes/cmcorp/formsejaparceiro.php',
            dataType: 'html',
            data:
            { 
                 sp_nomecontato : sp_nomecontato,
                 sp_empresa :  sp_empresa,
                 sp_cidade :  sp_cidade,
                 sp_telefone : sp_telefone,
                 sp_email : sp_email,
                 sp_descricao_geral : sp_descricao_geral,
                 sp_principais_capacidades : sp_principais_capacidades,
                 sp_linha_atuacao : sp_linha_atuacao,
                 sp_parceria : sp_parceria,
        
            },            
            success: function(sejaparceiro)
            {
                console.log(sejaparceiro);
                console.log('js funcionou');                 
                $('#resultado').html(sejaparceiro);         
               
            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                $(XMLHttpRequest).AjaxDebug(
                {
                    containerId : 'load',
                    nativeConsole : false
                });
            }
            })
        });
         $( "#wpcf7-f398-o4" ).on( "submit", function( event ) {
          event.preventDefault();
        console.log( $( this ).serialize() );        
        //});     
       //$('form.#wpcf7-f390-o1').html('teste');       
      //  $(".button-cadastro").click(function() {
        var formnewsletter = $("#wpcf7-f398-o4").serialize();  
        var input_nome =  document.getElementById('inputnome').value;
        var input_email =  document.getElementById('inputemail').value;
      
        $.ajax(
        {
            type: 'POST',
            url: '/wp-content/themes/cmcorp/formnewsletter.php',
            dataType: 'html',
            data:
            {
                n_input_nome: input_nome,
                n_input_email: input_email              
            },
            success: function(newsletter)
            {
                console.log(newsletter);
                console.log('js funcionou');                 
                $('#resultado').html(newsletter);         
               
            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                $(XMLHttpRequest).AjaxDebug(
                {
                    containerId : 'load',
                    nativeConsole : false
                });
            }
            })
        });       
    }
    
    
    
    
    /*var validation = function validation() {
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
    }*/
    var mapa = function mapa() {
      var myLatlng = new google.maps.LatLng(-22.9735459,-43.3737283);
        var mapOptions = {
            zoom: 17,
            draggable: true,
            center: myLatlng,
            scrollwheel:false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        // Exibir o mapa na div #mapa;
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        // Marcador personalizado;
        //var image = 'wp-content/themes/cmcorp/img/fale-conosco/cm-pin.png';
        var image = '/wp-content/themes/cmcorp/img/fale-conosco/cm-pin.png';
        var marcadorPersonalizado = new google.maps.Marker({
            position: myLatlng,
            map: map,
            icon: image,
            title: 'CMCorp Rio de Janeiro/RJ',
            animation: google.maps.Animation.DROP
        });
        
    }
    var scrolldown = function down() {
	    $('#descer').click(function() {
	       $('body,html').animate({ scrollTop: $('body').height() }, 1000);
	        return false;
	    });
    }
    var filesel = function filesel() {
        (function(document, window, index)
        {
            var inputs = document.querySelectorAll('.file');
            Array.prototype.forEach.call(inputs, function(input)
            {
                var label = $(input).parent().parent().children("label")[0];
                input.addEventListener('change', function(e)
                {
                    label.querySelector('span').innerHTML = e.target.value.split('\\').pop();
                    label.querySelector('span').className += " selected";
                    if ($(window).width() <= 640 || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                        label.style.height = '74px';
                    }
                });
            });
        }(document, window, 0));
    }
    var map_unlocker = function map_unlocker() {
        var btn = false;
        $('#map-unlocker').on('click', function() {
            if (btn == false)
            {
                $('#map-unlocker div.sim, #map-unlocker div.nao').css('display', 'inline-block');
                $('#map-unlocker h2').css('opacity', '1');
            }
            else
            {
                btn = false;
            };
        });
        $('#map-unlocker .sim').on('click', function() {
            $('#map-unlocker h2').css('opacity', '0');
            btn = true;
            setTimeout(function() {
                $('#map-unlocker').css('display', 'none');
            }, 210);
        });
        $('#map-unlocker .nao').on('click', function() {
            $('#map-unlocker h2').css('opacity', '0');
            setTimeout(function() {
                $('#map-unlocker div.sim, #map-unlocker div.nao').css('display', 'none');
            }, 210);
            btn = true;
        });
    }
   var botaoAgendar = function(){
            
     
            $("#motivo option:contains('Agendamento de demonstração CMFlex/CMPrev-Web')").attr("selected","");    
        
             }
  
    this.init = function init() {
        $("document").ready(function () {
                animationseta();
                filesel();
                mapa();
                mascara();
                scrolldown();
                botaoAgendar();
                map_unlocker();
                redirecionar();
                //validation();
        });
    }
}