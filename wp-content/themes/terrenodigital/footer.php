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
<section id="footer">
     <div class="container-full footer">
        <div class="container">
            <div class="col-xs-6 col-lg-6 col-sm-6">
                <div class="col-lg-12 boxfooter1">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bold2.png">
                    <h1 class="boldt">A Empresa</h1>
                        <p>A Bold Finance é um grupo empresarial
                            focado no desenvolvimento de soluções
                            financeiras estruturadas e inovadoras 
                            que beneficiem investidores privados 
                            e titulares de direitos creditórios
                            de diversas naturezas.</p>
                    <!--div class="msociais">
                        <a href="#" ><span class="instagram"></span></a>
                        <a href="#" ><span class="linkedin"></span></a>                        
                        <a href="#" ><span class="facebook"></span></a>
                    </div-->
                </div>
                <div class="boxfooter1 col-lg-12">
                    <h1>Contato</h1>
                    <span>(61)3033-8403</span><br>
                    <span>(61)3033-8403</span>
                </div>
                <div class="boxfooter1 col-lg-12">
                    <h1>Endereço</h1>
                    <span>Rua Bernardo Guimarãos nº 245,sl.401</span><br>
                    <span>Bairros Funcionários</span><br>
                    <span>Belo Horizonte/MG, CEP 30.140-180</span><br>
                </div>
            </div>
            <div class="col-xs-6 col-lg-6 col-sm-6">
                <form class="contato">
                    <div class="form-group ">                        
                        <input type="text" class="form-control" id="exampleInputNome1" aria-describedby="emailHelp" placeholder="Nome">                  
                    </div> 
                    <div class="form-group configinput col-xs-6 pull-left">                      
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">                  
                    </div>       
                     <div class="form-group configinput  col-xs-6 pull-right">                      
                        <input type="text" class=" form-control" id="exampleInputTel1" aria-describedby="emailHelp" placeholder="Telefone">                  
                    </div>            
                    <div class="form-group">                        
                        <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Mensagem"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                
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
