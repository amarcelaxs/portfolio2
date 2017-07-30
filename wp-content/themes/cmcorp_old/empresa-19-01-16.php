<?php
/**
 * Template Name: Empresa
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();
?>
<!-- Breadcrumb -->
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
                        <a href="/">
                            Home
                        </a>
                    </li>
                    <li class="active">
                        <?php
                        // if there is a parent, display the link
                        $parent_title = get_the_title( $post->post_parent );
                        if ( $parent_title != the_title( ' ', ' ', false ) ) {
                            /*echo '<a href="' . get_permalink( $post->post_parent ) . '>' . $parent_title . '</a> » ';*/ }
                        ?>
                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->



<?php /*children_empresa(394)*/?>
<?php
// Start the loop.
while ( have_posts() ) : the_post();

    // Include the page content template.
    get_template_part( 'content', 'page' );


    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

    // End the loop.
endwhile;
?>
    <!--Destaques -->
    <!--inicio experiencia-->
 <!--   <section id="experiencia">
        <div class="container-fluid">
				<span class="glyphicon glyphicon-triangle-bottom hidden-xs hidden-sm">
				</span>
            <div class="col-lg-6" style="padding:0;">
                <img src="img/empresa/grafico.png">
            </div>
            <div class="col-lg-6">
                <h1>
                    Mais de 29 anos de História e muitas experiências
                </h1>
                <p>
                    A CMCorp foi criada em 2005 no âmbito do Grupo CM
                    Soluções para desenvolver e fornecer soluções e
                    gestão corporativa integrada ao mercado, com foco
                    em empresas industriais, comerciais e de serviços.
                </p>
                <?php /*children_empresa(394)*/?>
            </div>
        </div>
    </section>
    <!--End experiencia-->
    <!--Descrição empresa-->
  <!--  <section id="descricao-empresa">
        <div class="container-fluid">
            <div class="col-lg-8 descricao">
					<span>
						Este conteúdo não é real
					</span>
                <h1>
                    Não é conteúdo do site, mas ajuda a passar a ideia de uma diagramação simples e fluida.
                    <h1>
                        <p>
                            Com a ampliação da área de atuação do Grupo CM, a CM Soluções passou a ser uma empresa de participações e investimentos imobiliários. Desta forma, a CMCorp concentrou toda a operação de software e hoje dispõe de sistemas de gestão integrados (ERP) para empresas industriais, de comércio, de serviços (Solução TotalCorp) e de previdência privada complementar (Solução TotalPrev). Estando atenta as novas tecnologias, vem investindo fortemente no seu ERP em nuvem com a Solução CMFlex.
                        </p>
                        <p>
                            Nossa visão continua a de que, cada vez mais, em um ambiente crescentemente complexo, competitivo e global, é essencial que as empresas contem com soluções e fornecedores que possam agregar efetivamente às suas próprias visões estratégicas.
                        </p>
            </div>
            <div class="col-lg-4">
                <img src="img/empresa/equipe.jpg" class="img-responsive pull-right">
            </div>
        </div>
    </section>-->
    <!--End Descrição empresa-->
    <!--Servicos-->
    <section id="servicos">
        <div class="container">
            <div class="row">
                <h1 class="col-lg-10 col-lg-offset-1">
                    Trabalhamos forte e continuamente para que nossos clientes recebam de nós soluções e serviços que:
                </h1>
            </div>
            <div class="row sub-servicos">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                    <div class="swiper-slide col-xs-12 col-sm-6 col-md-3 col-lg-3"><?php if ( dynamic_sidebar('depoimentos') ) : else : endif; ?></div>


                    </div>


                    <!-- Add Pagination -->
                    <!--<div class="swiper-pagination"></div>-->
                </div>

            </div>
        </div>
    </section>
<?php /*if ( dynamic_sidebar('depoimentos') ) : else : endif; */?>


    <!--End Servicos-->
<?php get_footer(); ?>