<?php
/**
* Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

 
get_header(); ?>

<main>
<div id="primary">
	<div id="content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<h1><?php the_field('custom_title'); ?></h1>

			<img src="<?php the_field('hero_image'); ?>" />

			<p><?php the_content(); ?></p>

		<?php endwhile; // end of the loop. ?>  

	</div><!-- #content -->
</div><!-- #primary -->


<section id="sobre">
   <div class="container-full">
        <div class="container">
            <div class="row whoare">
                <div class="col-xs-6 col-lg-6 col-sm-6"> 
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bold.jpg">
                </div>
                <div class=" quem-somos col-xs-6 col-lg-6 col-sm-6">
                    <h1><span>Quem</span> Somos</h1><br><hr>                 
                    <p>A <b>Bold Finance</b> é um grupo empresarial focado no desenvolvimento de soluções
                         financeiras estruturadas e inovadas que beneficiem investidores privados 
                         e titulares de direitos creditórios de diversas naturezas.
                    </p>
                    <p>O grupo é composto por duas companhias: 
                        a <b>Bold Assessoria Financeira S.A.</b>, que presta serviços de assessoria 
                        financeira e consultoria em gestão empresarial, além de participar de
                         outras empresas; e a <b>Bold Securitizadora S.A.</b>, uma insituição não
                          financeira constituida sob a forma de sociedade pora ações, que adquire
                           direitos creditórios de diversas naturezas com o intuito de
                            securitizá-los por meio da emissão de valores mobiliários para investidores privados.
                        </p>
                </div>                                  
            </div>
            <div class="row pontos">
                <div class="missao col-xs-4 col-lg-4 col-sm-4">
                    <p>Missão <span class="alvo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/alvo.png"></span></p>
                    <hr>
                    <span>Desenvolvedor soluções financeiras estruturadas e inovadoras com o objetivo de gerar retornos superiores aos produtos similares disponiveis no mercado</span>
                </div>
                <div class=" visao col-xs-4 col-lg-4 col-sm-4">
                    <p >Visão <span class="bin"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/lupa.png"></span></p>
                    <hr>
                    <span>Ser um grupo empresarial reconhecido por entregar resultados acima das expectativas, alinhados ao perfil de nosso investidores privados</span>
                </div>
                <div class="valores col-xs-4 col-lg-4 col-sm-4">
                    <p>Valores<span class="medalha"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/medalha.png"></span></p>
                    <hr>
                    <ul>
                        <li><span>-Ética na condução dos negócios</span></li>
                        <li><span>-Aplicação de altos padrões de governança corporativa</span></li>
                        <li><span>-Respeito aos nossos stakeholders</span></li>
                        <li><span>-Construção de parcerias sólidas e duradouras</span></li>
                        <li><span>-Busca pela performance</span></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> 
<section id="about-securitizacao">
   <div class="container sobre-securitizacao">
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                <h1><span>O que é </span>Securitização?</h1>
                <hr>
                <hr class="border">
                <p>A Securitização  consiste em uma operação de aquisição de um direito creditório por um veículo especificamente criado para esse fim.
                Este veículo emite valores  mobiliários lastreados nos ativos adquiridos, garantindo a investidores retornos derivados de parcelas dos fluxos 
                originados por esses ativos.</p>

                <h1>Estrutura Operacional</h1>                
                <p>Apresenta-se abaixo um exemplo esquematizado da operação de securitização, que pode variar  de acordo com  as especificidades
                    da estrutura adotada no caso concreto.
                </p>
            </div>
            <div class="col-xs-12 col-lg-12 col-sm-12">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/estrutura.png">
                
            </div>
        </div>
    </div>
</section>
<section id="vantagens">
   <div class="container-full vantagens">
        <div class="container">
            <h1>Vantagens da <span> securitização</span></h1>
            <hr>
                <hr class="border">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/draw.png">
        </div>
    </div>
</section> 
<section id="mercado">
   <div class="container mercadoatuacao">        
            <h1>Mercado de  <span> Atuação</span></h1>
            <hr>
            <hr class="border">
            <div class="box col-xs-3 col-lg-3 col-sm-3">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/box1.jpg">
                <h1>Recebíveis Imobiliários</h1>
                <p>A Bold securitiza  recebíveis imobiliários oriundos  de contrato de alugueis residencias e comerciais. </p>
                <span>Saiba mais</span>
            </div>
              <div class="box col-xs-3 col-lg-3 col-sm-3">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/box2.jpg">
                  <h1>Recebíveis Corporativos</h1>
                  <p  class="smallfont">A Bold  securitiza recebíveis de natureza  corporativa(contrato e titulos  de crédito, por exemplo)oriundo das atividades  operacionais da sua empresa.</p>
                  <span>Saiba mais</span>
            </div>
              <div class="box col-xs-3 col-lg-3 col-sm-3">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/box3.jpg">
                  <h1>Recebíveis Alternativos</h1>
                  <p class="smallfont">A Bold  securitiza recebíveis de natureza  corporativa(contrato e titulos  de crédito, por exemplo)oriundo das atividades  operacionais da sua empresa.</p>
                  <span>Saiba mais</span>
            </div>
            <div class="box col-xs-3 col-lg-3 col-sm-3">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/box4.jpg">
                  <h1>Assessoria Financeira</h1>
                  <p>A Bold securitiza  recebíveis imobiliários oriundos  de contrato de alugueis residencias e comerciais. </p>
                  <span>Saiba mais</span>
            </div>
    </div>
</section> 
<section id="emissao">
  <div class="containter-full emissao">
        <div class="container">
            <h1>Emissões</h1>
            <hr>
            <hr class="border">
            <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading front-accordion">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a>
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                    1º Emissão</a>
                </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body accordion-body">
                    <ul>
                    <li>
                    <div class="col-lg-3">
                        <div class="titles col-xs-6">Emissão</div><div class="txt col-xs-6">1º</div>
                    </div> 
                    </li>
                    <li>                   
                    <div class="col-lg-3">
                        <div class="titles col-xs-6">Emissão</div><div class="txt col-xs-6">1º</div>
                    </div></li>
                    <li>
                    <div class="col-lg-3">
                        <div class="titles col-xs-6">Emissão</div><div class="txt col-xs-6">1º</div>
                    </div>
                    </li>
                </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading front-accordion">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a>
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                    2º Emissão</a>
                </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body accordion-body"></div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading front-accordion">
                 <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a>
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    3º Emissão</a>
                </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body accordion-body"></div>
                </div>
            </div>
            </div>
        </div>
    </div>    
</section> 
<section id="oquedizem">
  <div class="container-full oquefalaram">      
        <div class="container ">
            <div class="col-lg-3">
                <h1>O que falam <span>sobre a bold</span></h1>            
            </div>
            <div class="col-lg-3">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/person.png">
            </div>
            <div class="col-lg-6 describe">
                <h1> Daniel Machado</h1>
                <span>(Excelente empresa)</span>
                <p>A AGT CONSULTORIA  e EVENTOS  é um empresa  moderna,  dinâmica  e atualizada, que surgiu  no mercado para ser  um diferencial nas areas de Consultoria Socual e Produção de Eventos.</p>                    
            </div>
        </div>
    </div>
</section> 
<section id="nossosparceiros">
   <div class="container parceiros">
        <h1>Nossos <span>Parceiros</span></h1>
        <hr>
        <hr class="border">
        <div class="col-lg-12">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logos.png">
        </div>
    </div>
</section> 


</main>
<?php get_footer(); ?>