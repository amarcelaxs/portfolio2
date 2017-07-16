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
	
  <header>
   <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Ana Marcela</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Ana Marcela</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="home"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#edcucation">Education</a></li>
            <li><a href="#experience">Experience</a></li>
            <li><a href="#skill">Skill</a></li>
            <li><a href="#contact">Contact</a></li>           
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </nav>



	</header>


