var home = new function home(){

	var swiperFn = function swiperFn()
	{
		function swiperSlide(num)
		{
			var cards = $("div.card-news").length;
			var slide_per_view = num;
			var range = cards - slide_per_view + 1;
			$('#rangeCards').attr('max', range);
			var swiper = new Swiper
			(
				'.solucoes-segmentos .swiper-container',
				{
					pagination: '.solucoes-segmentos .swiper-pagination',
					slidesPerView: slide_per_view,
					paginationClickable: true,
					paginationHide: false,
					spaceBetween: 30,
					autoplay: 3500
				}
			);
			$('#rangeCards').change
			(
				function (e)
				{
					swiper.slideTo(parseInt(e.currentTarget.value) - 1)
				}
			);
			swiper.on
			(
				'slideChangeStart', function (e)
				{
					$("#rangeCards").val(e.activeIndex + 1)
					//console.log(e)
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
	var clickVideo = function clickVideo()
	{
		$('.barra-video a.open').click
		(
			function ()
			{
				$('.barra-video .vimeo').fadeIn();
				$('.barra-video a.close').fadeIn();
				document.querySelector('.barra-video video').pause(); // Pause o video demostrativo
				// Inicia o video institucional
				var f = document.querySelector('.barra-video iframe');
				f.contentWindow.postMessage({ method: "play" }, f.src);
			}
		);
		$('.barra-video a.close').click
		(
			function ()
			{
				$('.barra-video .vimeo').fadeOut();
				$('.barra-video a.close').fadeOut();
				document.querySelector('.barra-video video').play();  // Inicia o video demostrativo
				// Pausa o video institucional
				var f = document.querySelector('.barra-video iframe');
				f.contentWindow.postMessage({ method: "pause" }, f.src);
			}
		);
	}
	
	
	this.init = function init()
	{
		if($(".solucoes-segmentos .swiper-container").length > 0)
		{
			swiperFn();
		}
		clickVideo();
		
	}
};