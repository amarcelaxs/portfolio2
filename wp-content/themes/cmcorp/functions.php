<?php

/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */

if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option($name, $default = false) {

		$optionsframework_settings = get_option('optionsframework');

		// Gets the unique option id
		$option_name = $optionsframework_settings['id'];

		if ( get_option($option_name) ) {
			$options = get_option($option_name);
		}

		if ( isset($options[$name]) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}
}

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	$color_scheme  = twentyfifteen_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentyfifteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

//	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

/*	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );*/
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';


load_theme_textdomain('cmcorp');

function register_header_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_header_menu' );


/*CRIAÇAO DO HEADER-MENU*/
function render_header_menu(){
	$url= esc_url( get_template_directory_uri());

	$itens = wp_get_nav_menu_items("header-menu");

	$novoArrayMenu = array();
	/* verificando as lis principais*/
	foreach($itens as $item)
	{
		if ($item->menu_item_parent == 0 )
		{
			$item->filhos = submenu_get_children_ids($item->ID, $itens);
			array_push($novoArrayMenu, $item);
		}
	}
	$html = "<ul class='nav navbar-nav navbar-right'>

				<li class='home'>
						<a class='menu-item home' href='/'>
						<span class='house'></span>
						</a>

				</li>";

	foreach($novoArrayMenu as $item)
	{
		$classes="";
		if (count($item->classes) > 0){
			foreach ($item->classes as $class) {
				$classes .=  $class."   ";
			}

		}
		/*verificando se existe filhos nos lis principais*/

 $site_novo = '';

		if (count($item->filhos) > 0) {
			/*criar um if e um foreach para  a criação de dropdown em alguns itens*/
			$html.="<li class='".$classes."'><a class='menu-item ' href='$item->url' data-href='$item->url' >$item->title</a>";
				/*criação das lis filhos*/
                    $html .="<div class='menu-solucoes uncollapsed'>

					<ul  class='menu-sol'>";
                    foreach ($item->filhos as $item_filho) {

                        $classes = "";

                        if (count($item_filho->classes) > 0) {

                            foreach ($item_filho->classes as $class) {

                                $classes .= $class . " ";

                            }

                        }

                        $html .= "<li class='$classes'>

                            <a href='$item_filho->url' data-href='$item_filho->url'  class='link'>$item_filho->title</a>";

                        if(count($item_filho->filhos) > 0) {

                        $html .= "<ul class='menu-$classes'>";

                            foreach ($item_filho->filhos as $item_filho_filho) {

                                /*verificando se existe filhos dentro das filhos(lis)*/

                                $casses = "";

                                if (count($item_filho_filho->classes) > 0) {

                                    foreach ($item_filho_filho->classes as $class) {

                                        $classes = $class . " ";

                                        echo $classes;

                                    }

                                    /*criação dos filhos das lis*/

                                    $html .= "<li ><a href='$item_filho_filho->url'  data-href='$item_filho_filho->url'>$item_filho_filho->title</a>

                                            </li>";

                                }

                            }

                             $html .= "</ul>";

                        }
                    }

				$html.= "</ul>";
				$html .="<div class='agendar-right'><img src='".$url."/img/agenda.png'>
					<p>agende uma apresentação</p><p><a href='".$site_novo."contato/#motivo' data-href='$item->url' class='btn '>agendar</a>
					</p></div>";
				$html.= "</div>";

        }
		else{
			/*criar um if e um foreach para  a criação de dropdown em alguns itens*/
			$html.="<li class='$classes'><a class='menu-item ' href='#' data-href='$item->url'>$item->title</a>";

		}
		$html.= "</li>";
	}
	$html.="</ul>";
	echo $html;
}

function submenu_get_children_ids( $parent_id, $items ) {

	$ids = wp_filter_object_list( $items, array( 'menu_item_parent' => $parent_id ));

	foreach ( $ids as $key => $id ) {

		$filhosDosFilhos = wp_filter_object_list( $items, array( 'menu_item_parent' => $id->ID ));

		if (count($filhosDosFilhos) > 0){
			$id->filhos = $filhosDosFilhos;
		}
	}return $ids;
}


/*CRIAÇÃO DOS BOX SEGMENTOS*/
function box_segmentos(){
	$args = array(
		'sort_order' => 'asc',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'child_of' => 0,
		'parent' => 0,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	);
	$box1 = of_get_option('box-segmento1','id');
	$box2 = of_get_option('box-segmento2','id');
	$box3 = of_get_option('box-segmento3','id');
	$box4 = of_get_option('box-segmento4','id');
	$box5 = of_get_option('box-segmento5','id');
	$box6 = of_get_option('box-segmento6','id');


	$page_box1 = get_post($box1);
	$page_box2 = get_post($box2);
	$page_box3 = get_post($box3);
	$page_box4 = get_post($box4);
	$page_box5 = get_post($box5);
	$page_box6 = get_post($box6);

	$box_segmentos = array(
		$page_box1,
		$page_box2,
		$page_box3,
		$page_box4,
		$page_box5,
		$page_box6,
		);
		$url_site = get_permalink();
	
	foreach ($box_segmentos as $boxs){

		$campos = get_field_object('background_para_segmentos',  $boxs->ID);
		$efeito = get_field('classe_para_efeito_no_box',  $boxs->ID);
		$descricao = get_field('descricao',  $boxs->ID);
        $url_page = get_field('url_page', $boxs->ID);
		$title_page =  $boxs->post_title;
		$title_first = str_replace("[:pt]","",$title_page);
		$title_second = str_replace("[:en]","",$title_first);
		$title_last = str_replace("[:]","",$title_second);
		$saibamais = __("[:pt]SAIBA MAIS +[:][:en]KNOW MORE +[:]");	
		$title = __("$title_page");			
		
		/*$texto = $boxs->post_content;*/

		$html ='<div class="col-md-4 box">';

			$html .='<a href="'.$url_page.'">';

				$html .="<figure class='$efeito'>";

					$html .='<div class="front-box">';

					$html .='</div>';

					$html .='<div class="boxes-index">';

					$html .='<img src="'.$campos["value"]["url"].'" width:"458" height:"302">';

					$html .='</div>';

					$html .='<figcaption>';

					$html .="<h2>$title</h2>";

					$html .="<p>$descricao</p>";

					$html .="<div>$saibamais</div>";

					$html .='</figcaption>';

				$html .='</figure>';

			$html .='</a>';

		$html .='</div>';

		echo $html;
	}

}


