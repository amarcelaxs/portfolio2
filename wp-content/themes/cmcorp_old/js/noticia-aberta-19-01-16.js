var noticia_aberta = new function noticia_aberta()
{
	var swiperFn = function swiperFn()
	{
		function swiperSlide()
		{
			var swiper = new Swiper (
				'.sidebar .swiper-container',
				{
					pagination: '.swiper-pagination',
					slidesPerView: 1,
					paginationClickable: true,
					paginationHide: false,
					spaceBetween: 30
				}
			);
		}
        
		swiperSlide();
	}
	this.init = function init()
	{
		if($(".sidebar .swiper-container").length > 0)
		{
			//swiperFn();
		}
	}
};