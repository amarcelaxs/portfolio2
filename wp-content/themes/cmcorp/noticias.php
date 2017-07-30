<?php
/**
 * Template Name: Noticiais
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
 
 define("CLASSEBODY", "pnoticias");

get_header();
?>
    <div id="bc">
          <div class="container">
            <div class="row col-xs-12">
                    <span>
                        Você esta em:
                    </span>
                <ul class="breadcrumb">
                    <li>
                        <?php exibir_breadcrumbs($home_page) ?>;
                    </li>
                    <li class="active">
                        <?php
                        // if there is a parent, display the link
                        $parent_title = get_the_title( $post->post_parent );
                        if ( $parent_title != the_title( ' ', ' ', false ) ) {
                          /* echo '<a href="' . get_permalink( $post->post_parent ) . '>' . $parent_title . '</a>'; */}
                        ?>
                          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                            <?php the_title(); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid banner">
        <div class="breadcrumb-bg-img" data-top-top="margin-top: 0%;" data-center-top="margin-top: -9%;">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="banner-ttl" data-top-top="opacity: 0; margin-top: 6%;" data-center-top="opacity: 1; margin-top: 0%;">
                        Novidades e Notícias
                        <br>
                    </h1>
                </div>
            </div>
        </div>
    </div>
<!--    <input id="news" type="hidden" value="--><?php //news() ?><!--" />-->
<script>

</script>
    <!-- Soluções-->
    <section class="trecho-news">
        <div class="container">
            <div class="row" id="content-solucoes-posts">
                <?php pbd_alp_init()?>
            </div>
        </div>
    </section>
    <div class="bgcolor">
        <div class="container">
            <div class="row boxes">
                <div class="col-md-3 no-padding">
                    <select id="arqmesbox" class="arqmes">
                        <option value="Arquivo Mensal">
                            Arquivo Mensal
                        </option>
                        <option value="jan">
                            Janeiro
                        </option>
                        <option value="fev">
                            Fevereiro
                        </option>
                        <option value="mar">
                            Março
                        </option>
                        <option value="abr">
                            Abril
                        </option>
                        <option value="mai">
                            Maio
                        </option>
                        <option value="jun">
                            Junho
                        </option>
                        <option value="jul">
                            Julho
                        </option>
                        <option value="ago">
                            Agosto
                        </option>
                        <option value="set">
                            Setembro
                        </option>
                        <option value="out">
                            Outubro
                        </option>
                        <option value="nov">
                            Novembro
                        </option>
                        <option value="dez">
                            Dezembro
                        </option>
                    </select>
                </div>
                <div class="col-md-3 no-padding">
                    <select id="catbox" class="categorias">
                        <option>
                            Todas as Categorias
                        </option>
                    </select>
                </div>
                <div class="col-md-6 no-padding">
                    <input type="text" class="buscar" placeholder="Buscar uma notícia">
                    <div class="buscar">
                        <img src="http://www.cmcorp.com.br/wp-content/themes/cmcorp/img/noticias/lupa.png" alt="">
                    </div>
                </div>               
            </div>
        </div>
        <!--Contêiner onde será inserida todas as notícias.-->
        <div class="container">
            <!--Linha onde será inserida todas as notícias.-->
            <div class="row" id="noticias">
            </div>
            <!--Botão de carregar notícias.-->
            <div class="btn-load">
                <button id="loadmorenews" class="btn-load-more" onclick="noticias.gerarNoticias.load_more()">
                    Carregar mais Notícias
                </button>
                <!--Local onde aparecerá o aviso informando que já foram carregadas todas as notícias dentro do limite de notícias.-->
                <p id="aviso">
                </p>
            </div>
        </div>
    </div>
<?php get_footer();?>