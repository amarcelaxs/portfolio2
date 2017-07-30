<?php
/**
 * Template Name: ContatoCm
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

define("CLASSEBODY", "pcontato");
get_header();
require_once("feriados.php");
$feriadoService = new FeriadoService;
$isDiaUtil = $feriadoService->isDiaUtil(time());

?>
<div id="resultado"></div>
<div id="bc">
    <div class="container">
        <div class="row">
					<span>
						<p class="fl">
                            Você está em:
                        </p>
					</span>
            <ul class="breadcrumb">
                <li>
                       <?php exibir_breadcrumbs($home_page) ?>;
                </li>
                <li class="active">
                    <?php
                   //  if there is a parent, display the link
                    $parent_title = get_the_title( $post->post_parent );
                    if ( $parent_title != the_title( ' ', ' ', false ) ) {
                      /*  echo '<a href="' . get_permalink( $post->post_parent ) . '>' . $parent_title . '</a> » ';*/}
                    ?>
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                        <?php the_title(); ?></a>
                </li>
          </ul>
        

      </div>
  </div>
</div>
<!-- End Breadcrumb -->
<!-- menu-interno -->
<section id="menu-interno">
    <div class="container-fluid">
        <div class="row barra-seta">
					<span class="glyphicon glyphicon-triangle-bottom hidden-xs hidden-sm">
					</span>
                  
            <div class="col-md-4 col-sm-4 menu-contato fale-conosco">
           
                    <h4>
                     <?php echo __("[:pt]Fale Conosco[:][:en]Talk to Us[:]"); ?>
                        
                    </h4>
                    <h5>
                        <?php echo __("[:pt]Fale Conosco[:][:en]we want to hear you[:]"); ?>
                    </h5>
             
            </div>
            <div class="col-md-4 col-sm-4 menu-contato trabalhe-conosco">
              
                    <h4>
                        <?php echo __("[:pt]Trabalhe na CM[:][:en]Work in CM[:]"); ?>
                    </h4>
                    <h5>
                        <?php echo __("[:pt]faça parte do nosso time[:][:en]Make Part of Our Time[:]"); ?>
                    </h5>
                
            </div>
            <div class="col-md-4 col-sm-4 menu-contato seja-parceiro">             
                    <h4>
                        <?php echo __("[:pt]Seja Nosso Parceiro[:][:en]Will be our friend Partner[:]"); ?>
                    </h4>
                    <h5>
                        <?php echo __("[:pt]Buscamos parceiros[:][:en]To search partner[:]"); ?>
                    </h5>
              
            </div>
        </div>
    </div>
</section>
<!-- Banner -->
<section id="banner-top-faleconosco">
    <div class="container">
        <div class="row">
            <div class="col-md-6 no-padding">
                <h1>                    
                    <?php echo __("[:pt]Fale Conosco[:][:en]Talk to Us[:]"); ?>
                </h1>
                <h2 class="hidden-xs">
                    <?php echo __("[:pt]estamos prontos[:][:en] we are ready[:]"); ?>
                </h2>
                <h3 class="hidden-xs">
                <?php echo __("[:pt]para atendê-lo[:][:en]for answer[:]"); ?>                   
                </h3>
            </div>
            <div class="col-md-6 menu-contato">
                <div class="row">
                    <div class="col-md-4 direcao">
                        <a href="#" class="direction">
                        </a>
                        <a href="#" class="descricao-direction">
                            <p>
                                Endereço:
                            </p>
                            Av. Embaixador Abelardo Bueno, 1023
                            <br/>
                            CEP 22775-039 <br> Barra da Tijuca, RJ
                        </a>
                    </div>
                    <div class="col-md-4 telefone">
                        <a href="#" class="tel">
                        </a>
                        <a href="#" class="descricao-tel">
                            <p>
                                Telefone:
                            </p>
                            <span>
                                +55 21 3575.9100
                            </span>
                        </a>
                    </div>
                    <div class="col-md-4 carta">
                        <a href="#" class="email">
                        </a>
                        <a href="#" class="descricao-email">
                            <p>
                                E-mail:
                            </p>
                            contato@cmcorp.com.br
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 conversa">
                        <a href="#" class="chat-on">
                        </a>
                        <a href="#motivo" class="descricao-chat chat">
                            <p>
                                Atendimento
                            </p>                           
                        </a>
                    </div>
                    <div class="col-md-4 rato">
                        <a href="#" class="mouse">
                        </a>
                        <div class="descricao-mouse">
                            <p>
                               CMCorp na Rede
                            </p>
                            <ul class="social">
                                <li class="facebook">
                                    <a href="#" class="fa fa-facebook-square">
                                    </a>
                                </li>
                                <li class="linkedin">
                                    <a href="#" class="fa fa-linkedin-square">
                                    </a>
                                </li>
                            </ul>
                            <br>
                            <ul class="social">
                                <li class="vimeo">
                                    <a href="#" class="fa fa-vimeo-square">
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a href="#" class="fa fa-youtube-square">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 placas">
                        <a href="#" class="sign">
                        </a>
                        <a href="#" class="descricao-sign">
                            <p>
                                Como chegar na CMCorp
                            </p>                          
                            <br>
                            <i class="fa fa-map-o" id="descer"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fim menu-interno -->
