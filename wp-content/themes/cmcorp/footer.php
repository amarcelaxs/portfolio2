<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
				/**
				 * Fires before the Twenty Fifteen footer text for footer customization.
				 *
				 * @since Twenty Fifteen 1.0
				 */
				do_action( 'twentyfifteen_credits' );
			?>
			<!--a href="<//?php echo esc_url( __( 'https://wordpress.org/', 'twentyfifteen' ) ); ?>"><//?php printf( __( 'Proudly powered by %s', 'twentyfifteen' ), 'WordPress' ); ?></a-->
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>


<!--footer-->

<footer>
	<div class="barra-links">
		<div class="container">
			<div class="row">
				<?php render_footer_menu()?>

				<div class="col-md-3 col-xs-4 social">
					<h3>Redes Sociais</h3>
					<span><?php 
					echo $conectarcm = __("[:pt]Conecte-se com a CM nas redes sociais.[:][:en]Log in with CM in social network[:]");?></span>
					<div class="facebook">
						<div id="fb-root"></div>
						<script>
							(function (d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0];
								if (d.getElementById(id)) return;
								js = d.createElement(s); js.id = id;
								js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=435755593185690&version=v2.0";
								fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));
						</script>
						<div class="fb-like"
							 data-href="https://developers.facebook.com/docs/plugins/"
							 data-layout="button_count"
							 data-action="like"
							 data-show-faces="false"
							 data-share="true"
							 data-colorscheme="dark"
							 colorscheme="dark">
						</div>
					</div>
					<ul>
						    <li ><a href="<?php echo of_get_option( 'facebook',  'no entry' );?>"  target="_blank"><img src="<?php echo of_get_option( 'icon_facebook',  'no entry' ); ?>"></a></li>
							<li ><a href="<?php echo of_get_option( 'linkedin',  'no entry'); ?>" target="_blank"><img src="<?php echo of_get_option( 'icon_linkedin', 'no entry' ); ?>"></a></li>
							<li ><a href="<?php echo of_get_option( 'vimeo', 'no entry'); ?>" target="_blank"><img src="<?php echo of_get_option( 'icon_vimeo',  'no entry' ); ?>"></a></li>
							<li ><a href="<?php echo of_get_option( 'youtube',  'no entry' ); ?>" target="_blank"><img src="<?php echo of_get_option( 'icon_youtube',  'no entry' ); ?>"></a></li>
					</ul>
					<form class="search-form" role="search" method="get" action="/">
					<div class="form-group">
						<input type="search" class="search-field  ui-autocomplete-input input-search " placeholder="Buscar..." value="<?php 
		echo get_search_query() ?>" name="s" title="Buscar..." autocomplete="on">
					</div>
					<button type="submit" class="btn btn-default search-submit screen-reader-text" value="Pesquisar">
						<span class="glyphicon glyphicon-search" style="font-family: Glyphicons Halflings;font-size:17px;">
						</span>
					</button>
				</form>
				</div>
				<div class="col-md-3 col-xs-4 newsletter">
					<h3>NewsLetter</h3>
					<span><?php 
					echo $newslettercm = __("[:pt]Receba nosso informativo por email..[:][:en]receive our news for email.[:]");?>
					</span>
					<?php echo do_shortcode( '[contact-form-7 id="398" title="NewsLetter"]' ); ?>
					<!--form role="form">
						<div class="form-group">
							<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o seu nome">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite o seu email">
						</div>
						<div class="form-group">
							<a href="#" target="_blank"><span>Remova meu cadatro</span></a>
							<button type="submit" class="btn btn-default">Cadastrar</button>
						</div>
					</form-->
				</div>
			</div>
		</div>
	</div>
	<div class="barra-copy">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>CMCorp Soluções em Informática Ltda.</p>
					<p class="last">© Copyright <?php echo date('Y')?>. Todos os direitos reservados. Política de privacidade</p>
					<div class="gotop">
						<a href="#" id="subir"  ><i>&#121;</i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

