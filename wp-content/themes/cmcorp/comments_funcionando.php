<?php
/**
 * The template for displaying Comments.
 * The area of the page that contains both current comments
 * and the comment form.
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area form-comentario wow fadeIn">
<?php if ( have_comments() ) : ?>
	<div class="pra-direita">
		<p class="comentarios-qtd">
		<h6 class="quantos"><?php

				printf( _nx( '1 comentário', '%1$s comentários', get_comments_number(), 'comments title', 'zerif-lite' ),

					number_format_i18n( get_comments_number() ), '' );

			?></h6>
		</p>
	</div>
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
       
      
	'author' => '<div class="form-group"><input id="author"   placeholder="Seu nome..." name="author" class="form-control comentarios-info" type="nome" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"/></div>',    
	'email'  => '<div class="form-group"><input id="email"  placeholder="Seu e-mail..." name="email"  class="form-control comentarios-info" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" />'.'</div>',

    'url'    => '' ) ),

    'comment_field' => '<div class="form-group textarea-comments"><textarea placeholder="Seu comentário..."  class=" form-control comentarios-info comentarios-commenter-box" type="mensagem" name="comment" aria-required="true"></textarea>' . '</div>',

    'comment_notes_after' =>  '<div class="comentarios-chars">
								3000 Caracteres restantes...
							</div>',
    'submit_button' => '<button type="submit" class="pra-direita comentarios-button-submit pull-right">Enviar Comentário</button>'

);

comment_form($comment_args); ?>

	<?php /*$comment_args = array( 'title_reply'=>'

 	<p class="comentarios-ttl">
							Comentários
						</p>
                        <p class="comentarios-ilegal">
							Os comentários são de responsabilidade exclusiva de seus autores e não representam a opinião deste site. Se achar algo que viole os termos de uso, denuncie. Leia as perguntas mais frequentes para saber o que é impróprio ou ilegal.
						</p>

                        <form method="post">',


		'fields' => apply_filters( 'comment_form_default_fields', array(
			'comment_notes_before' => '',

			'url'    => '' ) ),

		'comment_field' => '<div class="form-group"><textarea placeholder="Sua Resposta..."  class=" form-control comentarios-info comentarios-commenter-box" type="mensagem" name="comment" aria-required="true"></textarea>' . '</div>',
		'<div class="comentarios-chars">
								3000 Caracteres restantes...
							</div>',
		'comment_notes_after' => '',
		'submit_button' => '<button type="submit" class="pra-direita comentarios-button-submit pull-right">Responder Comentário</button>'

	);

	comment_form($comment_args); */?>


	<?php if ( have_comments() ) : ?>
		
		

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>

		<nav id="comment-nav-above" class="comment-navigation" role="navigation">

			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'zerif-lite' ); ?></h2>

			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'zerif-lite' ) ); ?></div>

			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'zerif-lite' ) ); ?></div>

		</nav><!-- #comment-nav-above -->

		<?php endif; // check for comment navigation ?>

		<div class="comentarios">

			<?php
			 wp_list_comments( 
				array(
		    'callback' => 'way_comments',
		     'end-callback' => 'endway_comments',
		    'style'      => 'div',
     	    'short_ping' => true,
		   ) 
				);

		   ?>
		</div><!--  class="comentarios"> -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>

		<nav id="comment-nav-below" class="comment-navigation" role="navigation">

			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'zerif-lite' ); ?></h2>

			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'zerif-lite' ) ); ?></div>

			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'zerif-lite' ) ); ?></div>

		</nav><!-- #comment-nav-below -->

		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'zerif-lite' ); ?></p></div>

	<?php endif; ?>

</div>

</div><!-- #comments -->