<!--inicio experiencia-->
    <section id="contato">
        <div class="container">
            <div class="row">
                <div class="col-md-7 talktous no-padding">
                    <div class="cabecalho">
                        <h2>                          
                            <?php echo __("[:pt]Fale Conosco[:][:en]Talk to Us[:]"); ?>
                        </h2>
                        <p>
                            A CMCorp está sempre ao seu dispor para quaisquer esclarecimento. Deixe-nos suas dúvidas e sugestões e entraremos em contato o mais breve possível.
                        </p>
                        <h3>Campos com <span>*</span> são obrigatórios.</h3>
                    </div>                    
                    <?php echo do_shortcode( '[contact-form-7 id="390" title="Contato"]' );  ?>
                    
                </div>
                <div class="col-md-7 workwithus">
                    <div class="cabecalho">
                        <h2><?php echo __("[:pt]Trabalhe na CM[:][:en]Work in CM[:]"); ?></h2>
                        <p>A CMCorp está sempre em busca de profissionais qualificados e de alto nível para compor seus quadros. Se você é um deles, deixe-nos conhecê-lo enviando seu currículo.</p>                        
                        <h3>Campos com <span>*</span> são obrigatórios.</h3>
                    </div>
                    <!--div class="steps col-md-12">
                        <div class="fase-one" >
                            <h6>1 - Dados Pessoais</h6>
                            <div id="seta-one"></div>
                        </div>
                        <div class="fase-two ">
                            <div id="seta-two"></div>
                            <h6>2 - Educação</h6>
                        </div>
                        <div class=" fase-three ">
                            <div id="seta-three"></div>
                            <h6>3 - Experiência</h6>
                        </div>
                        <div class=" fase-four ">
                            <div id="seta-four"></div>
                            <h6>4 - Habilidades</h6>
                        </div>
                        <div class="fase-five">
                            <h6>5 - Interesse</h6>
                        </div>
                    </div-->
                    <?php echo do_shortcode( '[contact-form-7 id="619" title="Trabalhe Conosco"]' ); ?>

                </div>
                <div  class="col-md-7 bepartner">
                    <div class="cabecalho">
                        <h2><?php echo __("[:pt]Seja Nosso Parceiro[:][:en]Will be Partner[:]"); ?></h2>
                        <p>A CMCorp mantém uma política contínua de analisar e efetuar associações e parcerias. Sua empresa pode se candidatar a ser uma parceira da CMCorp, sob vários aspectos: tecnologia, produtos, sistemas, vendas, serviços.</p>
                        <p>Preencha o formulário de acordo com os seguintes passos abaixo. </p>
                         <h3>Campos com <span>*</span> são obrigatórios.</h3>
                    </div>
                    <div class="steps col-md-12">
                        <div class="fase-one">
                            <div id="seta-one"></div>
                            <h6>1 - Contato</h6>
                        </div>
                        <div class="fase-two">
                            <h6>2 - Parceria</h6>
                        </div>
                        <!--div class=" fase-two ">
                            <div id="seta-two"></div>
                            <h6>2 -Dados da Empresa</h6>
                        </div>
                        <div class=" fase-three ">
                            <div id="seta-three"></div>
                            <h6>3 - Sócios executivos</h6>
                        </div-->
                        
                    </div>
                    <?php echo do_shortcode( '[contact-form-7 id="630" title="Seja Parceiro"]' ); ?>
                </div>

                <div class="col-md-4 col-md-push-1">
                    <!--div class="comochegar"-->

                        <!--<img src="</?php echo esc_url( get_template_directory_uri() ); ?>/img/fale-conosco/direction.jpg">-->
                   
                        <!--img src="<//?php echo esc_url( get_template_directory_uri() ); ?>/img/fale-conosco/direction.jpg">
                        <//?php if ( dynamic_sidebar('localizacao_widgets') ) : else : endif; ?>
                        <div class="zoom">
									<span class=" glyphicon glyphicon-zoom-in pull-left" aria-hidden="true">
									</span>
                            <a href="#">
                                <h2>
                                    Ampliar
                                </h2>
                            </a>
                        </div>

                    </div-->                   
                    
                    <div class="location col-xs-12">

                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/fale-conosco/position.jpg">
                        <?php if ( dynamic_sidebar('endereco_widgets') ) : else : endif; ?>
                    </div>
                    <div class="telfones col-xs-12">

                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/fale-conosco/telephone.jpg">
                        <?php if ( dynamic_sidebar('telefone_widgets') ) : else : endif; ?>

                    </div>
                </div>
                <div class="contato-email col-xs-12">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/fale-conosco/email.jpg">
                    <?php if ( dynamic_sidebar('email_widgets') ) : else : endif; ?>
                </div>
                <div class="chat-email <?php echo $isDiaUtil ? 'diautil':''?> col-xs-12">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/fale-conosco/chat.jpg">
                    <?php if ( dynamic_sidebar('chat_widgets') ) : else : endif; ?>
                </div>
            </div>
        </div>
       <!--/div-->
    
        
    
    
    </section>
    <!--section>
        <div class="container-fluid mapa">
                <//?php if ( dynamic_sidebar('localizacao_widgets') ) : else : endif; ?>
            </div>
        </section-->
        
        <style>
            #map { height: 100%; }
        </style>
        <section   class="banner-map" >
            <div id="map"></div>
            <div id="map-unlocker">
                <h2>
                    <div class="text">
                        Deseja interagir <br>com o mapa
                    </div>
                    <div class="sim">
                        Sim
                    </div>
                    <div class="nao">
                        Não
                    </div>
                </h2>
            </div>
        </section>
       
   
    
    
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeHb17So0QupSGO_d6b8X-OyvJ32UQehs"></script>
   <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/contato.js"></script>
   <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/trabalheconosco.js"></script>
<script type="text/javascript"> 
contato.init();
trabalheconosco.init();
</script>
        
<!--End experiencia-->
<?php get_footer(); ?>

