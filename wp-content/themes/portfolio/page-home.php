<?php
/*
Template Name: Home-Page
*/

get_header();
?>
<main>

<section id="missao" class="bgParallax" data-speed="5">   
      <div class="container" >    
         <article>   
          <div class="perfil">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/me.jpg" alt="Ana Marcela">
                <h1>Ana Marcela<h1>
                 <h2>Desenvolvedora Web</h2>
            </div>       
          </article>  
      </div>

    </section>
    <section id="quemsomos" class=" bgParallax" data-speed="15">    
      <div class="container">       
        <article>
          <div class="col-md-6 col-lg-6 col-xs-6">        
          </div>    
          <div class="col-md-6 col-lg-6 col-xs-6">
              <!--h1>Sou Ana Marcela uma Desenvolvedora Web,tenho 28 anos e trabalho com desenvolvimento desde 2012, sou formada em Analise e Desenvolvimento de Sistemas e atualmente desenvolvo sites utilizando a plataforma Wordpress.</h1-->          
              <?php
                    //se houver algum post 
                    if(have_posts()):
                        //enquanto hpuver  algum post,  chame o post de determina maneira
                          while(have_posts()) : the_post();
                    ?> <h1><?php the_title();?> </h1>  <h1><?php the_content();?> </h1> 
                    <?php endwhile;
                    else:?> <p>nada </p>
                    <?php endif; ?>
                  
                    
          </div>     
          <!--div class="col-lg-6 col-sm-6 col-xs-12">
              <span class="laptop" class="img-responsive"></span>
          </div-->       
        </article>
      </div>      
    </section>
   
    
    <section id="skill" class="bgParallax" data-speed="22">      
      <div class="container">     
        <article>
            <div class="col-lg-6 col-sm-6 hidden-xs">       
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6">
                <ul>
                    <li>Twitter Bootstrap</li>
                    <li>Wordpress</li>
                    <li>JQuery</li>
                    <li>Javascript</li>
                    <li>Sass</li>
                    <li>CSS</li>
                    <li>Git</li>
                    <li>PHP</li>
                    <li>MySql</li>
                    <li>Linux</li>
                    <li>Windows</li>
                    <li>UML</li>
                    <li>Postgresql</li>
                    <li>Design Responsivo</li>
                    <li>Photoshop</li>
                    <li>Fireworks</li>
                    <li>Bitbucket</li>
                    <li> Trello </li>
                </ul>
          </div>
        </article>
      </div>    
    </section>
    <section id="experience" class="bgParallax" data-speed="20">    
      <div class="container">      
        <div class="row">  
        <article>
            <div class="col-lg-4 col-sm-4 col-xs-4"> 
              <span class="img ubc"></span>               
            </div>
             <div class="col-lg-4 col-sm-4 col-xs-4">
             <span class="img cm"></span>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-4">
            <span class="img port"></span>
            </div>
          </article>  
          </div>
      </div>      
    </section>

</main>

    </div> <!-- /container -->
<?php get_