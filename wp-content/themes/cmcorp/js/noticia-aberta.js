var noticia_aberta = new function noticia_aberta()
{
	var swiperFn = function swiperFn()
	{
		function swiperSlide()
		{
			var ww = 1;
			if ($(window).width() <= 480) {
				ww = 1;
			};
			if ($(window).width() > 480 && $(window).width() <= 640) {
				ww = 2;
			};
			var swiper = new Swiper (
				'.sidebar .swiper-container',
				{
					autoplay: 5000,
					pagination: '.sidebar .swiper-pagination',
					paginationClickable: true,
					paginationHide: false,
					slidesPerView: ww,
					spaceBetween: 30
				}
			);
			$('.comentarios-nr .swiper-slide').hover(
				function () {
					swiper.stopAutoplay();
				},
				function () {
					swiper.startAutoplay();
				}
			);
		}
		swiperSlide();
	}
	this.init = function init()
	{
		if($(".sidebar .swiper-container").length > 0)
		{
			swiperFn();
		}
	}
};