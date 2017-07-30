<?php
/**
 * Template Name: Solucoes
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();
?>
<input id="page-id" type="hidden" value="solucoes">
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
                        /*echo '<a href="' . get_permalink( $post->post_parent ) . '>' . $parent_title . '</a> » ';*/ }
                    ?>
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                        <?php the_title(); ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->
<!--Banner-->
<section class="secVideoSolucoes">
    <div class="barra-video select-video">
        <video class="video js-background_video" muted="" loop="" autoplay="true">
            <!--source src="https://secure-c.vimeocdn.com/p/video/yosemite_hd_ii_hd.webm" type="video/webm"-->
            <!--source src="https://player.vimeo.com/external/98945042.hd.mp4?s=cb896eff96021c3cf57219981c77aef1" type="video/mp4"-->
            <source src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/introflex.mp4" type="video/mp4">
        </video>
        <div class="pattern">
        </div>
        <div class="container">
            <h4 data-scroll-reveal="scale up 20%">
                Conheça a solução perfeita
                <br>
                para o seu negócio.
            </h4>
            <a href="javascript:void(0)" class="open" data-scroll-reveal="wait 0.2s scale up 20%">
                <i>
                    &#87;
                </i>
            </a>
            <p data-scroll-reveal="wait 0.3s scale up 20%">
                CMFLEX | Soluções integradas que incorporam o
                <br>
                conhecimento do negócio do cliente.
            </p>
        </div>
        <div class="vimeo" style="height: 100%;position: fixed;top: 0;z-index: 2000;">
            <iframe src="https://player.vimeo.com/video/98945042?api=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen="true">
            </iframe>
            <a href="javascript:void(0)" class="close">
                <i>
                    &#249;
                </i>
            </a>
        </div>
    </div>
    	<div class="container mini-titles">
				<div class="row up">
                    <?php mini_box_segmentos() ?>
				</div>
			</div>
		</section>
<!--<section class="conteudo">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 descricao">
                <h1 data-scroll-reveal="move 2px scale up 2%, over 1s">
                    Não é conteúdo do site, mas ajuda a passar a ideia da diagramação do título.
                </h1>
                <div data-scroll-reveal="move 2px scale up 2%, over 1.5s">
                    <p>
                        A Solução CMFlex é uma resposta às múltiplas demandas necessários para uma admistração empresarial bem-sucedida, atendendo aos segmentos de indústria, comércio e serviços.
                    </p>
                    <p>
                        Registra e disponibiliza informações instantâneas sobre clientes, vendas, faturamento, fornecedores, fornecendo informações gerenciais fundamentais para cada área da epresa, com redução de erros, retrabalho e custos. Os sistemas são corporativos e integrados, modulares, simples de usar, interativos, altamente parametrizáveis e aderentes à realidade do negócio do cliente.
                    </p>
                    <p>
                        A Solução CMFlex está disponivel no conceito de software como serviço, podendo ser operada em diferentes navegadores via web, permitindo gerenciar seu negócio de qualquer lugar, com informações precisas e em tempo real.
                    </p>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="<?php /*echo esc_url( get_template_directory_uri() ); */?>/img/solucoes/monitor.png" data-scroll-reveal="wait .5s, ease-in 50px">
            </div>
        </div>
    </div>
