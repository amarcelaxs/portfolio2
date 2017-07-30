<?php
/**
 * Template Name: NoticiaAberta
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();
?>

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

<!-- End Breadcrumb -->
<?php get_footer(); ?>