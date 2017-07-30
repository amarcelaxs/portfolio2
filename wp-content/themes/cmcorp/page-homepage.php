<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
 /*define("CLASSEBODY", "phome");*/
 
get_header(); ?>



<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- Banner -->
        <div id="bc">
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
            <!--div class="container">
                <div class="row">
                    <div class="col-md-6 text-info">
                        Soluções que incorporam
                        o negócio do cliente.
                        <p class="col-md-8">
                            Nossas soluções de gestão corporativa adaptam-se
                            ao negócio de forma abrangente e modular.
                        </p>
                    </div>
                </div>
            </div-->
        </div>
        <!-- End Banner -->
        <!-- Boxs Segmentos -->

        <section class="box-segmentos">
            <div class="container-fluid">
                <!-- <div class="row">
                    <div class="col-md-12 ttl-seg">
                        Conheça abaixo a solução ideal para o seu segmento.
                    </div>
                </div> -->
                <div class="up row">

                        <?php box_segmentos()?>
                       <!-- <figure class="effect-juridico">
                            <div class="front-box">
                            </div>
                            <div class="boxes-index">
                                <img src="<?php /*echo of_get_option( 'background1', 'no entry' ); */?>">
                            </div>
                            <figcaption>
                                <?php
/*                                $id_do_post = of_get_option('box-segmento1'); // este é o ID do post
                                $o_id = get_post($id_do_post);
                                */?>
                                <?php /*echo  _e( $o_id  ->post_content,'cmcorp');*/?>
                            </figcaption>
                        </figure>-->
                    </div>

            </div>
        </section>
        <!-- End Boxs Segmentos -->
        <!-- Soluções-->
        <section class="trecho-news">
            <div class="container">
                <div class="row" id="content-solucoes-posts">

                </div>
            </div>
        </section>
        <!-- End Soluções-->
        <!--Solucoes segmentos-->
        <section class="solucoes-segmentos">
            <div class="bg-noticia-corpo">
                <div class="container">
                    <div class="row">
                        <div class="swiper-container">
                            <div class="cards swiper-wrapper">
                                <?php Swiper();     ?>
                            </div>
                      <!--  <div class="input-place"><input type="range" name="rangeCards" id="rangeCards" min="1" max="1" step="1" value="1"></div>-->
                            <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="secVideo">
            <div class="barra-video">
                <video class="video js-background_video" muted="" loop="" autoplay="true">

                    <source src="http://player.vimeo.com/external/98945042.hd.mp4?s=cb896eff96021c3cf57219981c77aef1" type="video/mp4">
                </video>
                <div class="pattern"></div>
                <div class="container" data-scroll-reveal="enter bottom over 1s after 0.5s">
                    <h4>Assista ao nosso video</h4>
                    <h4>corporativo</h4>
                    <a href="javascript:void(0)" class="open"><i>&#87;</i></a>                                       
                    
                    <p>
                        Conheça um pouco da nossa história, nossos valores e<br />
                        ideais que buscamos durante toda a trajetória da empresa.
                    </p>
                </div>

                <div class="vimeo">
                    <iframe id="video_iframe" src="//player.vimeo.com/video/98945042?api=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen="true"></iframe>
                </div>                
                <a href="javascript:void(0)" class="close"><i>&#249;</i></a>
            </div>

        </section>
        <!--End Solucoes segmentos-->
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>