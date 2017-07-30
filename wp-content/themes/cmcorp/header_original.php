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
include("feriados.php");

$obj = new feriados_nacionais;
 
?>
<!DOCTYPE html>
<!--<html <?php /*language_attributes(); */?> class="no-js">-->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>	
<span>LOCAL</span>

	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title>CMCorp</title>
	<meta name="description" content="ERP" />
	<meta name="keywords" content="ERP" />
  
    <!--fim criação mobile-->
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet">
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/Swiper/dist/css/swiper.min.css"  rel="stylesheet">
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css" rel="stylesheet">
	<link href="http://jqueryvalidation.org/files/demo/site-demos.css" rel="stylesheet">
	<link href="img/favicon.ico" rel="shortcut icon">
<!--	<script src="--><?php //echo esc_url( get_template_directory_uri() ); ?><!--/js/html5.js"></script>-->
	<?php wp_head(); ?>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/all.js"></script>
	<script>window.$ = jQuery;</script>
    
</head>
<!--body <//?php body_class( CLASSEBODY ); ?> -->
<body <?php body_class(); ?> >
<?php
$home_page = 'teste'; /* escopo global */

function Teste()
{
    echo $home_page; /* referencia uma variável do escopo local (não definida) */
}

?>

<nav class="nav-top hidden-xs">
	<div class="container no-padding">
		<div >
			<div class="collapse navbar-collapse navbar-right collap" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav top-menu">
					<!--<a name="top">
					</a>
					<li>
						<a href="?lang=pt" class="ref-idioma">
							<span class="glyphicon glyphicon-globe">
							</span>
							<span class="demo">
								PT
							</span>
						</a>
					</li>
					<li class="dropdown language">
						<a href="" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php _e('Mudar Idioma','cmcorp')?></a>
						<ul class="dropdown-menu change-language">
							<li><a href="?lang=en" ><span class="glyphicon glyphicon-globe"></span>EN</a>
								<span><//?php _e('English','cmcorp')?></span>
							</li>
						</ul>
					</li-->
                    <li class="active chat<?php $obj = new feriados_nacionais; $teste = $obj->feriados(); $feriado = date('d/m'); $day=date('l');if($day!='Saturday' && $day != 'Sunday'){echo ' diautil';}elseif($teste !=''){echo '';}
                    
                    /*if( $day!='Saturday' && $day!='Sunday'   
                    AND $feriado != '25/03' && $feriado != '26/03' && $feriado != '27/03' && $feriado != '21/04' && $feriado != '23/04' && $feriado != '01/05' &&  $feriado !=  '15/05' && $feriado != '26/05' && $feriado != '31/05'  && $feriado != '07/09' && $feriado != '12/10' && $feriado != '02/11' && $feriado != '15/11' && $feriado != '28/11' &&  $feriado != '25/12'){echo' diautil';} */?>">
						<a href="#">
							<i class="fa fa-commenting fa-2">
							</i>
							<?php _e('Iniciar Chat','cmcorp')?>
							<div class="button-alert">
								<i class="fa fa-arrow-up">
								</i>
								Clique aqui...
							</div>
						</a>
					</li>
					<li>
						<a class="contato">
							<span class="glyphicon glyphicon-earphone">
							</span><?php echo of_get_option("example_text_mini_meu","");?>
						</a>
					</li>
				</ul>
				<div class="aviso">
					<div class="aviso-box">
						<div class="box-header">
							<i class="fa fa-exclamation-triangle">
							</i>
							Aviso
							<div class="box-close">
								<i class="fa fa-times">
								</i>
							</div>
						</div>
						<div class="box-content">
							Nosso horário de atendimento é de <strong>9:00 às 18:00</strong> em dias úteis. Entre em contato usando a página Fale Conosco.
						</div>
						<div class="box-buttons">
							<a href="http://www.cmcorp.com.br/contato">
								Ir para contato
							</a>
						</div>
					</div>
				</div>
                
				<form class="navbar-form navbar-left search-form" role="search" method="get" action="/">
					<div class="form-group">
						<input type="search" class="search-field  ui-autocomplete-input input-search " placeholder="Buscar..." value="<?php 
		echo get_search_query() ?>" name="s" title="Buscar..." autocomplete="on">
					</div>
					<button type="submit" class="btn btn-default search-submit screen-reader-text" value="Pesquisar">
						<span class="glyphicon glyphicon-search">
						</span>
					</button>
				</form>
			</div>
			<div class="col-md-12">
				<span class="glyphicon glyphicon-earphone">
				</span><?php echo of_get_option("example_text_mini_meu","");?>
			</div>
		</div>
	</div>
</nav>
<header class="navbar" >
	<!-- Barrra Menu -->
	<div class="container no-padding">
		
            <div class="navbar-header">
                    <button id="nav-icon1" class="navbar-toggle menu-responsivo" data-target=".bs-navbar-collapse" data-toggle="collapse" type="button">                        
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a itemprop="url" href="/" data-href='#page-top' title="Nome" class="logo">
                        <img itemprop="logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png" class="img-responsive" alt="CMCorp" width="150" height="81" />
                    </a>
		   </div>
		<!-- Menu -->
         

		
        
        <nav id="navbar" class="menu uncollapsed">
            
			<div class="line hidden-xs"></div>

			<?php
				 render_header_menu();
            ?>
			<script>
				all.menu();
			</script>

		</nav>
	</div>
</header>