<?php

/**

 * Template Name: segmentos

 * @package WordPress

 * @subpackage Twenty_Fourteen

 * @since Twenty Fourteen 1.0

 */



get_header();

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.js"></script>

<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

        <!-- Breadcrumb -->

        <div id="bc">

            <div class="container">

                <div class="row">

					<span>

						<p class="fl">

                            Você esta em:

                        </p>

					</span>

                    <ul class="breadcrumb">

                        <li>

                                 <?php exibir_breadcrumbs($home_page) ?>;

                        </li>

                        <li class="active">

                            <?php

                            // if there is a parent, display the link

                            $parent_title = get_the_title( $post->post_parent );

                            if ( $parent_title != the_title( ' ', ' ', false ) ) {

                                /*    echo '<a href="' . get_permalink( $post->post_parent ) . '>' . $parent_title . '</a> � ';*/ }

                            ?>

                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">

                                <?php the_title(); ?></a>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

        <!-- End Breadcrumb -->
          <?php $idsegmento = get_the_ID();?>         
    <!--section id='banner-top-prev' style="background-image:url('<//?php conteudo_page($idsegmento);?>')">    
    <div class="container-fluid">
    <div class="plx"  data-top-top="margin-top: 0%;" data-center-top="margin-top: -9%;">
    <div class="row"-->
        <section id="banner-top-prev">
                  <div class="container-fluid">
                      <div class="plx"  data-center-top="margin-top: 5%;" data-center-bottom="margin-top: -10%;"  style="background-image:url('<?php conteudo_page($idsegmento);?>') ">
                        <div class="row">
                            <div class="col-md-6 col-md-push-3">
                                <h2 data-top-top="opacity: 0; margin-top: 30%;" data-center-bottom="opacity: 1; margin-top: 5%;">  <?php the_title(); ?></h2>
                            </div>
                        </div>
                       </div>
                   </div>
               </section>
        <?php
      
        // Start the loop.
           
        while ( have_posts() ) : the_post();
            // Include the page content template.
            get_template_part( 'content', 'page' );
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            // End the loop.
        endwhile;
        ?>
        <!--/div>
        </div-->


        <!--Sistemas-->

        <section id="sistemas">

            <div class="container">

                <h3>Conheça os Sistemas da Solução</h3>

                <hr class="linha">

                <div class="row">

                    <?php

                        //chamando fun��o de sistema de solu��es
                       
                       segmentos($idsegmento);                       
					   quadradinhos(135);      

                    ?>

                </div>

            </div>

        </section>

       <!--End Sistemas-->

        <!--Contacte-nos-->

        <section id="contacte">

            <div class="container">

                <div class="row">

                    <h5>Fale agora com um de nossos consultores!</h5>
                     
                    <a href="/site-novo/contato" class=" action-bt">ENTRE EM CONTATO</a>

                </div>

            </div>

        </section>

        <!--End Contacte-nos-->
    </main>

	<!--site-main -->

    </div>



<?php get_footer(); ?>