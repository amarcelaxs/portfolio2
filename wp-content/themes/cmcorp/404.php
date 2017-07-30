<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
 <div class="container-fluid banner">
        <div class="breadcrumb-bg-img" data-top-top="margin-top: 0%;" data-center-top="margin-top: -9%;">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="banner-ttl" data-top-top="opacity: 0; margin-top: 6%;" data-center-top="opacity: 1; margin-top: 0%;">
                      Página não encontrada
                        <br>
                    </h1>
                </div>
            </div>
        </div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentyfifteen' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<!--p><//?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfifteen' ); ?></p-->

					<!--?php get_search_form(); ?-->
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
