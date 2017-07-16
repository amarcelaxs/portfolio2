<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */


?>

		</div><!-- #content -->

	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>


<footer>
<section id="footer"  class="borda">				
		<div class="container-full" >
			<div class="row">
				<div class=" col-md-12 col-sm-12 social ">		
				</div>		
				
			</div>
		</div>
	</section>
</footer>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/bootstrap.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/home.js"></script>

<!--script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.js"></script-->
</body>
</html>
