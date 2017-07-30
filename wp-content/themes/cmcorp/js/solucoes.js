var solucoes = new function solucoes()
{
	var init_scrollReveal = function init_scrollReveal()
	{
		window.scrollReveal = new scrollReveal();
	}
	var init_vimeo = function init_vimeo()
	{
		$('.secVideoSolucoes .barra-video .container a').on('click', function()
		{
			$('.secVideoSolucoes .barra-video .vimeo').css('display', 'block');
			$('.secVideoSolucoes .barra-video .vimeo a').css('display', 'block');
		});
		$('.secVideoSolucoes .barra-video .vimeo a').on('click', function()
		{
			$('.secVideoSolucoes .barra-video .vimeo').css('display', 'none');
			$('.secVideoSolucoes .barra-video .vimeo a').css('display', 'none');
		});
	}
	this.init = function init()
	{
		$(document).ready(function()
		{
			init_scrollReveal();
			init_vimeo();
		});
	}
}