<?php
/**
 * Plugin Name: PBD AJAX Load Posts
 * Plugin URI: http://www.problogdesign.com/
 * Description: Load the next page of posts with AJAX.
 * Version: 0.1
 * Author: Pro Blog Design
 * Author URI: http://www.problogdesign.com/
 */
 
 /**
  * Initialization. Add our script if needed on this page.
  */
 function pbd_alp_init() {
 	global $wp_query;
 
 	// Add code to index pages.

 		// Queue JS and CSS
 		wp_enqueue_script(
 			'pbd-alp-load-posts',
 			plugin_dir_url( __FILE__ ) . 'js/load-posts.js',
 			array('jquery'),
 			'1.0',
 			true
 		);
 		
 		wp_enqueue_style(
 			'pbd-alp-style',
 			plugin_dir_url( __FILE__ ) . 'css/style.css',
 			false,
 			'1.0',
 			'all'
 		);
 		
 	
 		
 		// What page are we on? And what is the pages limit?
 		$max = $wp_query->max_num_pages;
 		$paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

	 	$last_posts = wp_get_recent_posts();

	 	$num_posts = count($last_posts);

	 	$i = 1;
	 	$html = '';

		 foreach ($last_posts as $item_post) {
			 $date = $item_post['post_date'];
			 $link = $item_post['guid'];
			 $month = date("M", strtotime($date));
			 $date = date("d", strtotime($date));
			 $title = $item_post['post_title'];
			 $content = substr($item_post['post_content'], 0, 140);
			 $content = apply_filters('the_content', $content . "...");
			 $destaque_news = get_field('descricao_destaque', $item_post['ID']);
			 $url = esc_url( get_template_directory_uri() );
/*
			 $html .= '<div id="content-post-'.$i.'" class="content-post-noticia" style="display:none;">';
			 $html .= '<div class="col-lg-1">';
			 $html .= '<div class="date" style="display:none;">';
			 $html .= '<span class="span-one">' . $date . '</span><br />';
			 $html .= '<span class="span-two">' . $month . '</span>';
			 $html .= '</div>';
			 $html .= '</div>';
			 $html .= '<div class="col-lg-10 solucoes-post " style="display:none;">';
			 $html .= '<p>' . $destaque_news . '</p>';
			 $html .= '</div>';
			 $html .= '<div class="col-lg-1 seta" style="display:none;" ontouchstart="this.classList.toggle("hover");">';
			 $html .= '<div class="flipper">';
			 $html .= '<div class="front">';
			 $html .= "<a href='$link'><img class='img-seta seta' src=$url/img/seta.png></a>";
			 $html .= '<span>LER</span></a>';
			 $html .= '</div>';
			 $html .= '<div class="back">';
			 $html .= "<a href='$link' data-href='solucoes.php'><img class='link_blue' src=$url/img/link-blue.png></a>";
			 $html .= '</div></div>';
			 $html .= '</div>';
			 $html .= '</div>';*/


			 /*html que deve ser*/

			 $html .= '<div id="content-post-'.$i.'" class="content-post-noticia" style="display: none;">';
			 $html .='<div class="col-lg-1 no-padding">';
						$html .='<div class="date left">';
							$html .='<div class="box-date">';
								$html .='<div class="left-date">';
									$html .='<div class="box-date-boxes">';
										$html .='<span class="span-one">' . $date . '</span><br/>';
										$html .='<span class="span-two">' . $month . '</span>';
			 							$html .='</div>';
								$html .='</div>';
								$html .='<div class="right-date">';
									$html .= '<div class="box-date-boxes">';
										$html .='<span class="span-one">' . $date . '</span><br/>';
										$html .='<span class="span-two">' . $month . '</span>';
									$html .='</div>';
								$html .= '</div>';
			 				$html .='</div>';
						$html .='</div>';
					$html .='</div>';
			 $html.='<div class="col-lg-10">';
						$html .='<p>' . $destaque_news . '</p>';
					$html .='</div>';


			 $html .= '<div class="col-lg-1 no-padding">';
						$html .='<div class="box-symbol-boxes symbol-up">';
							$html .="<a href='$link'><img class='img-seta seta' src=$url/img/seta.png></a>";
							$html .= '<span>LER</span>';
						$html .='</div>';
						$html .='<div class="box-symbol-boxes symbol-down">';
							$html .="<a href='$link' data-href='solucoes.php'><img class='link_blue' src=$url/img/link-blue.png></a>";
						$html .='</div>';
					$html .='</div>';
			 $html .= '</div>';
			 $i++;



		 }
 		
 		// Add some parameters for the JS.
 		wp_localize_script(
 			'pbd-alp-load-posts',
 			'pbd_alp',
 			array(
				'html' => $html,
				'num_posts' => $num_posts,
				'contador' => 1,
 			)
 		);
 }

