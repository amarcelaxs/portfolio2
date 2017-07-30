<?php
/**
 * Template Name: Padrao-Segmentos
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
                            Você está em:
                        </p>
					</span>
                    <ul class="breadcrumb">
                        <li>
                            <a href="/site-novo">
                                Home
                            </a>
                        </li>
                        <li class="active">
                            <?php
                            // if there is a parent, display the link
                            $parent_title = get_the_title( $post->post_parent );
                            if ( $parent_title != the_title( ' ', ' ', false ) ) {
                                /*    echo '<a href="' . get_permalink( $post->post_parent ) . '>' . $parent_title . '</a> » ';*/ }
                            ?>
                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                <?php the_title(); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb -->      
        <?while ( have_posts() ) : the_post();

            // Include the page content template.
            get_template_part( 'content', 'page' );


            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            // End the loop.
        endwhile;
        ?>
        <!--Sistemas-->
        <section id="sistemas">
            <div class="container">
                <h3>Conheça os Sistemas da Solução</h3>
                <hr class="linha">
                <div class="row">
                    <?php
                        //chamando função de sistema de soluções
                        sistema_solucoes(135);
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
                    <a href="/site-novo/contato" target="_blank" class="action-bt">ENTRE EM CONTATO</a>
                </div>
            </div>
        </section>
        <!--End Contacte-nos-->


    </main>
    <!-- site-main -->
    </div>

<?php get_footer(); ?>