/*CRIAÇÃO DOS MINI BOX SEGMENTOS*/
function mini_box_segmentos(){

	$box1 = of_get_option('box-segmento1','id');
	$box2 = of_get_option('box-segmento2','id');
	$box3 = of_get_option('box-segmento3','id');
	$box4 = of_get_option('box-segmento4','id');
	$box5 = of_get_option('box-segmento5','id');
	$box6 = of_get_option('box-segmento6','id');


	$page_box1 = get_post($box1);
	$page_box2 = get_post($box2);
	$page_box3 = get_post($box3);
	$page_box4 = get_post($box4);
	$page_box5 = get_post($box5);
	$page_box6 = get_post($box6);

	$box_segmentos = array(
		$page_box1,
		$page_box2,
		$page_box3,
		$page_box4,
		$page_box5,
		$page_box6,
	);

	foreach ($box_segmentos as $mini_boxs){


		$campos = get_field_object('background_para_mini_segmentos', $mini_boxs->ID);
		$efeito = get_field('classe_para_efeito_no_box',  $mini_boxs->ID);
		$efeito_line = get_field('classe_para_efeito_de_linha',  $mini_boxs->ID);
		$descricao = get_field('descricao',  $mini_boxs->ID);
		$url_page = get_field('url_page', $mini_boxs->ID);
		$title_page = ($mini_boxs->post_title);

        $title_first = str_replace("[:pt]","",$title_page);
        $title_last = str_replace("[:]","",$title_first);
        $url_page = get_field('url_page',  $mini_boxs->ID);


			$html ='<div class="col-md-4 col-xs-6 box">';
			$html .="<figure class='$efeito'>";
			$html .="<div class='front-box'></div>";
				$html .='<img src="'.$campos["value"]["url"].'" width:"389" height:"186">';
				$html .='<figcaption>';
					$html .="<h2>$title_last<p class='line'></p></h2>";
					$html .="<p>$descricao</p>";
					$html .='<a href="'.$url_page.'">View more</a>';
				$html .='</figcaption>';
			$html .= '</figure>';
		$html .='</div>';
		echo $html;

	}

}


/* CRIAÇÃO DO FILTRO DE SISTEMA SOLUÇÕES EM SOLUCOES-PREV */
function sistema_solucoes($parent_id)
{
	//$html = '<ul class="filter-list-group">
	//		<li class="selector-sistema-solucoes"><span data-filter="*"><div class="active"> Todos os Sistemas</div></span></li>';
	//$field = get_field_object("sistema_da_solucao", $parent_id);
	//$value = $field['value'];
	//recolhe as opções marcadas no checkbox da pagina mãe
	//$choices = $field['choices'];

	//if($value) {
		//foreach( $value as $v ) {
			//$html .= '<li><span data-filter=".'.$v.'"><div>'.$choices[ $v ].'</div></span></li>';
	//	}
	//}
	//$html .='</ul>';
	$html = '	<div class="grid-sistema-solucoes">';
	$args = array(
		'sort_order' => 'asc',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'child_of' => 0,
		'parent' => $parent_id,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	);
	$item_solucao = get_pages($args);

	$list_categorias_sistema_solucoes = '';
	//CRIANDO OS QUADRADINHOS COM SERVIÇOS ATRAVES DAS PAGINAS FILHOS
	foreach ( $item_solucao as $item ) {

		$cor = get_field('cor_de_fundo_e_fonte', $item->ID);
		$categoria_sistema_solucoes = get_field_object('sistema_da_solucao', $item->ID);
		$list_categorias_sistema_solucoes = implode(' ',$categoria_sistema_solucoes['value']);
		$thumb_image = get_the_post_thumbnail($item->ID);

		$html .= '<div class="item-port view element-item ' . $list_categorias_sistema_solucoes . '">';
		$html .= $thumb_image;
		$html .= '<h4 style="color:'. $cor .'">' . $item->post_title .'</h4>';
		$html .= '<div class="mask" style="background-color:'. $cor .'">';
		$html .= '<h2>' . $item->post_title . '</h2>';
		$excerpt = get_field('descricao-sistema-solucoes', $item->ID);
		$html .= '<p>' . $excerpt . '</p>';
		$html .= '<a class="info" style="color:'. $cor .';#fff" href="#modal-sistemas" data-toggle="modal" data-page-id="' . $item->ID . '">Saiba Mais +</a></div></div>';
	}
	$html .= '</div><br><br><br><br><br>';
	echo $html;

	//EXIBIÇÃO DO MODAL


	$modal = '<div class="modal fade in" id="modal-sistemas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
	$modal .= '<div class="modal-dialog" role="document">';

	foreach ( $item_solucao as $item_modal ){
		//RECOLHENDO AS INFORMAÇÕES  DOS COMPAS DAS PAGINAS FILHOS
		$logo_image = get_the_post_thumbnail($item_modal->ID);
		$link_pdf = get_field('link_do_pdf', $item_modal->ID);
		$link_pps = get_field('link_do_pps', $item_modal->ID);
		$link_mov = get_field('link_em_mov', $item_modal->ID);
		$link_vimeo = get_field('link_do_vimeo', $item_modal->ID);
		$cor_header = get_field('cor_de_fundo_e_fonte', $item_modal->ID);
        $image_background_padrao = get_field_object('image_default', $item_modal->ID);


		$image = wp_get_attachment_url(get_post_thumbnail_id($item_modal->ID));

		//CRIAÇÃO DO HTML DO MODAL
		$modal .= '<div data-page-id="'.$item_modal->ID.'" class="modal-content item-nao-ativo fade in">';
		$modal .= "<div class='modal-header' style='background-color:$cor_header;'>";
		$modal .= '<span class="titulo-modal col-md-7">';
		$modal .= "<img class='logo' src='$image'>";
		$modal .= "<h1 class='modal-title' id='myModalLabel'>$item_modal->post_title</h1>";
		$modal .= '</span>';
		$modal .= '<span class="col-md-5" style="padding-right: 0;">';
		$modal .= '<a href="#" type="button" class="btn-close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>';
		$modal .= '<span class="btn-arrow pull-right sistema-next" aria-label="right"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></span>';
		$modal .= '<span class="btn-arrow pull-right sistema-prev" aria-label="left"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></span>';
		$modal .= '</span></div>';
		$modal .= '<div class="modal-body">';
		$modal .= '<div class="container-fluid">';
		$modal .= '<div class="col-md-6 text-center coluna-esquerda">';
		$modal .= '<div class="vimeo-small ">';
         if ($link_vimeo != ""){
                $modal .= '<iframe src="'.$link_vimeo.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen="true" style="width:100%;height:332px;"></iframe>';
        }else{
            $modal .= '<img src="'.$image_background_padrao["value"]["url"].'" >';
        }

		$modal .= '</div>';
		$modal .= '<div class="col-md-12 lines">';

		if ($link_pdf != ""){
			$modal .= '<hr>';
         $modal .= '<span><a href="'.$link_pdf.'">Baixar lâmina deste sistema | PDF 3.2Mb</a></span>';
		$modal .= '<hr>';
        }

		if ($link_pps != ""){
         $modal .= '<span><a href="'.$link_pps.'">Baixar apresentação | PPS 2.5Mb</a></span>';
		 $modal .= '<hr>';
        }

        if ($link_vimeo != ""){
         $modal .= '<span><a href="'.$link_vimeo.'">Baixar video | MOV 8.7Mb</a></span>';
         $modal .= '<hr class="linhas">';
		 $modal .= '<a class="action-btn" target="_blank" href="/contato">AGENDE UMA APRESENTAÇÃO</a>';
        }else{
			 $modal .= '<a class="action-btn" target="_blank" href="/contato" style="margin-top:20px;">AGENDE UMA APRESENTAÇÃO</a>';
		}

		$modal .= '<div class="redes-sociais">';
		/*$modal .= '<div class="rede-social-fb"></div>';
		$modal .= '<div class="rede-social-tw"></div>';
		$modal .= '<div class="rede-social-in"></div>';*/
		$modal .= '</div>';
		$modal .= '</div>';
		$modal .= '</div>';
		$modal .= '<div class="col-md-6 text-center coluna-direita">asaas';
        while ( have_posts() ) : the_post();
            // Include the page content template.

            get_template_part( 'content', 'page' );

            // If comments are open or we have at least one comment, load up the comment template.

            if ( comments_open() || get_comments_number() ) :

                comments_template();

            endif;
            // End the loop.

        endwhile;

		//$modal .= '<p>'. $item_modal->post_content . '</p>';
		$modal .= '</div>';
		$modal .= '</div>';
		$modal .= '</div>';
		$modal .= '</div>';
	}
	$modal .= '</div>';
	$modal .= '</div>';
	echo $modal;
}

