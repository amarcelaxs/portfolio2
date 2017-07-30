<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'twentyfifteen' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>
<?php endif; // check for comment navigation ?>
<div class="col-lg-12 no-padding">
 <?php $comment_args = array( 'title_reply'=>'
 
 	<p class="comentarios-ttl">
							Comentários
						</p>
                        <p class="comentarios-ilegal">
							Os comentários são de responsabilidade exclusiva de seus autores e não representam a opinião deste site. Se achar algo que viole os termos de uso, denuncie. Leia as perguntas mais frequentes para saber o que é impróprio ou ilegal.
						</p>                       
                        
                        <form method="post">',
					

'fields' => apply_filters( 'comment_form_default_fields', array(
       'comment_notes_before' => '',
       
      
	'author' => '<div class="form-group"><input id="author"   placeholder="Seu nome..." name="author" class="form-control comentarios-info"" type="nome" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"/></div>',    
	'email'  => '<div class="form-group"><input id="email"  placeholder="Seu e-mail..." name="email"  class="form-control comentarios-info" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" />'.'</div>',

    'url'    => '' ) ),

    'comment_field' => '<div class="form-group textarea-comments"><textarea placeholder="Seu comentário..."  class=" form-control comentarios-info comentarios-commenter-box" type="mensagem" name="comment" aria-required="true"></textarea>' . '</div>',

    'comment_notes_after' =>  '<div class="comentarios-chars">
								3000 Caracteres restantes...
							</div>',
    'submit_button' => '<button type="submit" class="pra-direita comentarios-button-submit pull-right">Enviar Comentário</button>'

);
comment_form($comment_args); ?>

	

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfifteen' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- .comments-area -->