function getNoticiass()
{

	// Queue JS and CSS
	wp_enqueue_script(
		'pbd-alp-load-posts',
		esc_url( get_template_directory_uri() ) . 'js/noticias.js',
		array('jquery'),
		'1.0',
		true
	);

	/*DESTAQUE DAS NOTICIAS NA HOME*/

	$args = array(
		'posts_per_page'   => 99,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'	   => '',
		'post_status'      => 'publish',
		'suppress_filters' => true
	);

	$last_posts = wp_get_recent_posts($args);
    
	$noticias = [];
    $ids_noticias = [];

	foreach ($last_posts as $item_post) {
        
        $id_not =  $item_post['ID'];
		$date = is_null($item_post['post_date']) ?"" : $item_post['post_date'];
		$month = date("M", strtotime($date));

		$category_array = get_the_category($item_post['ID']);
		$category = $category_array[0];
       
        $cor_category = get_field('cor_da_categoria2', $category);
        $catsmallclass= get_field('smallclass', $category);
        $arrowclass = get_field('arrowclass', $category);   

		$noticia = new Noticia();
        $noticia->cor_categoria = is_null($cor_category) ? "" : $cor_category; 
          
        $noticia->link =  get_permalink($item_post['ID']);
        $noticia->title = $item_post['post_title'];
		$noticia->day = date("d", strtotime($date));
		$noticia->month = $month;

        $noticia->catclass = $cor_category;
        $noticia->arrowclass = $arrowclass;
        $noticia->catsmallclass =  $catsmallclass;
        $noticia->category =  $category->name;
        
		$noticia->conteudo = $item_post['post_content'];
		$noticia->url = esc_url(get_template_directory_uri());
        $noticia->id_not = $item_post['ID'];
                  
        $noticia->image_thumb = new image_thumb();
        $noticia->image_thumb->pequena = get_field_object('pequena', $item_post['ID'])["value"]["url"];
        $noticia->image_thumb->media = get_field_object('media', $item_post['ID'])["value"]["url"];
        $noticia->image_thumb->grande = get_field_object('grande',$item_post['ID'])["value"]["url"];
        $noticia->image_thumb->id_not = $item_post['ID'];
        

        array_push($noticias, $noticia);
		array_push($ids_noticias, $item_post);
	}

	$noticias = json_encode($noticias);
    $ids_noticias = json_encode($ids_noticias);

	// Add some parameters for the JS.
	// Add some parameters for the JS.
	wp_localize_script(
		'pbd-alp-load-posts',
		'noticias_by_wordpress_JSON_encoded',
		$noticias
	);

	wp_localize_script(
		'pbd-alp-load-posts',
		'ids_noticias_by_wordpress_JSON_encoded',
		$ids_noticias
	);

}

/*// 					{
// 						title: "<?php $title ?>",
//						catclass: "bg-cat-aconteceu-na-cm",
//						catsmallclass: "bg-cat-aconteceu-na-cm-small",
//						arrowclass: "bg-arrow-color-aconteceu-na-cm"
// 						conteudo: "Teste 1",
// 						image_thumb:
// 						{
// 							'pequena': 'http://localhost:8080/wordpress/wp-content/themes/cmcorp/img/noticias/img1.jpg',
// 							'media': 'http://localhost:8080/wordpress/wp-content/themes/cmcorp/img/noticias/img2.jpg',
// 							'grande': 'http://localhost:8080/wordpress/wp-content/themes/cmcorp/img/noticias/img3.jpg',
// 						}
// 					},*/

class Noticia {
	public $title;
    public $day;
    public $month; 
    public $link;
	public $catclass;
	public $catsmallclass;
	public $arrowclass;
	public $conteudo;
    public $category;
    public $cor_categoria;
    public $image_thumb;
    public $id_not;
    
}

class image_thumb {
    public $pequena;
    public $media;
    public $grande;
    public $id_not;
}

 add_action('template_redirect', 'pbd_alp_init');
 add_action('template_redirect', 'getNoticiass');
 ?>