function get_segmento($idsegmento){
    $nome_segmento = get_field_object("nome_do_segmento", $idsegmento)['value'];

    return $nome_segmento;
}
$escolhas = '';
/* CRIAÇÃO DO FILTRO DE SEGMENTOS*/ 

function segmentos($idsegmento)
{

	$field = get_field_object("sistema_da_solucao", $idsegmento);

	$value = $field['value'];

	//recolhe as opções marcadas no checkbox da pagina de segmento

	$choices = $field['choices'];
    //escolhas de segmentos
  //  $nome_segmento = $segmento['value'];
    $html = '<ul class="filter-list-group menu-segmentos">';
	if($value) {
       $macrosegmentos = "";

       $count = 0;
       foreach ($value as $v) {
           $virgula = ",";

           $macrosegmentos .= "." . $v;
           if ( $count < count($value) - 1) {

               $macrosegmentos .= $virgula;

           }
           $count++;

       }
	   $todosossistemas = __("[:pt]TODOS OS SISTEMAS[:][:en]ALL THE SYSTEMS[:]");
	     
	   	
       $html .='<INPUT TYPE="hidden" NAME="macro" VALUE="'.$macrosegmentos.'">';

       $html .= '<li class="selector-sistema-solucoes  " ><span class="active"  data-filter="'.$macrosegmentos.'"><div>'.$todosossistemas.'</div></span></li>';

	   foreach( $value as $v) {
		   $choices_system = __($choices[ $v ]);
			$html .= '<li><span data-filter=".'.$v.'"><div>'.$choices_system.'</div></span></li>';
                 $escolhas = $v;

		}

	}

	$html .= '</ul>';

    //CRIAÇÃO DE SELECT  PARA RESOLUÇÕES MENORES

    if($value) {
       $macrosegmentos = "";

       $count = 0;
       foreach ($value as $v) {
           $virgula = ",";

           $macrosegmentos .= "." . $v;
           if ( $count < count($value) - 1) {

               $macrosegmentos .= $virgula;

           }
           $count++;

       }

       

     
       $html .='<select class="filter-option-group select-sistemas col-xs-10 col-xs-offset-1 ">';

                

       $html .= '<option  class="active" value="'.$macrosegmentos.'" data-filter="'.$macrosegmentos.'">Todos os Sistemas</option>';       

       

	   foreach( $value as $v) {

            	$html .= '<option  class="" value=".'.$v.'" data-filter=".'.$v.'">'.$choices[ $v ].'</option>';           

                 $escolhas = $v;

		}

          $html .='<option  style="display:none;" TYPE="hidden" NAME="macro" VALUE="'.$macrosegmentos.'"></option>'; 

         $html .='</select>';        

	}    

    echo $html;

}

