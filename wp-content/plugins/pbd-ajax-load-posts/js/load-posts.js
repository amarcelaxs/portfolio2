

jQuery(document).ready(function($) {

	// The number of the next page to load (/page/x/).
	var numPosts = parseInt(pbd_alp.num_posts);
	
	// The maximum number of pages the current query can return.
	var html = pbd_alp.html;

	var contador = parseInt(pbd_alp.contador);


	/**
	 * Replace the traditional navigation with our own,
	 * but only if there is at least one page of new posts to load.
	 */
		// Insert the "More Posts" link.
	$('#content-solucoes-posts').append(html);



	$('#content-post-1').show();
	$('#content-post-1 .date').fadeIn();
	$('#content-post-1 .solucoes-post').fadeIn();
	$('#content-post-1 .seta').fadeIn();

	/*$('#content-post-1 .solucoes-data-post').slideUp( 3 ).delay( 80 ).fadeIn(2000);*/

	setInterval(function(){
		contador = contador;
		trocaPost(contador);
	}, 10000);
	
	/**
	 * Load new posts when the link is clicked.
	 */
	$('#pbd-alp-load-posts a').click(function() {

		alert(pageNum);
		alert(max);
	
		// Are there more posts to load?
		if(pageNum <= max) {
		
			// Show that we're working.
			$(this).text('Loading posts...');
			
			$('.pbd-alp-placeholder-'+ pageNum).load(nextLink + ' .post',
				function() {
					// Update page number and nextLink.
					pageNum++;
					nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/'+ pageNum);
					
					// Add a new placeholder, for when user clicks again.
					$('#pbd-alp-load-posts')
						.before('<div class="pbd-alp-placeholder-'+ pageNum +'"></div>')
					
					// Update the button message.
					if(pageNum <= max) {
						$('#pbd-alp-load-posts a').text('Load More Posts');
					} else {
						$('#pbd-alp-load-posts a').text('No more posts to load.');
					}
				}
			);
		} else {
			$('#pbd-alp-load-posts a').append('.');
		}	
		
		return false;
	});

	function trocaPost() {
		if (contador < numPosts) {
			contador += 1;
		}
		else {
			contador = 1;
		}

		proximaDiv = '#content-post-' + contador;
		proximaDivContent = '#content-post-' + contador + ' .solucoes-post';
		//proximaDivData = '#content-post-' + contador + ' .solucoes-data-post';
		//proximaDivSeta = '#content-post-' + contador + ' .solucoes-seta-post';
		div_atual = '#content-post-' + (contador - 1);
		div_atualContent = '#content-post-' + (contador - 1) + ' .solucoes-seta-post';
		//div_atualData = '#content-post-' + (contador - 1) + ' .solucoes-data-post';
		//div_atualSeta = '#content-post-' + (contador - 1) + ' .solucoes-seta-post';
		if (contador == 1)
		{
			div_atual = '#content-post-' + numPosts;
			div_atualContent = '#content-post-' + numPosts + ' .solucoes-seta-post';
			//div_atualData = '#content-post-' + numPosts + ' .solucoes-data-post';
			//div_atualSeta =  '#content-post-' + numPosts + ' .solucoes-seta-post';
		}

		$(div_atual + " .date").fadeOut();
		$(div_atual + " .solucoes-post").fadeOut();
		$(div_atual + " .seta").fadeOut();
		$(div_atual).hide();
		$(proximaDiv).show();
		$(proximaDiv + " .date").fadeIn();
		$(proximaDiv + " .solucoes-post").fadeIn();
		$(proximaDiv + " .seta").fadeIn();






		/*$(div_atualData).hide(function () {
            $(proximaDivData).show();
        });*/


			/*$(div_atualSeta).hide(function () {
				$(proximaDivSeta).show();
			});*/




	}


});