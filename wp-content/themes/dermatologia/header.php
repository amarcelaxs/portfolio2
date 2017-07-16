<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
* @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

?><!DOCTYPE html>


<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
 <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/style.css" rel="stylesheet">


<title>Dermatologia</title>
<?php wp_head(); ?>
</head>



<body>


<script type="javascript">
	$(document).ready(function(){

			alert('funcionado');
	});
	
</script>
<header>
	<section id="menu">
		<!--div id="navbar-header">	 
			<div class="container-full">	
				<div class="row">							 
					<div class="circle col-md-3 col-sm-3 ">			
						<ul id=" #animation-2" class=" nav nav-pills nav-stacked">
								<li><a href="#" class="home">Home</a></li>
								<li><a href="#">Conceito</a></li>
								<li><a href="#">Perfil</a></li>
								<li><a href="#">Tratamento</a></li>
								<li><a href="#">Cursos</a></li>               
								<li><a href="#">News</a></li>               
								<li><a href="#">Contato</a></li>               
						</ul>  
					</div>
					<div class="col-md-5 col-sm-5 logo">		
			
					</div>       
					<div class="circle col-md-4 col-sm-4 ">	
					</div>                                  
				</div>
			</div>		
		</div-->




<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container-full">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
    <!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="container-full">	
				<div class="row">							 
					<div class="circle col-md-3 col-sm-3 ">				
						<ul class=" nav  nav-pills	nav-stacked">
							<li><a href="#" class="home">Home</a></li>
							<li><a href="#">Conceito</a></li>
							<li><a href="#">Perfil</a></li>
							<li><a href="#">Tratamento</a></li>
							<li><a href="#">Cursos</a></li>               
							<li><a href="#">News</a></li>               
							<li><a href="#">Contato</a></li>               
						</ul> 
					</div>
					<div class="col-md-5 col-sm-5 logo">		
			
					</div>       
					<div class="circle col-md-4 col-sm-4 ">	
				</div>  
			</div>
		</div>
	</nav>
  </div>
	

	</section>	

	</header>