function quadradinhos($parent_id,$idsegmento){

        $html ='<br/><div class="grid-sistema-solucoes ">';

        $args = array(

            'sort_order' => '',

//            'sort_column' => '',

            'hierarchical' => 1,

            'child_of' => 0,

            'parent' => $parent_id,

            'exclude_tree' => '',

            'number' => '',

            'offset' => 0,

            'post_type' => 'page',

            'post_status' => 'publish'

        );

        $item_solucao = get_pages($args);

        $nome_segmento = get_segmento($idsegmento);

        $list_categorias_sistema_solucoes = '';
        //CRIANDO OS QUADRADINHOS COM SERVIÇOS ATRAVES DAS PAGINAS FILHOS

    $count =0 ;

        $i = 1;

        $teste_categorias_last = '';

        foreach ( $item_solucao as $key => $item) {            
            $cor = get_field('cor_de_fundo_e_fonte', $item->ID);

            $number_ordenacao = get_field($nome_segmento, $item->ID);

            

           

            //$number_ordenacao = get_field('campos_de_teste', $item->ID);

            $categoria_sistema_solucoes = get_field_object('sistema_da_solucao', $item->ID);

            $teste_categorias = $categoria_sistema_solucoes['value'][0];

             //macrosegmentos

             if ($key == 0)

             {

                $teste_categorias_last = $teste_categorias[0];

             }

            

            if ($teste_categorias_last != $teste_categorias)

            {

                $i++;

            }
            /*foreach($teste_categorias as $teste){

                    $virgula = ",";

                    $nomedomacro  .= "." . $teste;
                    if ( $count < count($teste) - 1) {

                        $nomedomacro .= $virgula;

                    }
                    $count++;
            }*/

            //$html .='<INPUT TYPE="hidden" id="macro" NAME="macro" VALUE="'.$nomedomacro.'">';

            

            $list_categorias_sistema_solucoes = $categoria_sistema_solucoes['value'];

            

            $list_categorias_sistema_solucoes_count = $i.$list_categorias_sistema_solucoes[0];
            $thumb_image = get_the_post_thumbnail($item->ID);
            //escolhas de segmentos no sistema

            $quadradinho_segmentos = get_field_object('segmentos_relacionados', $item->ID);

            $array_segmentos = $quadradinho_segmentos['value'];
			$saibamais = __("[:pt]SAIBA MAIS +[:][:en]KNOW MORE +[:]"); 

            

             foreach($array_segmentos as $qs){
               if($qs == $nome_segmento ){
                            $html .= '<div class="item-port view element-item  ' . $list_categorias_sistema_solucoes[0] . '">';
                           // $html .= '<span class="category" style="display:none;">'.$list_categorias_sistema_solucoes_count.'</span>';

                           $html .= '<span class="order" style="display:none;">'.$number_ordenacao.'</span>';
                            //$html .='<INPUT TYPE="hidden" id="macro" NAME="macro" VALUE="'.$count.'">';

                            $html .= '<div class="grid-img" style="background-color:'. $cor .'">'.$thumb_image.'</div>';
                            $html .= '<h4 style="color:'. $cor .'">' . $item->post_title .'</h4>';
                            $html .= '<div class="mask" style="background-color:'. $cor .'">';
                            $html .= '<h2>' . $item->post_title . '</h2>';
                            $excerpt = get_field('descricao-sistema-solucoes', $item->ID);
                            $html .= '<p>' . $excerpt . '</p>';
                            $html .= '<a class="info" style="color:'. $cor .';#fff" href="#modal-sistemas" data-toggle="modal" data-page-id="' . $item->ID . '">'.$saibamais.'</a></div></div>';
                        }else{
                        }
             }

             $teste_categorias_last = $categoria_sistema_solucoes['value'][0];

        }
        $html .= '</div>';
        echo $html;

        //EXIBIÇÃO DO MODAL
            //escolhas de segmentos no sistema


        $modal = '<div class=" modal fade in" id="modal-sistemas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
        $modal .= '<div class="modal-dialog" role="document">';

    $bla = 0;
        foreach ( $item_solucao as $item_modal ){

             // $number_ordenacao = get_field($nome_segmento, $item_modal->ID);

            //segmentos por sistema

             $quadradinho_segmentos = get_field_object('segmentos_relacionados', $item_modal->ID);

             $array_segmentos = $quadradinho_segmentos['value'];

            
            //macrosegmentos

            $categoria_sistema_solucoes = get_field_object('sistema_da_solucao', $item_modal->ID);

            $list_categorias_sistema_solucoes = implode(' ',$categoria_sistema_solucoes['value']);
            //$number_ordenacao = get_field($nome_segmento, $item->ID);
            foreach($array_segmentos as $qs){
               if($qs == $nome_segmento){
                //RECOLHENDO AS INFORMAÇÕES  DOS COMPAS DAS PAGINAS FILHOS
                $logo_image = get_the_post_thumbnail($item_modal->ID);
                $link_pdf = get_field('link_do_pdf', $item_modal->ID);
                $link_pps = get_field('link_do_pps', $item_modal->ID);
                $link_mov = get_field('link_em_mov', $item_modal->ID);
                $link_vimeo = get_field('link_do_vimeo', $item_modal->ID);
                $cor_header = get_field('cor_de_fundo_e_fonte', $item_modal->ID);
                $image_background_padrao = get_field_object('image_default', $item_modal->ID);
                

                $ordenacao_modal = get_field($nome_segmento, $item_modal->ID);
                $accordion_um = get_field('accordion_objetivo',  $item_modal->ID);

                $accordion_dois = get_field('accordion_principais_funcionalidades',  $item_modal->ID);

                $accordion_tres = get_field('principais_consultas', $item_modal->ID);

                $accordion_quatro = get_field('accordion_integracao_com_outros_sistemas',  $item_modal->ID);
                $image = wp_get_attachment_url(get_post_thumbnail_id($item_modal->ID));
                $macro = $list_categorias_sistema_solucoes;

				$agenda = __("[:pt]AGENDE UMA APRESENTAÇÃO[:][:en]SCHEDULE A APRESENTATION[:]");
				$baixar_lamina_sistema = __("[:pt]Baixar lâmina deste sistema | PDF[:][:en]DOWNLOAD THIS SYSTEM | PDF[:]");
				$baixar_apresentacao =__("[:pt]Baixar apresentação | PPS[:][:en]DOWNLOAD APRESENTATION | PPS[:]");
				$baixar_mov = __("[:pt]Baixar video | MOV[:][:en]DOWNLOAD VIDEO | MOV[:]"); 
                //CRIAÇÃO DO HTML DO MODAL
           

                $modal .= '<div   data-page-id="'.$item_modal->ID.'" class="'.$macro.' order modal-content com-filtro item-nao-ativo fade in cor'.$bla.'">';

               

               //COMFLITO

                //$modal .= '<div data-page-id="'.$item_modal->ID.'" class="'.$macro.' modal-content com-filtro item-nao-ativo fade in cor'.$bla.'">';

                // $modal .= '<span class="order-modal" style="display:none;">'.$number_ordenacao.'</span>';
                $modal .= "<div class='modal-header' style='background-color:$cor_header;'>";
                $modal .= '<span class="titulo-modal col-md-7 col-xs-10">';
                $modal .= "<img class='logo' src='$image'>";
                $modal .= "<h1 class='modal-title' id='myModalLabel'>$item_modal->post_title</h1>";
                $modal .= '</span>';
                $modal .= '<span class="col-md-5 col-xs-2" style="padding-right: 0;">';
                $modal .= '<a href="#" type="button" class="btn-close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>';
                $modal .= '<span class="btn-arrow pull-right sistema-next" aria-label="right"><span aria-hidden="true" class=" hidden-xs glyphicon glyphicon-chevron-right"></span><span class="order-modal" style="display:none;">'.$ordenacao_modal.'</span></span>';
                $modal .= '<span class="btn-arrow pull-right sistema-prev" aria-label="left"><span aria-hidden="true" class="  hidden-xs  glyphicon glyphicon-chevron-left"></span><span class="order-modal" style="display:none;">'.$ordenacao_modal.'</span></span>';
                $modal .= '</span></div>';
                $modal .= '<div class="modal-body">';
                $modal .= '<div class="container-fluid">';
                $modal .= '<div class="col-md-6 text-center coluna-esquerda">';
                $modal .= '<div class="vimeo-small ">';
                if ($link_vimeo != ""){
                        $modal .= '<iframe src="'.$link_vimeo.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen="true" style="width:100%;height:332px;"></iframe>';
                }else{
                    $modal .= '<img class="img-responsive" src=" '.$image_background_padrao["value"]["url"].'" class="img-responsive">';
                }

                $modal .= '</div>';
                $modal .= '<div class="col-md-12 lines">';

                if ($link_pdf != ""){
                    $modal .= '<hr>';
                $modal .= '<span><a href="'.$link_pdf.'"></a>'.$baixar_lamina_sistema.'</span>';
                $modal .= '<hr>';
                }

                if ($link_pps != ""){
                $modal .= '<span><a href="'.$link_pps.'">'.$baixar_apresentacao.'</a></span>';
                $modal .= '<hr>';
                }
                if ($link_vimeo != ""){
                $modal .= '<span><a href="'.$link_vimeo.'">'.$baixar_mov.'</a></span>';
                $modal .= '<hr class="linhas">';
                $modal .= '<a class="action-btn" target="_blank" href="/contato">'.$agenda.'</a>';
                }else{
						
                    $modal .= '<a class="action-btn" target="_blank" href="/contato" style="margin-top:20px;">'.$agenda.'</a>';

                }

                $modal .= '<div class="redes-sociais">';
                /*$modal .= '<div class="rede-social-fb"></div>';
                $modal .= '<div class="rede-social-tw"></div>';
                $modal .= '<div class="rede-social-in"></div>';*/
                $modal .= '</div>';
                $modal .= '</div>';
                $modal .= '</div>';

            $modal .= '<div class="col-md-6 text-center coluna-direita"><div class="box-accordion">';

            $modal .=	'<div class="accordion">';

                           if($accordion_um !=""){
							   	$objetivo = __("[:pt]Objetivo[:][:en]Objective[:]");										  
                                $modal .='<h3>
										  '.$objetivo.'
                                    <span class="minimize">

                                    </span>

                                </h3>

                                <div class="accordion-block">

                                    <div>

                                        '.$accordion_um.'

                                    </div>

                                </div>';

                            }

                            else{}

                            

                            if($accordion_dois !=""){

                            $principais_funcionalidades = __("[:pt]Principais Funcionalidades[:][:en]The Main Functions[:]");	
								$modal.='<h3>
									'.$principais_funcionalidades.'
                                <span class="minimize">

                                </span>

                            </h3>

                            <div>

                                <div>

                                    '.$accordion_dois.'

                                </div>

                            </div>';

                            }else{ echo '';}

                            if($accordion_tres !=""){
								 $principais_c_r= __("[:pt]Principais Consultas e Relatórios[:][:en]The Main Querys and Documents[:]");
								$modal.='<h3>'.$principais_c_r.'
                                    <span class="minimize">

                                    </span>

                                </h3>

                                <div>

                                    <div>

                                        '.$accordion_tres.'

                                    </div>

                                </div>';

                            }else{}

                            if($accordion_quatro !=""){
								$integração_outros_sistemas= __("[:pt] Integrações com Outros Sistemas[:][:en]Integrations with other systems[:]");
								$modal .='<h3>'.$integração_outros_sistemas.'
                                <span class="minimize">

                                </span>

                            </h3>

                            <div>

                                <div>

                                    '.$accordion_quatro.'
                                </div>

                            </div>';

                            }else{echo '';}

                        $modal .='</div>';
            $modal .= '</div></div>';
                $modal .= '</div>';
                $modal .= '</div>';
                $modal .= "<style type='text/css' media='screen'>

                    #modal-sistemas .cor".$bla." h3.ui-accordion-header-active {

                        background-color: ".$cor_header.";

                    }

                </style>";

                $modal .= '</div>';
                $bla++;

            }}

        }
        $modal .= '</div>';
        $modal .= '</div>';
        echo $modal;

}
/*IMAGEM PARA A PAGINA SEGMENTOS*/

