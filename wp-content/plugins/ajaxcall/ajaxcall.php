<?php
/*
Plugin Name: Ajax Call
Plugin URI: http://my-awesomeness-emporium.com
Description: a plugin to create awesomeness and spread joy
Version: 1.2
Author: CMCORP
Author URI: http://mrtotallyawesome.com
License: GPL2
*/
function my_load_ajax_content () {

    $pid        = intval($_POST['post_id']);
    $the_query  = new WP_Query(array('p' => $pid));

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $post_id = get_the_ID();
            $image_logo_modal = get_field('image_logo_modal', $post_id);
            $nome_modal = the_title();
            $color_header_modal = the_field('color_header_modal', $post_id);
            $url_vimeo_modal = the_field('url_vimeo_modal', $post_id);
            $url_pdf_modal = the_field('url_pdf_modal', $post_id);
            $url_pps_modal = the_field('url_pps_modal', $post_id);
            $url_video_modal = the_field('url_video_modal', $post_id);
            $content_modal = the_content();

            $html  = '<div class="modal-dialog" role="document">';
            $html .= '<div class="modal-content">';
            $html .= '<div class="modal-header" style="background-color: ' . $color_header_modal . '">';
            $html .= '<span class="titulo-modal col-xs-7">';
            $html .= '<img class="logo" src="' . $image_logo_modal['url'] . '">';
            $html .= '<h1 class="modal-title" id="myModalLabel">' . $nome_modal . '</h1>';
            $html .= '</span>';
            $html .= '<span class="col-xs-5" style="padding-right: 0;">';
            $html .= '<a href="#" type="button" class="btn-close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>';
            $html .= '<a href="#" type="button" class="btn-arrow pull-right" data-dismiss="modal" aria-label="right"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a>';
            $html .= '<a href="#" type="button" class="btn-arrow pull-right" data-dismiss="modal" aria-label="left"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a>';
            $html .= '</span>';
            $html .= '</div>';
            $html .= '<div class="modal-body">';
            $html .= '<div class="container-fluid container-sistemas-solucao">';
            $html .= '<div class="item-sistemas-solucao">';
            $html .= '<div class="col-lg-6 text-center coluna-esquerda">';
            $html .= '<div class="vimeo-small">';
            $html .= '<iframe src="' . $url_vimeo_modal . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen="true" style="width:100%;height:332px;"></iframe>';
            $html .= '</div>';
            $html .= '<div class="col-xs-12 lines">';
            $html .= '<hr>';
            $html .= '<span><a href="' . $url_pdf_modal . '">Baixar lâmina deste sistema | PDF 3.2Mb</a></span>';
            $html .= '<hr>';
            $html .= '<span><a href="' . $url_pps_modal . '">Baixar apresentação | PPS 2.5Mb</a></span>';
            $html .= '<hr>';
            $html .= '<span><a href="' . $url_video_modal . '">Baixar video | MOV 8.7Mb</a></span>';
            $html .= '<hr>';
            $html .= '<a class="action-btn" href="#">AGENDE UMA APRESENTAÇÃO</a>';
            $html .= '<div class="redes-sociais">';
            $html .= '<div class="rede-social-fb"></div>';
            $html .= '<div class="rede-social-tw"></div>';
            $html .= '<div class="rede-social-in"></div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="col-lg-6 text-center coluna-direita">' . $content_modal . '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
    }
    wp_reset_postdata();

    echo '<div id="postdata">'.$html.'</div>';

}

add_action ( 'wp_ajax_nopriv_load-content', 'my_load_ajax_content' );
add_action ( 'wp_ajax_load-content', 'my_load_ajax_content' );


add_action( 'init', 'my_script_enqueuer' );

function my_script_enqueuer() {
    wp_register_script( "solucoesprev", WP_PLUGIN_URL.'/ajaxcall/solucoesprev.js', array('jquery') );
    wp_localize_script( 'solucoesprev', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'solucoesprev' );

}

?>