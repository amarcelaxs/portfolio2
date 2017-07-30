<?php
/**
 * Template Name: ContatoCm
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

define("CLASSEBODY", "pcontato");

get_header();
?>

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
                    <a href="/site-novo">
                        Home
                    </a>
                </li>
                <li class="active">
                    <?php
                    // if there is a parent, display the link
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
<!-- Banner -->
<section id="banner-top-faleconosco">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 no-padding">
                <h1>
                    Fale Conosco
                </h1>
                <h2>
                    Envie-nos suas dúvidas
                </h2>
                <h3>
                    ou sugestões
                </h3>
            </div>
            <div class="col-lg-6 menu-contato">
                <div class="row">
                    <div class="col-lg-4 direcao">
                        <a href="#" class="um direction">
                        </a>
                        <a href="#" class="dois direction-descricao">
                            <p>
                                Condomínio Rio Office Park
                            </p>
                            Rua Victor Civita, 66. Bloco 02. Lojas 115 e 116
                            <br/>
                            Cep 2275-044, Barra da Tijuca, RJ
                        </a>
                    </div>
                    <div class="col-lg-4 telefone">
                        <a href="#" class="um tel">
                        </a>
                        <a href="#" class="dois descricao-tel">
                            <p>
                                PABX: 
                                <span>
                                    21 3575-9100
                                </span>
                            </p>
                            <p>
                                Tel: 
                                <span>
                                    21 3495-9109
                                </span>
                            </p>
                            <p>
                                Tel: 
                                <span>
                                    21 4063-9044
                                </span>
                            </p>
                        </a>
                    </div>
                    <div class="col-lg-4 carta">
                        <a href="#" class="um email">
                        </a>
                        <a href="#" class="dois descricao-email">
                            <p>
                                E-mail:
                            </p>
                            contato@cmcorp.com.br
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 conversa">
                        <a href="#" class="um chat">
                        </a>
                        <a href="#" class="dois descricao-chat">
                            <p>
                                Condomínio Rio Office Park
                            </p>
                            Rua Victor Civita, 66. Bloco 02. Lojas 115 e 116
                            <br/>
                            Cep 2275-044, Barra da Tijuca, RJ
                        </a>
                    </div>
                    <div class="col-lg-4 rato">
                        <a href="#" class="um mouse">
                        </a>
                        <a href="#" class="dois descricao-mouse">
                            <p>
                                Condomínio Rio Office Park
                            </p>
                            Rua Victor Civita, 66. Bloco 02. Lojas 115 e 116
                            <br/>
                            Cep 2275-044, Barra da Tijuca, RJ
                        </a>
                    </div>
                    <div class="col-lg-4 placas">
                        <a href="#" class="um sign">
                        </a>
                        <a href="#" class="dois descricao-sign">
                            <p>
                                Condomínio Rio Office Park
                            </p>
                            Rua Victor Civita, 66. Bloco 02. Lojas 115 e 116
                            <br/>
                            Cep 2275-044, Barra da Tijuca, RJ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- menu-interno -->
<section id="menu-interno">
    <div class="container-fluid">
        <div class="row barra-seta">
					<span class="glyphicon glyphicon-triangle-bottom hidden-xs hidden-sm">
					</span>
            <div class="col-lg-4 menu fale-conosco">
                <a href="#">
                    <h1>
                        Fale Conosco
                    </h1>
                    <h2>
                        queremos ouvi-lo
                    </h2>
                </a>
            </div>
            <div class="col-lg-4 menu trabalhe-conosco">
                <a href="#">
                    <h1>
                        Trabalhe na CM
                    </h1>
                    <h2>
                        faça parte do nosso time
                    </h2>
                </a>
            </div>
            <div class="col-lg-4 menu seja-parceiro">
                <a href="#">
                    <h1>
                        Seja Nosso Parceiro
                    </h1>
                    <h2>
                        buscamos parceiros
                    </h2>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Fim menu-interno -->
<!--inicio experiencia-->
    <section id="contato">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 talktous no-padding">
                    <?php echo do_shortcode( '[contact-form-7 id="390" title="Contato"]' ); ?>
                </div>
                <div class="col-lg-7 workwithus">


                    <div class="cabecalho">
                        <h2>Trabalhe Conosco</h2>
                        <p>A CMCorp está sempre em busca de profissionais qualificados e de alto nível para compor seus quadros. Se você é um deles, deixe-nos conhecê-lo enviando seu currículo.</p>
                        <h3>Preencha o formulário de acordo com os seguintes passos abaixo. </h3>
                    </div>
                    <div class="steps col-md-12">
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
                    </div>
                    <?php echo do_shortcode( '[contact-form-7 id="619" title="Trabalhe Conosco"]' ); ?>

                </div>
                <div  class="col-lg-7 bepartner">
                    <div class="cabecalho">
                        <h2>Seja nosso parceiro</h2>
                        <p>A CMCorp mantém uma política contínua de analisar e efetuar associações e parcerias. Sua empresa pode se candidatar a ser uma parceira da CMCorp, sob vários aspectos: tecnologia, produtos, sistemas, vendas, serviços.</p>
                        <h3>Preencha o formulário de acordo com os seguintes passos abaixo. </h3>
                    </div>
                    <div class="steps col-md-12">
                        <div class=" fase-one" >
                            <div id="seta-one"></div>
                            <h6>1 - Contato</h6>
                        </div>
                        <div class=" fase-two ">
                            <div id="seta-two"></div>
                            <h6>2 -Dados da Empresa</h6>
                        </div>
                        <div class=" fase-three ">
                            <div id="seta-three"></div>
                            <h6>3 - Sócios executivos</h6>
                        </div>
                        <div class=" fase-four ">
                            <h6>4 - Parceria</h6>
                        </div>
                    </div>
                    <?php echo do_shortcode( '[contact-form-7 id="630" title="Seja Parceiro"]' ); ?>
                </div>

                <div class="col-lg-4 col-lg-push-1">
                    <div class="comochegar">

                        <!--<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/fale-conosco/direction.jpg">-->
                        <!--<h1>Como Chegar</h1>-->
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/fale-conosco/direction.jpg">
                        <?php if ( dynamic_sidebar('localizacao_widgets') ) : else : endif; ?>
                        <div class="zoom">
									<span class=" glyphicon glyphicon-zoom-in pull-left" aria-hidden="true">
									</span>
                            <a href="#">
                                <h2>
                                    Ampliar
                                </h2>
                            </a>
                        </div>

                    </div>
                    <div class="location">

                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/fale-conosco/position.jpg">
                        <?php if ( dynamic_sidebar('endereco_widgets') ) : else : endif; ?>
                    </div>
                    <div class="telfones">

                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/fale-conosco/telephone.jpg">
                        <?php if ( dynamic_sidebar('telefone_widgets') ) : else : endif; ?>

                    </div>
                </div>
                <div class="contato-email">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/fale-conosco/email.jpg">
                    <?php if ( dynamic_sidebar('email_widgets') ) : else : endif; ?>

                </div>
            </div>
        </div>
        </div>
    </section>
<!--End experiencia-->
<?php get_footer(); ?>