function conteudo_page($idsegmento){
        $image_background_top = get_field_object('imagem_de_top_do_segmento', $idsegmento)["value"]["url"];

        echo  $image_background_top;

 }

/*DESTAQUE DAS NOTICIAS NA HOME*/

function destaque_noticias()
{

	$last_posts = wp_get_recent_posts();
	foreach ($last_posts as $item_post) {
		$date = $item_post['post_date'];
		$link = $item_post['guid'];
		$month = date("M", strtotime($date));
		$date = date("d", strtotime($date));
		$title = $item_post['post_title'];
		/*$content = substr($item_post['post_content'], 0, 140);*/
	/*	$content = apply_filters('the_content', $content . "...");*/
		$destaque_news = get_field('descricao_destaque', $item_post['ID']);
		$url = esc_url( get_template_directory_uri() );


		$html = '<div class="col-md-1 hover">';
		$html .= '<div class="date vertical">';
		$html .= '<span class="span-one">' . $date . '</span><br />';
		$html .= '<span class="span-two">' . $month . '</span>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<div class="col-md-10">';
		$html .= '<p>' . $destaque_news . '</p>';
		$html .= '</div>';
		$html .= '<div class="col-md-1 seta" ontouchstart="this.classList.toggle("hover");">';
		$html .= '<div class="flipper">';
		$html .= '<div class="front">';
		$html .= "<a href='$link'><img class='img-seta seta' src=$url/img/seta.png></a>";
		$html .= '<span>LER</span></a>';
		$html .= '</div>';
		$html .= '<div class="back">';
		$html .= "<a href='$link' data-href='solucoes.php'><img class='link_blue' src=$url/img/link-blue.png></a>";
		$html .= '</div></div>';
		$html .= '</div>';
	}
	echo $html;

}
/*Carousel Swiper noticias*/
function Swiper()
{
	$html='';
	$args = array(

		'posts_per_page'	=> 8,

		'offset'			=> 0,

		'category'			=> '',

		'category_name'		=> '',

		'orderby'			=> 'date',

		'order'				=> 'DESC',

		'include'			=> '',

		'exclude'			=> '',

		'meta_key'			=> '',

		'meta_value'		=> '',

		'post_type'			=> 'post',

		'post_mime_type'	=> '',

		'post_parent'		=> '',

		'author'			=> '',

		'post_status'		=> 'publish',

		'suppress_filters'	=> true
	);
	$recently_posts = get_posts($args);
	foreach ($recently_posts as $item_swiper) {
		$date = $item_swiper->post_date;
		$link = $item_swiper->guid;
        setlocale(LC_ALL,'ptb');

        $mes = strftime("%B", strtotime($date));

        $month = substr($mes, 0, 3);

		//$month = date("M", strtotime($date));
		$date = date("d", strtotime($date));
		$title = $item_swiper->post_title;
		$destaque_news = get_field('trecho_da_noticia', $item_swiper->ID);
		$thumb_image = get_the_post_thumbnail($item_swiper->ID);
		$destaque = substr($destaque_news, 0, 125);
        $categories = get_the_category($item_swiper->ID);

        $name_category = '';

		if (count($categories) > 0 ){
                if (is_array($categories)) {

                    $name_category  = $categories[0]->name;

                    $cor_category = get_field('cor_da_categoria2',  $categories[0]);

                }else{

                     $name_category  = $categories->name;

                     $cor_category = get_field('cor_da_categoria2',  $categories);

                }
        }

        else

        {

            $name_category = 'Sem Categoria';

            $cor_category = '';

        }

        //$noticia->cor_categoria = is_null($cor_category) ? "" : $cor_category;
		$html ='<div class="card-news fl swiper-slide">';
			$html .='<a href="'.$link.'">';
				$html .='<div class="card-news-photo">';
					$html .='<div class="imageBox">'.$thumb_image.'</div>';
					$html .='<div class="card-seg-base news-inov" style="opacity:0.9;background-color:'.$cor_category.'">';
						$html .='<span>'.$date.'.'.$month.' | '.$name_category.'</span>';
						$html .='<span>9</span>';
					$html .='</div>';
				$html .='</div>';
				$html .='<div>';
					$html .='<span class="tit-card">'.$title.'</span>';
					$html .='<span class="p-card">'.$destaque.'</span>';
				$html .='</div>';
			$html .='</a>';
		$html .='</div>';
		echo $html;
	}
}
function Mini_Swiper()
{
	$html='';
	$args = array(
		'posts_per_page'   => 5,
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
	$recently_posts = get_posts($args);
	foreach ($recently_posts as $item_swiper) {
		$date = $item_swiper->post_date;
		$link = $item_swiper->guid;
        setlocale(LC_ALL,'ptb');

        $mes = strftime("%B", strtotime($date));

        $month = substr($mes, 0, 3);

		//$month = date("M", strtotime($date));
		$date = date("d", strtotime($date));
		$title = $item_swiper->post_title;
		$destaque_news = get_field('trecho_da_noticia', $item_swiper->ID);
		$thumb_image = get_the_post_thumbnail($item_swiper->ID);
		$destaque = substr($destaque_news, 0, 125);
           $categories = get_the_category($item_swiper->ID);

        $name_category = '';

		if (count($categories) > 0 ){
                if (is_array($categories)) {

                    $name_category  = $categories[0]->name;

                    $cor_category = get_field('cor_da_categoria2',  $categories[0]);

                }else{

                     $name_category  = $categories->name;

                     $cor_category = get_field('cor_da_categoria2',  $categories);

                }
        }

        else

        {

            $name_category = 'Sem Categoria';

            $cor_category = '';

        }

		/*$cor_category = get_field('cor_da_categoria2', $item_swiper->ID);*/

		$html ='<div class="card-news fl swiper-slide">';
			$html .='<a href="'.$link.'" class="link_noticia_swiper">';
				$html .='<div class="card-news-photo ">';
					$html .='<div class="imageBox">'.$thumb_image.'</div>';
					$html .='<div class="card-seg-base news-tecn" style="opacity:0.9;background-color:'. $cor_category .'"><span>'.$date.'.'.$month.' | '.$name_category.'</span>';
						$html .='<span>9</span>';
					$html .='</div>';
				$html .='</div>';
				$html .='<div class="card-cont">';
					$html .='<span class="tit-card">'.$title.'</span>';
					$html .='<span class="p-card">'.$destaque.'</span>';
				$html .='</div>';
			$html .='</a>';
        $html .='</div>';
		echo $html;
	}
}






/*Carousel Swiper depoimentos empresas*/
function get_current_post_taxonomies(){
/*	global $post;

	$taxonomy_names = get_object_taxonomies( $post );
	$teste = get_terms( $taxonomy_names, array(
		'orderby'    => 'count',
		'hide_empty' => 0,
	) );

	print_r($teste);*/

	/*if (is_category( )) {
		$cat = get_query_var('cat');
		$yourcat = get_category ($cat);
		echo 'the slug is '. $yourcat->slug;
	}*/

	register_sidebar( array(
		'name' => 'depoimentos',
		'id' => 'depoimentos',

		'div_first' =>'<div class="swiper-slide col-xs-12 col-sm-6 col-md-3">',
		'div_last' =>'</div>',
		'div_first' =>'<div class="swiper-slide col-xs-12 col-sm-6 col-md-3">',
		'div_last' =>'</div>',
	) );
}
add_action( 'widgets_init', 'get_current_post_taxonomies' );


//Criação do footer
function register_footer_menu() {
	register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );


function render_footer_menu()
{
	$html='';
	$downitens = wp_get_nav_menu_items("footer-menu");
	$ArrayFooter = array();

	foreach ($downitens as $item)
	{

		if ($item->menu_item_parent == 0 )
		{
			$item->filhos = submenu_get_children_ids($item->ID, $downitens);
			array_push($ArrayFooter, $item);

		}
	}
		$html = '<div class="col-md-2 col-xs-4">
					<div class="solutions">';
		$html .='<h3>Soluções</h3>
						<ul>
							<li class="cmflex"></li>
							<li class="cmprev"></li>
							<!--li class="totalprev"></li-->
						</ul>
					</div>
				</div>';

    foreach($ArrayFooter as $item) {

        $classes = "";
        if (count($item->classes) > 0) {
            foreach ($item->classes as $class) {
                $classes .= $class . "   ";
            }
        }
        $html .= '<div class="col-md-4 col-xs-5">';
        $html .= "<div class='$classes'>";

        $html .= '<h3>' . $item->title . '</h3>';
        $html .= '<div class="row">';
        /*REFAZER COM O MOD */
        if (count($item->filhos) > 0){
            $teste = '<div class="col-md-6 col-xs-6  "><ul>';
        }
        $html .= $teste;
        $i='';
        foreach ($item->filhos as $item_filho) {
            $i++;
            if($i < 5 ) {
                $html .= '<li>';
                $html .= "<a href='$item_filho->url'><span class='title'>" . $item_filho->title ."</span></a>";

                if ($item_filho->filhos > 0) {
                    $html .= '<ul>';
                    foreach ($item_filho->filhos as $item_filhodaslis) {

                        $html .= '<li>';
                        $html .= "<a href='$item_filhodaslis->url' ><span>" . $item_filhodaslis->title . "</span></a>";
                        $html .= '</li>';
                    }
                    $html .= '</ul>';
                }
            }
        }
        $html .='</li>';
        $html .='</div>';

        if (count($item->filhos) > 4){
            $testando = '<div class="col-md-6 col-xs-6 "><ul>';
        }
        $html .= $testando;
        $i='';
        foreach ($item->filhos as $item_filho) {
            $i++;
            if($i > 4 ) {
                $html .= '<li>';
                $html .= "<a href='$item_filho->url' ><span class='title'>" . $item_filho->title . "</span></a>";

                if ($item_filho->filhos > 0) {
                    $html .= '<ul>';
                    foreach ($item_filho->filhos as $item_filhodaslis) {

                        $html .= '<li>';
                        $html .= "<a href='$item_filhodaslis->url'><span>" . $item_filhodaslis->title . "</span></a>";
                        $html .= '</li>';
                    }
                    $html .= '</ul>';
                }
            }
        }
        $html .='</li>';
        $html .='</div>';
        $html .='</div>';
		$html .='</div>';
		$html .='</div>';
	}
	echo $html;
}

/*crianção do widget na pagina de contato*/

function widgets_novos_widgets_init() {

	register_sidebar( array(
		'name' => 'Localização',
		'id' => 'localizacao_widgets',

		'before_title' => '<h1>',
		'after_title' => '</h1>',


		'lupa_icon' => '<span>',
		'lupa_icon_last' => '</span>',
		'class_before' =>'<div class="zoom">',
		'class_after' =>'</div>',
		'lupa_first' => '<h2>',
		'lupa_end' => '</h2>',
	) );

	register_sidebar( array(
		'name' => 'Endereco',
		'id' => 'endereco_widgets',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
		'nome_location_after' => '<h2>',
		'nome_location_before' => '</h2>',
		'endereco_before' =>'<h3>',
		'endereco_after' =>'</h3>',

	) );

	register_sidebar( array(
		'name' => 'Telefone',
		'id' => 'telefone_widgets',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
		'nome_location_after' => '<h2>',
		'nome_location_before' => '</h2>',
		'endereco_before' =>'<h3>',
		'endereco_after' =>'</h3>',

	) );

	register_sidebar( array(
		'name' => 'Email',
		'id' => 'email_widgets',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'email-first' => '<h2>',
		'email-end' => '</h2>',

	) );

	register_sidebar( array(

		'name' => 'Chat',
		'id' => 'chat_widgets',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
		'nome_chat_after' => '<h2>',
		'nome_chat_before' => '</h2>',
		'chat_before' =>'<h3>',
		'chat_after' =>'</h3>',


	) );
}
add_action( 'widgets_init', 'widgets_novos_widgets_init' );



/*Pagina noticias*/

/*function getNoticias()
{

	// Queue JS and CSS
	wp_enqueue_script(
		'pbd-alp-load-posts',
		esc_url( get_template_directory_uri() ) . 'js/noticias.js',
		array('jquery'),
		'1.0',
		true
	);

	/*DESTAQUE DAS NOTICIAS NA HOME

	$args = array(
		'posts_per_page'   => 5,
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
	$recently_posts = get_posts($args);
	$last_posts = wp_get_recent_posts($args);

	$noticias = [];

	foreach ($last_posts as $item_post) {
		$date = $item_post['post_date'];
		$month = date("M", strtotime($date));

		$noticia = new Noticia();
		$noticia->link = $item_post['guid'];
		$noticia->day = date("d", strtotime($date));
		$noticia->title = $item_post['post_title'];
		$noticia->cor_categoria = $item_post['cor_da_categoria'];
		$noticia->cor_categoria = '';

		$noticia->destaque_news = get_field('descricao_destaque', $item_post['ID']);
		$noticia->url = esc_url(get_template_directory_uri());

		$noticia->imagem_recente = get_field_object('imagem_recente',$item_post['ID']);
		$noticia->imagem_nao_mais_recente = get_field_object('imagem_nao_mais_recente', $item_post['ID']);
		$noticia->imagem_antiga = get_field_object('imagem_antiga', $item_post['ID']);
		$noticia->catclass =

		array_push($noticias, $noticia);
	}

	$noticias =json_encode($noticias);

	// Add some parameters for the JS.
	wp_localize_script(
		'functions',
		'',
		array(
			'noticias_teste' => $noticias,
		)
	);

}*/

/*class Noticia {
	public $link;
	public $month;
	public $day;
	public $title;
	public $cor_categoria;
	public $destaqueNews;
	public $url;
	public $imagemRecente;
	public $imagemNaoMaisRecente;
	public $imagemAntiga;
}*/


/*Pagina Notícia aberta*/

function newopen(){
	$args = array(
		'posts_per_page'   => 5,
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
	$info_posts = get_posts($args);

	foreach ($info_posts as $item_news) {
		$date = $item_news->post_date;
		$link = $item_news->guid;
		$month = date("month", strtotime($date));
		$day= date("day", strtotime($date));
		$year = date("year", strtotime($date));
		$title =$item_news->post_title;
		$destaque_news = get_field('descricao_destaque',$item_news->ID);
		$thumb_image = get_the_post_thumbnail($item_news->ID);
		/*$imagem_grande = get_field_object('imagem_nao_mais_recente', $item_news['ID']);*/
		$destaque = substr($destaque_news, 0, 90);
		$cor_category = get_field('cor_da_categoria', $item_news->ID);

		$html = '<div class="ttl">';
		$html .= '<div class="data-cat">';
		$html .= $day.' de '.$month.'de'.$year.' | Categoria</div>';
		$html .= '<div class="ttl-not">'.$title.'</div></div>';
		$html .= '<div class="bgcolor not">';
		$html .= '<div class="container">';
		$html .= '<div class="row">';
		$html .= '<div class="col-md-6 no-padding-left">';
		$html .= '<img src="'.$thumb_image.'" class="img-responsive img-not"></div>';
		$html .= '<div class="col-md-6 cont-not no-padding-right">';
		$html .= 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<div class="container container-padd">';
		$html .= '<div class="row">';
		$html .= '<div class="col-md-12 cont-not no-padding">';
		$html .= 'um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por lorem ipsum mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero). Ao contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos, suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações da palavra na literatura clássica, descobriu a sua indubitável origem.</div></div>';
		$html .= '</div>';
		/*$html .= '<div class="container container-padd">';
		$html .= '<div class="row">';
		$html .= '<div class="col-md-offset-1 col-md-10 dstq-cont">Lorem Ipsum vem das seções 1.10.32 e 1.10.33 do "de Finibus Bonorum et Malorum" (Os Extremos do Bem e do Mal), de Cícero, escrito em 45 AC.</div></div></div>';
		*//*$html .= '<div class="container container-padd">';
		$html .= '<div class="row">';
		$html .= '<div class="col-md-12 cont-not">Este livro é um tratado de teoria da ética muito popular na época da Renascença. A primeira linha de Lorem Ipsum, "Lorem Ipsum dolor sit amet..." vem de uma linha na seção 1.10.32.</div></div></div></div>';*/
		$html .= '<div class="comments-n-releated-news">';
		$html .= '<div class="container comments">';
		$html .= '<div class="row">';
		$html .= '<div class="col-md-7 no-padding">';
		$html .= '<p class="comments-ttl">Comentários</p>';
		$html .= '<form method="post">';
		$html .= '<input type="text" class="form-control comments-info" placeholder="Seu nome..."><br>';
		$html .= '<input type="text" class="form-control comments-info" placeholder="Seu e-mail..."><br>';
		$html .= '<textarea class="form-control comments-info comments-comment" placeholder="Seu comentário..."></textarea></form>';
		$html .= '</div>';
		$html .= '<div class="col-md-offset-1 col-md-4 no-padding">';
		$html .= '<p class="releated-news-ttl">Notícias Relacionadas</p>';
		$html .= '<div class="col-md-offset-4 col-md-8 releated-news-box no-padding">';
		$html .= '<img src="img/noticia-aberta/releated-new.png" class="img-responsive">';
		$html .= '<div class="releated-news-not-ttl">';
		$html .= '.JAN | Tecnologia</div>';
		$html .= '<div class="releated-news-text"></div></div></div></div></div></div>';
	}
	echo $html;

}

/******************************************************************************************************
Funções que modificam os comentários - utilizadas no comment.php deste tema  - Início
*******************************************************************************************************/

function endway_comments( $comment, $args, $depth ) {
  //if ((int)$depth <=1 )
  {
  ?>
  </div> <!--div class="col-md-10" <?php comment_ID(); echo " depth -".$depth; ?>-->
  </div> <!--div class="o-comentario ou resposta -->
<?php  }
}

function way_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <p><?php _e( 'Pingback:', 'way' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'way' ), '<span class="edit-link">', '</span>' ); ?></p>
    <?php
            break;
        default :
        global $post;

    ?>

    <?php if ((int)$depth == 1) :?>

    <div class="o-comentario wow fadeInDown" id="li-comment-<?php comment_ID(); ?>"> <!-- pai <?php comment_ID(); echo " depth -".$depth; ?>-->
    <?php endif;?>
<?php if ((int)$depth > 1) :?>
    <div class="resposta-comentario wow fadeInDown" id="li-comment-<?php comment_ID(); ?>"> <!-- filho <?php comment_ID(); echo " depth -".$depth; ?>-->

    <?php endif;?>


<div class="col-md-2 no-padding">

<?php

 echo get_avatar( $comment, 96,"","",
array(

'height'        => 100,
   'width'         => 75,
       'class'         => "avatar",
       'class'    => "comentarios-avatar-commenter". " comentarios-avatar-answer " ));

?>
</div>
</div>
<div class="col-md-10">
<div class="comentarista">
<?php /*printf( __( '<span><h6>%s</h6>' ), sprintf( '%s', get_comment_author_link() ) ); */?><!--
             <?php /*printf( _x( 'em: %1$s às %2$s</span>', '1: date, 2: time' ), get_comment_date(), get_comment_time() ); */?><span>
             <?php /*comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); */?></span>-->


<?php printf( __( '<span><h6>%s</h6></span>' ), sprintf( '%s', get_comment_author_link() ) ); ?>

</div>
<div class="texto-comentario">
<div class="comentarios-comment">
<?php comment_text(); ?>
</div>

<span class="answer"><?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>



    <?php
         break;
    endswitch;


}
function pagination($pages = '', $range = 4)

{  

     $showitems = ($range * 2)+1;  

 

     global $paged;

     if(empty($paged)) $paged = 1;

 

     if($pages == '')

     {

         global $wp_query;

         $pages = $wp_query->max_num_pages;

         if(!$pages)

         {

             $pages = 1;

         }

     }   

 

     if(1 != $pages)

     {

         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";

         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";

         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

 

         for ($i=1; $i <= $pages; $i++)

         {

             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))

             {

                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";

             }

         }

 

         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";

         echo "</div>\n";

     }

}

/*criação de página de pesquisa*/
/******************************************************************************************************
Funções que modificam os comentários - utilizadas no comment.php deste tema  - Fim
*******************************************************************************************************/
 $site_novo = '';

 if($site_novo ==''){

     $site_novo='/';

 }
$home_page = '<a href="/" >Home</a>';

$noticia_page = '<a href="/noticias" >Notícia</a>';

 function exibir_breadcrumbs(){

     global $home_page;

    echo $home_page;

  }
  
  
 
 