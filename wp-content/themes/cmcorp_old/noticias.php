<?php
/**
 * Template Name: Noticiais
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

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
                <div class="col-sm-12">
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
    <section class="solucoes">
        <div class="container">
            <div class="row" id="content-solucoes-posts">
                <?php pbd_alp_init()?>
            </div>
        </div>
    </section>
    <div class="bgcolor">
        <!--div class="container">
            <div class="row boxes">
                <div class="col-lg-3 no-padding">
                    <select class="arqmes">
                        <option value="arqmes">
                            Arquivo Mensal
                        </option>
                        <option value="tst1">
                            Teste 1
                        </option>
                        <option value="tst2">
                            Teste 2
                        </option>
                        <option value="tst3">
                            Teste 3
                        </option>
                    </select>
                </div>
                <div class="col-lg-3 no-padding">
                    <select id="catbox" class="categorias" onchange="noticias.gerarNoticias.choose_cat(this.selectedIndex)">
                        <option>
                            Aconteceu Na CM
                        </option>
                        <option>
                            Empreendedorismo
                        </option>
                        <option>
                            Inovação
                        </option>
                        <option>
                            Previdência Privada
                        </option>
                        <option>
                            Tecnologia
                        </option>
                        <option selected>
                            Todas as Categorias
                        </option>
                    </select>
                </div>
                <div class="col-lg-6 no-padding">
                    <input type="text" class="buscar" placeholder="Buscar uma notícia">
                </div>
            </div>
        </div-->
        <!--Contêiner onde será inserida todas as notícias.-->
        <div class="container">
            <!--Linha onde será inserida todas as notícias.-->
            <div class="row" id="noticias">
            </div>
            <!--Botão de carregar notícias.-->
            <!--div class="btn-load">
                <button id="loadmorenews" class="btn-load-more" onclick="noticias.gerarNoticias.load_more()">
                    Carregar mais Notícias
                </button>
                <!--Local onde aparecerá o aviso informando que já foram carregadas todas as notícias dentro do limite de notícias.-->
                <!--p id="aviso">
                </p>
            </div-->
        </div>
    </div>
<?php get_footer(); ?>