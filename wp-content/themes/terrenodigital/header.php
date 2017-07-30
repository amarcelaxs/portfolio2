<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?><!DOCTYPE html>


<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
 <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/css/style.css" rel="stylesheet">
<!--link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"--> 


<title>Bold Finance</title>
<?php wp_head(); ?>
</head>
<body>	
<header>
  <section id="top">
    <div class="navbar-wrapper">
        <div class="container">
          <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bold.png"></a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                  <div>                   
                      <div class="msociais">
                          <a href="#" ><span class="instagram"></span></a>
                          <a href="#" ><span class="linkedin"></span></a>                        
                          <a href="#" ><span class="facebook"></span></a>
                      </div>
                      <span>55 11 0000-0000   |  contato@empresa.com.br</span>
                  </div>
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#quemsomos">Quem Somos</a></li>
                  <li><a href="#securitização">Securitização</a></li>               
                  <li><a href="#vantagensdasecuritização">Vantagens da Securitização</a></li>               
                  <li><a href="#emissoes">Emissões</a></li>
                  <li><a href="#oquefalam">O que falam da Bold</a></li>
                  <li><a href="#Parceiros">Perceiros</a></li>
                  <li><a href="#contato">Contato</a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>  
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bold1.jpg" alt="First slide">          
        </div>
        <div class="item">
          <img class="second-slide" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bold1.jpg" alt="Second slide">        
        </div>
        <div class="item">
          <img class="third-slide" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bold1.jpg" alt="Third slide">         
        </div>
        <div class="item">
          <img class="third-slide" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bold1.jpg" alt="Third slide">         
        </div>        
        <div class="container caption">            
            <span class="one"><span class="first">Soluções</span> Completas</span>
            <span class="two">Em <span class="middle">Secursitização</span></span>
            <span class="three">de <span class="last">recebíveis</span>           
          </div>
      </div>
      <!--a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a-->
    </div><!-- /.carousel -->
  </section>
</header>