</section>-->
<!--<section class="caracteristicas">
    <div class="container-fluid title">
        <h1 data-scroll-reveal>
            Algumas das Principais Caracteristicas da CMFlex:
        </h1>
    </div>
    <div class="container">
				<span class="glyphicon glyphicon-triangle-bottom hidden-xs hidden-sm">
				</span>
        <div class="row up">
            <div class="col-lg-3 box-1">
                <img src="<?php /*echo esc_url( get_template_directory_uri() ); */?>/img/img-vetor/sistemas-modulares.png" class="img-responsive" data-scroll-reveal="enter right over 0.75s after 0.25s">
            </div>
            <div class="col-lg-3 box-2">
                <img src="<?php /*echo esc_url( get_template_directory_uri() ); */?>/img/img-vetor/totalmente-integrado.png" class="img-responsive" data-scroll-reveal="enter left over 0.75s after 0.25s">
            </div>
            <div class="col-lg-3 box-3">
                <img src="<?php /*echo esc_url( get_template_directory_uri() ); */?>/img/img-vetor/altamente-parametrizavel.png" class="img-responsive" data-scroll-reveal="enter right over 0.75s after 0.25s">
            </div>
            <div class="col-lg-3 box-4">
                <img src="<?php /*echo esc_url( get_template_directory_uri() ); */?>/img/img-vetor/interface-amigavel.png" class="img-responsive" data-scroll-reveal="enter left over 0.75s after 0.25s">
            </div>
        </div>
        <div class="row sub-titles">
            <div class="col-lg-3" data-scroll-reveal="wait .5s move 0 scale up 2%, over 1s">
                <h2>
                    SISTEMAS
                    <br>
                    MODULARES
                </h2>
            </div>
            <div class="col-lg-3" data-scroll-reveal="wait .5s move 0 scale up 2%, over 1s">
                <h2>
                    TOTALMENTE
                    <br>
                    INTEGRADO
                </h2>
            </div>
            <div class="col-lg-3" data-scroll-reveal="wait .5s move 0 scale up 2%, over 1s">
                <h2>
                    ALTAMENTE
                    <br>
                    PARAMETRIZÁVEL
                </h2>
            </div>
            <div class="col-lg-3" data-scroll-reveal="wait .5s move 0 scale up 2%, over 1s">
                <h2>
                    INTERFACE AMIGÁVEL
                    <br>
                    E RESPONSIVA
                </h2>
            </div>
        </div>
        <div class="row down">
            <div class="col-lg-3 box-5">
                <img src="<?php /*echo esc_url( get_template_directory_uri() ); */?>/img/img-vetor/multiidioma.png" class="img-responsive" data-scroll-reveal="enter right over 0.80s after 0.30s">
            </div>
            <div class="col-lg-3 box-6">
                <img src="<?php /*echo esc_url( get_template_directory_uri() ); */?>/img/img-vetor/seguro-rastreavel.png" class="img-responsive" data-scroll-reveal="enter left over 0.80s after 0.30s">
            </div>
            <div class="col-lg-3 box-7">
                <img src="<?php /*echo esc_url( get_template_directory_uri() ); */?>/img/img-vetor/multimoeda.png" class="img-responsive" data-scroll-reveal="enter right over 0.80s after 0.30s">
            </div>
            <div class="col-lg-3 box-8">
                <img src="<?php /*echo esc_url( get_template_directory_uri() ); */?>/img/img-vetor/multiplataforma.png" class="img-responsive" data-scroll-reveal="enter left over 0.80s after 0.30s">
            </div>
        </div>
        <div class="row sub-titles">
            <div class="col-lg-3" data-scroll-reveal="wait .5s move 0 scale up 2%, over 1s">
                <h2>
                    MULTIIDIOMA
                </h2>
            </div>
            <div class="col-lg-3" data-scroll-reveal="wait .5s move 0 scale up 2%, over 1s">
                <h2>
                    SEGURO
                    <br>
                    RASTREÁVEL
                </h2>
            </div>
            <div class="col-lg-3" data-scroll-reveal="wait .5s move 0 scale up 2%, over 1s">
                <h2>
                    MULTIMOEDA
                </h2>
            </div>
            <div class="col-lg-3" data-scroll-reveal="wait .5s move 0 scale up 2%, over 1s">
                <h2>
                    MULTIPLATAFORMA
                </h2>
            </div>
        </div>
    </div>
</section>-->
<!--<section id="contacte">
    <div class="container">
        <div class="row">
            <h5 data-scroll-reveal="wait .3s scale up 20% over 1s">
                Fale agora com um de nossos especialistas!
            </h5>
            <a class="action-bt" href="#" data-scroll-reveal="wait .8s scale up 20%, over 1s">
                AGENDE UMA APRESENTAÇÃO
            </a>
        </div>
    </div>
</section>-->
    <?php while ( have_posts() ) : the_post();

    // Include the page content template.
    get_template_part( 'content', 'page' );


    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
    comments_template();
    endif;

    // End the loop.
    endwhile;
    ?>

<?php get_footer(); ?>