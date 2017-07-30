<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>


<!DOCTYPE html>
<!--<html <?php /*language_attributes(); */?> class="no-js">-->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>

	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CMCorp</title>
	<meta name="description" content="ERP" />
	<meta name="keywords" content="ERP" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css" rel="stylesheet">
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/Swiper/dist/css/swiper.min.css"  rel="stylesheet">
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/font-awesome/css/font-awesome.min.css">




<!--	<script src="--><?php //echo esc_url( get_template_directory_uri() ); ?><!--/js/html5.js"></script>-->
	<?php wp_head(); ?>

	<script>window.$ = jQuery;</script>
</head>

<body <?php body_class(); ?> >
<!--pagina="<//?php echo CLASSEBODY ?>"-->



<nav class="nav-top">
	<div class="container">
		<div class="row">
			<div class="collapse navbar-collapse navbar-right collap" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav top-menu">
					<a name="top"></a>
					<li><a href="?lang=pt" class="ref-idioma"><span class="glyphicon glyphicon-globe"></span><span class="demo">PT</span></a></li>
					<!--li class="dropdown language">
						<a href="" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php _e('Mudar Idioma','cmcorp')?></a>
						<ul class="dropdown-menu change-language">
							<li><a href="?lang=en" ><span class="glyphicon glyphicon-globe"></span>EN</a>
								<span><//?php _e('English','cmcorp')?></span>
							</li>
						</ul>
					</li-->
					<li class="active chat"><a href="#"><i class="fa fa-commenting fa-2"></i><?php _e('Iniciar Chat','cmcorp')?></a></li>
					<li><a class="contato"><span class="glyphicon glyphicon-earphone"></span><?php echo of_get_option("example_text_mini_meu","");?></a></li>
				</ul>
					<form class="navbar-form navbar-left search-form" role="search"  method="get" action="/wordpress">
				<div class="form-group ">
					<input type="search" class="input-search search-field" placeholder="Buscar..." value="" name="s" >
				</div>
				<button type="submit" class="btn btn-default search-submit" value="Pesquisar"><span class="glyphicon glyphicon-search"></span></button>
			</form>

			</div>
		</div>
	</div>
</nav>
<header class="navbar" role="banner">
	<!-- Barrra Menu -->
	<div class="container no-padding">
		<div class="navbar-header">
			<a itemprop="url" href="#page-top" data-href='/' title="Nome" class="logo">
				<img itemprop="logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png" class="img-responsive" alt="texto" width="150" height="81" />
			</a>
		</div>

		<!-- Menu -->

		<nav class="collapse navbar navbar-collapse bs-navbar-collapse menu " role="navigation" data-target=".bs-navbar-collapse">
			<div class="line"></div>

			<?php
				 render_header_menu();
			?>

		</nav>
	</div>
</header>





