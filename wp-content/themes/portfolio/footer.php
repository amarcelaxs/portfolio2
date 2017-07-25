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
<section id="contact" class="bgParallax" data-speed="22">
    <div class="container">
        <div class="row">
            <article>
                
                <div class="col-lg-3 col-sm-6">              
                    <a href="https://www.linkedin.com/in/anamarcelaxs" title="Linkedin" target="_blank"><span class="linkedin"><span></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="skype:amarcelaxs" title="Linkedin" target="_blank"><span class="skype"><span></a>
                </div>  
                <div class="col-lg-3 col-sm-6">  
                      <a href="https://www.github.com/amarcelaxs" title="Linkedin" target="_blank"><span class="cat"><span></a>
                </div>      
                <div class="col-lg-3 col-sm-6">
                    <a href="Curriculo-AnaMarcela.pdf" title="Curriculo" target="_blank"><span class="pdf"></span></a>              
                </div>                
            </article>
        </div>
        <div class="row">
            <div class="  col-xs-12 col-lg-8 col-sm-12 col-lg-offset-2">
               
                   <!--form role="form">
                        <div class="form-group">
                            <label>Nome:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o seu nome">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite o seu email">
                        </div>                         
                        <div class="form-group">
                            <label>Mensagem:</label>
                           <textarea rows="4" id="msg" name="msg"  class="form-control" cols="50" style="width:260px;" required></textarea>
                        </div>
                        <div class="action form-group">                            
                            <button type="submit" class="btn btn-default">Cadastrar</button>
                            <a href="#" target="_blank">Remova meu cadatro</a>
                        </div>
                    </form-->            
                    <?php echo do_shortcode( '[contact-form-7 id="8" title="Contato"]' ); ?>  
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
