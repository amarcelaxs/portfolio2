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

				<div class="col-md-3 no-padding">
					<div class="social">
						<h3>Redes Sociais</h3>
						<span>Conecte-se com a CM nas redes sociais.</span>

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
							<li class="facebook"><a href="#"></a></li>
							<li class="linkedin"><a href="#"></a></li>
							<li class="vimeo"><a href="#"></a></li>
							<li class="youtube"><a href="#"></a></li>
						</ul>

					</div>
				</div>
				<div class="col-md-3 no-padding">
					<div class="newsletter">
						<h3>NewsLetter</h3>
						<span>Receba nosso informativo por email.</span>
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
	</div>
	<div class="barra-copy">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span>CMCorp Soluções em Informática Ltda.</span><br />
					<span class="last">© Copyright 2014 . Todos os direitos reservados . Política de privacidade</span>
					<div class="gotop">
						<a href="#" id="subir"  ><i>&#121;</i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

</footer>


<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/scrollReveal/scrollReveal.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/jquery.transit-master/jquery.transit.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/Swiper/dist/js/swiper.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/skrollr/src/skrollr.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/mask-plugin-jquery/mask-jquery.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/validate/dist/jquery.validate.min.js"></script>



<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/all.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/home.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/contato.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/newsletter.js"></script>
<!--Importação do arquivo com todas as instruções (Funções e Eventos) da página.-->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/noticias.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/noticia-aberta.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/empresa.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/solucoesprev.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/trabalheconosco.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/jquery.transit-master/jquery.transit.js"></script>


<script type="text/javascript">
	all.init();
	home.init();
    solucoesprev.init();
	noticias.init();
	skrollr.init({forceHeight:false});
	
	//listaemail.init();
    noticia_aberta.init();
    contato.init();
    
    empresa.init();
	trabalheconosco.init();


</script>

</body>
</html>
