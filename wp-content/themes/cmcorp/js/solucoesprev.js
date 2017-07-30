var solucoesprev = new function solucoesprev(){

    var gridsolucoes =  function gridsolucoes() {

        // init Isotope

        var $grid = $('.grid-sistema-solucoes');

        $grid.isotope({
            getSortData: {
                number: '.order parseInt'
            },
            sortBy: [ 'number' ]
        });
        

        $('.filter-list-group').on('click', 'li span', function () {

            var filterValue = $(this).attr('data-filter');

            $('.filter-list-group li span').removeClass('active');

            $(this).addClass('active');

            $grid.isotope({
                filter: filterValue,
                getSortData: {
                    number: '.order parseInt'
                },
                sortBy: [ 'number' ]
            });
        });
        

    }
    var gridsolucoesCombo =  function gridsolucoesCombo() {
        if ($(window).width() <= 640) {
        // init Isotope
        var $grid = $('.grid-sistema-solucoes');
        $grid.isotope({
            getSortData: {
                number: '.order parseInt'
            },
            sortBy: [ 'number' ]
        });
        // filter functions
        var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function() {
            var number = $(this).find('.number').text();
            return parseInt( number, 10 ) > 50;
            },
            // show if name ends with -ium
            ium: function() {
            var name = $(this).find('.name').text();
            return name.match( /ium$/ );
            }
        };
        // bind filter on select change
        $('.select-sistemas').on( 'change', function() {
            // get filter value from option value
            var filterValue = this.value;
            // use filterFn if matches value
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({ filter: filterValue });
        });
            
        var swiperFn = function swiperFn()
	   {
		function swiperSlide(num)
		{
			var cards = $("div.modal-content").length;
			var slide_per_view = num;
			// var range = cards - slide_per_view;
			// $('#rangeCards').attr('max', range);
			var swiper = new Swiper
			(
				'.modal-dialog .swiper-container',
				{
					autoplay: 10000,
					pagination: '.modal-dialog .swiper-pagination',
					paginationClickable: true,
					paginationHide: false,
					slidesPerGroup: slide_per_view,
					slidesPerView: slide_per_view,
					spaceBetween: 30
				}
			);
			$('.modal-dialog .swiper-slide').hover(
				function () {
					swiper.stopAutoplay();
				},
				function () {
					swiper.startAutoplay();
				}
			);
			
		}
		function numSlider()
		{
			var scre = $(window).width();
			var num;
			if (scre >= 1200)
			{
				num = 4;
			}
			else if (scre >= 992 && scre < 1200)
			{
				num = 3;
			}
			else if (scre >= 768 && scre < 992)
			{
				num = 2;
			}
			else if (scre > 480 && scre < 768)
			{
				num = 2;
			}
			else if (scre <= 480)
			{
				num = 1;
			}
			return num;
		}
		swiperSlide(numSlider());
		$(window).resize
		(
			function ()
			{
				//window.swiper.destroy();
				swiperSlide(numSlider());
			}
		);
	}
        
        
        
        }   
   }

    var accordions = function() {

        setTimeout(function function_name (argument) {

            $(".accordion").accordion({

                animate: 150

            });

        }, 200)

    }
    var accordion_height = function () {
        setTimeout(function ()
        {
            var uiIds = $("div[id^=ui-id]");
            uiIds.each(function(i,e){
                $(e).css('display', 'block');
                $(e).css('height', ($(e).children("div").height() + 43));
                if (uiIds[i].classList[0] != "accordion-block")
                {
                    $(e).css('display', 'none');
                };
            });
        }, 300)
    }

    var modal_sistema = function() {
        var modals = [];
        var modal_swipe = 0;
        $('#modal-sistemas .modal-content').find('.order-modal').each(function(contador) {
            modals[parseInt($('.grid-sistema-solucoes .item-port:nth-child(' + (contador + 1) + ') span').html()) - 1] = $('#modal-sistemas .modal-content:nth-child(' + (contador + 1) + ')').attr('data-page-id');
        });
        if ($(window).width() <= 800) {
            var modal_left = 0;
            var modal_padding = 5.0;
            if ($(window).width() > 640) {
                modal_padding = 2.5;
            };
            $('#modal-sistemas .modal-content').find('.order-modal').each(function(contador) {
                $('[data-page-id=' + modals[contador] + ']').css('left', 'calc(' + modal_left + 'vw + ' + modal_padding + 'vw)');
                modal_left += 100;
            });
            $('#modal-sistemas .modal-dialog').css('width', modal_left + 'vw');
        }
        // Código para filtrar os segmentos.
        /*var gerenciais = [];
        var gestao_financeira = [];
        var gestao_investimentos = [];
        var gestao_previdencia = [];
        var operacionais = [];
        var sistemas_auxiliares = [];
        $('#modal-sistemas .gerenciais').each(function(contador) {
            gerenciais[contador] = parseInt($(v.children[0].children[1].children[1].children[1].textContent).selector);
        });
        $('#modal-sistemas .gestao_financeira').each(function(contador) {
            gestao_financeira[contador] = parseInt($(v.children[0].children[1].children[1].children[1].textContent).selector);
        });
        $('#modal-sistemas .gestao_investimentos').each(function(contador) {
            gestao_investimentos[contador] = parseInt($(v.children[0].children[1].children[1].children[1].textContent).selector);
        });
        $('#modal-sistemas .gestao_previdencia').each(function(contador) {
            gestao_previdencia[contador] = parseInt($(v.children[0].children[1].children[1].children[1].textContent).selector);
        });
        $('#modal-sistemas .operacionais').each(function(contador) {
            operacionais[contador] = parseInt($(v.children[0].children[1].children[1].children[1].textContent).selector);
        });
        $('#modal-sistemas .sistemas_auxiliares').each(function(contador) {
            sistemas_auxiliares[contador] = parseInt($(v.children[0].children[1].children[1].children[1].textContent).selector);
        });*/
        $('#modal-sistemas').on('show.bs.modal', function(e) {
            var pageId = $(e.relatedTarget).attr('data-page-id');
            var modal = $(this);
            var selecionado = modal.find('[data-page-id=' + pageId + ']');
            modal.find('[data-page-id]').each(function(k, v) {
                $(v).addClass('item-nao-ativo');
                $(v).removeClass('item-ativo');
            });
            selecionado.removeClass('item-nao-ativo');
            selecionado.addClass('item-ativo');
            accordions();
            accordion_height();
            var elementosFiltrados = [];
            $('.item-port')
            .filter(function(k, v) {
                return $(v).css('display') !== 'none';
            })
            .each(function(k, v) {
                elementosFiltrados.push($(v).find('a[href="#modal-sistemas"]').attr('data-page-id'));
            });
            modal
            .find('[data-page-id]')
            .each(function(k, v) {
                v = $(v);
                if($.inArray(v.attr('data-page-id'), elementosFiltrados) === -1) {
                    v.removeClass('com-filtro');
                } else {
                    v.addClass('com-filtro');
                }
            });
            $('#modal-sistemas')
                .find('[data-page-id=' + modals[0] + ']')
                .find('.sistema-prev span')
                .removeClass('glyphicon-chevron-left')
                .addClass('glyphicon-minus');
            $('#modal-sistemas')
                .find('[data-page-id=' + modals[0] + ']')
                .find('.sistema-prev')
                .off('click');
            $('#modal-sistemas')
                .find('[data-page-id=' + modals[modals.length - 1] + ']')
                .find('.sistema-next span')
                .removeClass('glyphicon-chevron-right')
                .addClass('glyphicon-minus');
            $('#modal-sistemas')
                .find('[data-page-id=' + modals[modals.length - 1] + ']')
                .find('.sistema-next')
                .off('click');
        });
        $('.sistema-prev').on('click', function() {
            var modal = $('#modal-sistemas');
            var ativo = modal.find('.item-ativo.com-filtro');
            var anterior = modal.find('[data-page-id=' + modals[parseInt($(this.lastChild.textContent).selector) - 2] + ']');
            var anteriores = ativo.prevAll('.com-filtro');
            $(anteriores.get()).each(function(k, v) {
               if($(v).hasClass('com-filtro')) {
                   return false;
               };
            });
            modal.find('[data-page-id]').each(function(k, v) {
                $(v).addClass('item-nao-ativo');
                $(v).removeClass('item-ativo');
            });
            anterior.removeClass('item-nao-ativo');
            anterior.addClass('item-ativo');
            accordions();
            accordion_height();
        });
        $('.sistema-next').on('click', function() {
            var modal = $('#modal-sistemas');
            var ativo = modal.find('.item-ativo.com-filtro');
            var proximo = modal.find('[data-page-id=' + modals[parseInt($(this.lastChild.textContent).selector)] + ']');
            var proximos = ativo.nextAll('.com-filtro');
            proximos.each(function(k, v) {
               if($(v).hasClass('com-filtro')) {
                   return false;
               };
            });
            modal.find('[data-page-id]').each(function(k, v) {
                $(v).addClass('item-nao-ativo');
                $(v).removeClass('item-ativo');
            });
            proximo.removeClass('item-nao-ativo');
            proximo.addClass('item-ativo');
            accordions();
            accordion_height();
        });

        if ($(window).width() <= 800 || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            var hammer = new Hammer(this);
            $('.grid-sistema-solucoes .item-port.view').on('click', function(e) {
                modal_swipe = (parseInt(e.currentTarget.children[0].textContent) - 1) * -100;
                $('#modal-sistemas .modal-dialog').css('transform', 'translateX(' + modal_swipe + 'vw)');
            });
            hammer.on('swipeleft', function() {
                if (modal_swipe > (modals.length - 1) * -100) {
                    modal_swipe -= 100;
                    $('#modal-sistemas .modal-dialog').css('transform', 'translateX(' + modal_swipe + 'vw)');
                };
            });
            hammer.on('swiperight', function() {
                if (modal_swipe < 0) {
                    modal_swipe += 100;
                    $('#modal-sistemas .modal-dialog').css('transform', 'translateX(' + modal_swipe + 'vw)');
                };
            });
             
        }

    };

     var  link_contato = function  link_contato(){
        $(".link-c").click(function(){            
            window.location.replace("http://www.cmcorp.com.br/contato");
        });
    }

    this.init = function init(){
        // init Isotop e//
         gridsolucoesCombo();

        if($(".grid-sistema-solucoes").length > 0){

            gridsolucoes();
        }

        if($("#modal-sistemas").length > 0){

            modal_sistema();
        }

        link_contato();

        $(document).ready(function(){

             if($(".accordion").length > 0){

                 accordions();
             }

         });

    }

};