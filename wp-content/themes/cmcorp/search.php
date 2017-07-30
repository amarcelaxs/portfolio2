<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header(); ?>
  <div id="bc">
          <div class="container">
            <div class="row col-xs-12">
                    <span>
                        Você esta em:
                    </span>
                <ul class="breadcrumb">
                    <li>
                        <?php exibir_breadcrumbs($home_page) ?>;
                    </li>
                    <li class="active">
                       
                          <a href="#" rel="bookmark" >Resultado de Pesquisa</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
      <div class="container-fluid banner">
        <div class="breadcrumb-bg-img" data-top-top="margin-top: 0%;" data-center-top="margin-top: -9%;">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="banner-ttl" data-top-top="opacity: 0; margin-top: 6%;" data-center-top="opacity: 1; margin-top: 0%;">
                       Resultado de Pesquisa
                        <br>
                    </h1>
                </div>
            </div>
        </div>
    </div>

	<section id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">
			
		<?php if ( have_posts() ) : ?>

			<header class=" result-search page-header">
				<!--h1 class="page-title"><//?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1-->
                <!--h2 class="pagetitle">Pesquisa por : <//?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = esc_html($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); echo $key; _e('</span>'); _e(' — '); echo $count . ' '; _e('resultados'); wp_reset_query(); ?></h2-->
                
           <div class="pagetitle"><h2>Foram encontrados   <?php /* Search Count */ $allsearch = new WP_Query("s=$s&showposts=-1"); $key = esc_html($s, 1);  _e('<span class="count-itens">');$count = $allsearch->post_count; _e(''); echo $count . ' '; _e('resultados'); wp_reset_query();_e('</span>'); ?> para a busca por <?php _e('<br><span class="search-terms">'); echo $key; _e('</span>');?> </h2></div>     
			</header><!-- .page-header -->
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>
				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
            $html ="<span class='teste-title'>".the_title().'</span><br>';
            echo $html;
            $a=get_page_link();
            echo '<a class="link-search" href="'.get_post_permalink().'">'.get_page_link().'</a>';          
            get_template_part( 'content', 'search' );            
            echo '<hr></hr>';
                
			// End the loop.
			endwhile;

			// Previous/next page navigation.
			/*the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'cmcorp' ),
				'next_text'          => __( 'Next page', 'cmcorp' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cmcorp' ) . ' </span>',
			) );*/
          the_posts_pagination( array(
                'mid_size' => 2, 
                'prev_text' => __( '<', '' ),                   
                'next_text' => __( '>', '' ),
            ) );
            
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );
		endif;
       
		?>
		</main><!-- .site-main -->
	</section><!-- .content-area -->
<?php get_footer(); ?>
