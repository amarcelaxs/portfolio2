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
      <article>
        <div class="container">                 
            <div class="col-xs-3"><a href="https://www.linkedin.com/in/anamarcelaxs" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></div>
            <div class="col-xs-3"><a href="Curriculo-AnaMarcela.pdf" title="Curriculo" target="_blank"><i class="fa fa-file-pdf-o"></i></a></div>
            <div class="col-xs-3"><a href="skype:amarcelaxs" title="Skype"><i class="fa fa-skype fa-4" ></i></a></div>
            <div class="col-xs-3"><i class="fa fa-envelope lightbox" ></i></div>
        </div>

        <!--div class="box">
            <div class="close">x</div><br>
            <form id="registerForm" role="form" class="form-horizontal"  action="enviar.php" method="post">

                <label class="col-sm-2 control-label" for="nome">Nome:</label>
                <div class="col-xs-9">
                    <input id="nome" name="nome" type="text" placeholder="" class="form-control" required>
                </div>


                <label class="col-sm-2 control-label" for="email">Email:</label>
                <div class="col-xs-9">
                    <input id="email" name="email" type="text" placeholder="" class="form-control" required>
                </div>


                <label class="col-sm-2 control-label" class="form-control"  for="mensagem">Mensagem:</label>
                <div class="col-xs-8">
                           <textarea rows="4" id="msg" name="msg"  class="form-control" cols="50" style="width:295px;" required>
              </textarea>
                </div>
                <div class="col-xs-12">
                        <button id="submit" name="submit" class="btn col-xs-3 col-xs-offset-2">Submit</button>
                        <button id="submit" name="submit" class="btn  col-xs-3 col-xs-offset-3 btn-cancel" type="reset" >Cancel</button>

                </div>
            </form>
        </div>
        <div class="background"></div-->
            
      </div>
      </article>
    </section>

    </div> <!-- /container -->


 

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
