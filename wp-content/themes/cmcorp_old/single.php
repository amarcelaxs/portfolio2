<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
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
                    <a href="#">
                        Home
                    </a>
                </li>
                 <li>
                    <a href="#">
                        Notícia
                    </a>
                </li>
                <li class="active">
                    <?php
                    // if there is a parent, display the link
                    $parent_title = get_the_title();
                    if ( $parent_title != the_title( ' ', ' ', false ) ) {
                        /*echo '<a href="' . get_permalink( $post->post_parent ) . '>' . $parent_title . '</a> » ';*/ }
                    ?>
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                        <?php the_title(); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<div class="ttl">
			<div class="data-cat">                
                <?php
                $categoria_atual = count(get_the_category(get_the_ID())) > 0 ? get_the_category(get_the_ID())[0]->name : "Sem categoria";
                $data = the_time('j \d\e F \d\e Y');
                echo $data." | ".$categoria_atual;                            
                 ?>
				
			</div>
			<div class="ttl-not">
				<?php $titulo_atual = the_title();
                echo $titulo_atual;?> 
			</div>
		</div>
<div class="bgcolor not">
			<div class="container">
				<div class="row cont-not">
					<div class="col-lg-12 no-padding">                        
                        <?php
                         $image = get_field_object('grande')["value"]["url"];                       
                         echo  '<img src="'.$image.'" class="img-responsive img-not">';
                         
                         $conteudo = get_post_field('post_content',get_the_content()); 
                          /*get_template_part( 'content', get_post_format() );*/
                                         
                         echo $conteudo;  
                         ?>                                                 
						
						<div class="dstq-cont">
							Lorem Ipsum vem das seções 1.10.32 e 1.10.33 do "de Finibus Bonorum et Malorum" (Os Extremos do Bem e do Mal), de Cícero, escrito em 45 AC.
						</div>
					
					</div>
                    </div>
				</div>
			</div>
		</div>
        <div class="comentarios-nr">
			<div class="container comentarios">
				<div class="row">
<?php if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;?>
                    <div class="col-lg-offset-2 col-lg-3 no-padding">
                        <div class="sidebar">
                            <p class="nr-ttl">
                                Notícias Relacionadas
                            </p>
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php Mini_Swiper(); ?>
                                </div>
                                <div class="swiper-pagination paginator-mini swiper-pagination-clickable"></div>
                            </div>
                        </div>
					</div>
                </div>
			</div>
		</div>
                        
                         
		
		<?php		// Start the loop.
        
// 		while ( have_posts() ) : the_post();
//         
// 
// 			/*
// 			 * Include the post format-specific template for the content. If you want to
// 			 * use this in a child theme, then include a file called called content-___.php
// 			 * (where ___ is the post format) and that will be used instead.
// 			 */
// 			get_template_part( 'content', get_post_format() );
// 
// 			// If comments are open or we have at least one comment, load up the comment template.
// 			if ( comments_open() || get_comments_number() ) :
// 				comments_template();
// 			endif;
// 
// 			// Previous/next post navigation.
// 			the_post_navigation( array(
// 				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
// 					'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
// 					'<span class="post-title">%title</span>',
// 				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
// 					'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
// 					'<span class="post-title">%title</span>',
// 			) );
// 
// 		// End the loop.
// 		endwhile;
		?>
        		

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