</footer> 
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/jquery.transit-master/jquery.transit.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/datatables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/vimeo-js/froogaloop2.min.js"></script>
<?php
	//$idPage = get_the_ID();
	//$idPage =  get_the_title( $post->post_parent );
	$idPage = get_the_title();
	// echo $idPage;
	$name_post =single_post_title('', false);
	// echo $name_post;
	$link_padrao = esc_url(get_template_directory_uri());
	switch ($idPage) {
		case 'pagina principal':
			echo '<script src="'.$link_padrao.'/vendor/Swiper/dist/js/swiper.min.js"></script>';
			echo '<script src="'.$link_padrao.'/js/home.js"></script>';
			break;
		case 'Empresa':
			echo '<script src="'.$link_padrao.'/vendor/skrollr/src/skrollr.js"></script>';
			echo '<script src="'.$link_padrao.'/js/empresa.js"></script>';
			break;
		case 'Noticias':
			echo '<script src="'.$link_padrao.'/vendor/skrollr/src/skrollr.js"></script>';
			echo '<script src="'.$link_padrao.'/js/noticias.js"></script>';
			break;
		case 'Contato':
			echo '<script src="'.$link_padrao.'/vendor/mask-plugin-jquery/mask-jquery.js"></script>';
			echo '<script src="'.$link_padrao.'/vendor/validate/dist/jquery.validate.js"></script>';
			break;
		case $name_post:
			if ($name_post == 'Escritório de Advocacia' ||
				$name_post == 'Previdência Privada' ||
				$name_post == 'Hotéis e  Restaurantes' ||
				$name_post == 'Indústria' ||
				$name_post == 'Comércio' ||
				$name_post == 'Serviços') {
				echo '<script src="'.$link_padrao.'/vendor/skrollr/src/skrollr.js"></script>';
				echo '<script src="'.$link_padrao.'/vendor/hammer/hammer.min.js"></script>';
				echo '<script src="'.$link_padrao.'/vendor/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>';
				echo '<script src="'.$link_padrao.'/js/solucoesprev.js"></script>';
				break;
			}
			elseif ($name_post == 'Soluções') {
				echo '<script src="'.$link_padrao.'/vendor/scrollReveal/scrollReveal.js"></script>';
				echo '<script src="'.$link_padrao.'/js/solucoes.js"></script>';
				break;
			}
			elseif ($name_post == 'Contato') {
			}
			else {
				echo '<script src="'.$link_padrao.'/vendor/Swiper/dist/js/swiper.min.js"></script>';
				echo '<script src="'.$link_padrao.'/js/noticia-aberta.js"></script>';
				echo '<script>  var str = document.getElementById("demo").innerHTML;</script>';
				break;
			}
	}
?>
<script type="text/javascript">
	all.init();
	//listaemail.init();
	<?php
		//if(is_home() && $post==$posts[0] && !is_paged()){
		$link_padrao = esc_url(get_template_directory_uri());
		//if(is_home() && $post==$posts[0] && !is_paged()){
		switch ($idPage) {
			case 'pagina principal':
				echo 'home.init();';
				break;
			case 'Empresa':
				echo 'if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1280) {} else {skrollr.init({forceHeight:false});}';
				echo 'empresa.init();';
				break;
			case 'Noticias':
				echo 'if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1280) {} else {skrollr.init({forceHeight:false});}';
				echo 'noticias.init();';
				break;
			case $name_post:
				if ($name_post == 'Escritório de Advocacia' ||
					$name_post == 'Previdência Privada' ||
					$name_post == 'Hotéis e  Restaurantes' ||
					$name_post == 'Indústria' ||
					$name_post == 'Comércio' ||
					$name_post == 'Serviços') {
					echo 'if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1280) {} else {skrollr.init({forceHeight:false});}';
					echo 'solucoesprev.init();';
					break;
				}
				elseif ($name_post == 'Soluções') {
					echo 'solucoes.init();';
					break;
				}
				elseif ($name_post == 'Contato') {
					break;
				}
				else {
					echo 'noticia_aberta.init();';
					break;
				}
		}
	?>
</script>
</body>
</html>