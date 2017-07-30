var noticias = new function noticias()
{
	var self = this;

	var noticiasWordpress = JSON.parse(noticias_by_wordpress_JSON_encoded);
    var ids_noticias = JSON.parse(ids_noticias_by_wordpress_JSON_encoded);
        
	this.gerarNoticias = new function gerarNoticias()
	{
		var global_vars = function global_vars()
		{
			//Variável 'col' usada para limitar ao número de colunas do bootstrap.
			col = 0;
			/*Variável 'cols' com os tamanhos de notícias previamente estabelecidos nesta variável para gerar o Layout
			 na ordem do PSD.*/
			cols = [9, 3, 3, 3, 6, 3, 3, 3, 3];
			//Variável 'cont' para saber se as 9 primeiras notícias, ou seja, as notícias do PSD, já foram geradas.
			cont = 0;
			cont_noticias = 6;
			//Variável com o conteúdo/descrição da notícia para simular esta informação no Banco de Dados de Notícias.
			conteudo =	'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e \
						vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de \
						tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só \
						a  cinco séculos, como também ao salto para a editoração eletrônica, permanecendo \
						essencialmente inalterado.';
			//Variável 'ids' array com informações para simular o Banco de Dados de Notícias.
			/*ids = [3, 5, 12, 15];*/
            window.quantidadeNoticias = ids_noticias.length;
			db = noticiasWordpress;
            //console.log(noticiasWordpress);
            limite = false;
            contadora_noticias = 0;
            
// 			db =
// 				[
// 					{
// 						title: "Previdência Privada",

// 						day: "21",
//                      month: "0"
//                      link: "http://www.google.com.br"
// 						catclass: "#7E4C79",
// 						catsmallclass: "#7E4C79",
// 						arrowclass: "#7E4C79",
// 						conteudo: "Teste 4",
// 						image_thumb:
// 						{
// 							'pequena': 'http://localhost:8080/wordpress/wp-content/themes/cmcorp/img/noticias/img1.jpg',
// 							'media': 'http://localhost:8080/wordpress/wp-content/themes/cmcorp/img/noticias/img2.jpg',
// 							'grande': 'http://localhost:8080/wordpress/wp-content/themes/cmcorp/img/noticias/img3.jpg',
// 						}
// 					}
// 				];


		
			//console.log(db2);
			/*Variável 'id_row' (ID da Linha de Notícias) com um ID contativo para gerar um ID sequencial para cada
			 Linha de Notícias gerada.*/
			id_row = 0;
			/*Variável 'id_not' (ID da Notícia) com um ID contativo para gerar um ID sequencial para cada Notícia e
			 seus dependentes (Imagem, conteúdo, título, etc...).*/
			id_not = 0;
			//Variável 'lin' (Linhas) usada para contar o números de linhas de Notícias.
			lin = 3;
			//Variável 'lim' para definir o limite de linhas de notícias a serem carregadas.
			lim = 3;
			/*Variável 'load_more_clicks' para aumentar o limite, na variável 'lim', de linhas de notícias que poderão
			 ser geradas.*/
			load_more_clicks = 0;
			//Variável array com os meses abreviados para ser exibido junto ao título da notícia.
			//meses = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
			/*Variável 'sel_cat' (Categoria Selecionada) que guarda a categoria de notícia selecionada. Começa com 5
			 pois é o index da opção "Todas as Categorias".*/
			sel_cat = 5;
		}
		var load_news = function load_news()
		{
			/*Verifica se chegou ao final da página menos duas linhas de notícias, ou seja, irá sempre carregar duas
			 linhas de notícias abaixo de onde o usuário está visualizando, desde que respeite o limite máximo de
			 linhas que poderão ser exibidos.*/
			if ($(window).scrollTop() + $(window).height() > $(document).height() - 710 && lin < lim)
			{
				//Verifica se é a última linha de notícias que poderá ser carregada dentro do limite.
				if (lin + 1 == lim)
				{
					//Verifica se o número de linhas chegou a 99.
					if (lim < 99)
					{
						//Remove o foco do botão.
						$('#loadmorenews').blur();
						//Exibe o botão de 'Carregar mais Notícias' ou de 'Próxima Página'.
						$('#loadmorenews').show();
					}
					else
					{
						/*Após alcançar o limite de 99 linhas de notícias é exibido no lugar do botão 'Carregar mais
						 Notícias' uma mensagem informando que foi atingido o limite máximo de notícias carregadas.*/
						$('#aviso').append('Número máximo de notícias atingido.');
					}
				}
				//Carrega uma linha de notícias ao alcançar um ponto determinado da página.
				load_row();
			}
		}
		/*Função "Categoria da Notícia" para selecionar a categoria da notícia de acordo ou não com o filtro dependendo
		 da opção escolhida no 'ComboBox'.*/
		function cat_not()
		{
			//Verifica a opção escolhida no 'ComboBox'.
			if (sel_cat == 5)
			{
				/*No caso da opção escolhida for 'Todas as Categorias' é gerada uma categoria aleatória para a última
				 notícia gerada. Após a conexão com o Banco de Dados o cálculo deverá ser substituído pela a informação
				 contida no Banco de Dados.*/
				ids_noticias[id_not] = Math.floor(Math.random() * 4.999);
			}
			else
			{
				/*Caso a opção escolhida seja diferente de 'Todas as Categorias' será atribuída a categoria escolhida
				 no 'ComboBox'.*/
				ids_noticias[id_not] = sel_cat;
			}
		}
		//Função "Inserir Categoria da Notícia" para aplicar o estilo da categoria definida pela função 'cat_not()'.
		function ins_cat_not(size)//aqui se coloca o style de cada quadradinho  pequeno 3 os quadrados tamanho 6 e e não precisam
		{
			//Verifica se a notícia é pequena.
			if (size == 3)
			{
				/*Adiciona a classe com os estilos da categoria, escolhida anteriormente, ao conteúdo/descrição da
				 notícia pequena.*/
				$('#text' + id_not.toString()).css('background-color', ''+ db[ids_noticias[id_not]].catsmallclass+'');
			}
			else
			{
				/*Adiciona a classe com os estilos da categoria, escolhida anteriormente, ao conteúdo/descrição da
				 notícia grande ou média.*/
				$('#cont' + id_not.toString()).css('background-color', ''+ db[ids_noticias[id_not]].catclass+'');
				/*Adiciona a classe com os estilos da categoria, escolhida anteriormente, à seta da notícia grande
				 ou média.*/
				$('#arrow' + id_not.toString()).css('border-color', 'transparent '+ db[ids_noticias[id_not]].arrowclass + ' transparent transparent');
				$('#box-img' + id_not.toString()).css('background-color', ''+ db[ids_noticias[id_not]].catclass+'');
			}
		}
		//Função "Inserir Conteúdo da Notícia" para inserir as informações da notícia em questão.
		function ins_cont_not(size)//aqui se coloca o conteudo ex: categoria,titulo,texto. data,mes,
		{
			/*Adiciona a data da notícia junto à categoria dela. Esta data é apenas para teste, a real data estará
			 salva junto à notícia em questão no Banco de Dados.*/
			$('#cat' + id_not.toString()).append(db[ids_noticias[id_not]].day + "." + db[ids_noticias[id_not]].month + " | " +
				db[ids_noticias[id_not]].category);
			//Variável 'ttl' que receberá o título da notícia.
			var ttl = db[ids_noticias[id_not]].title + ".";

			var img_thumb = "";
			//Verifica se o número de caracteres do título respeita o limite de 61 caracteres.
			if (ttl.length > 57)
			{
				/*Adiciona o título da notícia removendo os caracteres excedidos, adicionando redicências ao final do
				 título da notícia. Este título é apenas para teste, o real título estará salvo junto à notícia em
				 questão no Banco de Dados.*/
				$('#ttl' + id_not.toString()).append(ttl.substring(0, 58) + "...");
			}
			else
			{
				/*Apenas adiciona o título. Este título é apenas para teste, o real título estará salvo junto à
				 notícia em questão no Banco de Dados.*/
				$('#ttl' + id_not.toString()).append(ttl);
			}

			switch (size)
			{
				case 3:
					conteudo_resumido = db[ids_noticias[id_not]].conteudo.substring(0, 62) + '...';
					img_thumb =  db[ids_noticias[id_not]].image_thumb['pequena'];
					$('#img' + id_not.toString()).attr('src', img_thumb);
					break;
					//Caso seja uma notícia pequena retorna a descrição no limite de caracteres da notícia pequena.
				case 6:
					conteudo_resumido = db[ids_noticias[id_not]].conteudo.substring(0, 347) + '...';
					img_thumb =  db[ids_noticias[id_not]].image_thumb['media'];
					$('#img' + id_not.toString()).attr('src', img_thumb);
					break;
				case 9:
					conteudo_resumido = db[ids_noticias[id_not]].conteudo.substring(0, 347) + '...';
					img_thumb =  db[ids_noticias[id_not]].image_thumb['grande'];
					$('#img' + id_not.toString()).attr('src', img_thumb);
					break;
			}

			$('#cont' + id_not.toString()).append(conteudo_resumido);
		}
		/*Função "Carregar Coluna da Notícia" para carregar um Bloco de notícia de acordo com o tamanho da coluna
		 do Bootstrap.*/
		function load_col(tam_not)
		{
			//Variável 'noticia' que receberá a estrutura HTML de cada tamanho da notícia.
			var noticia = "";
			/*Cada notícia terá um ID diferente, mas sequencial conforme forem sendo adicionadas mais notícias, ou
			 seja, dinâmico. Isso não será necessário após conectar ao Banco de Dados, tendo, então, apenas trocar a
			 variável em seus respectivos lugares, conforme pode ser visualizado nos códigos HTML abaixo. Apenas
			 estão sendo usados IDs para identificar Notícia, Imagem, Texto do Título, Texto do Conteúdo/Descrição e
			 Seta no caso das notícias grandes e médias.*/
			switch (tam_not)
			{
				//Variável 'noticia' recebendo estrutura da notícia pequena.
				case 3:
					noticia =
						'<div id="not{0}" class="row{1} col-lg-3 col-height box-not box-small">\
							<div class="noticia-peq">\
								<div>\
									<a href="{3}" class="noticia-peq-link">\
										<img id="img{0}" src="{2}"\
										\
										class="img-responsive noticia-peq-img">\
										<div class="row">\
											<div class="col-lg-12 noticia-peq-cat-padd">\
												<div id="text{0}" class="noticia-peq-cat">\
													<p id="cat{0}" class="noticia-cat">\
													</p>\
													<div class="noticia-peq-symbol">\
														9\
													</div>\
												</div>\
											</div>\
										</div>\
									</a>\
								</div>\
							</div>\
							<div>\
								<div>\
									<a href="noticia-aberta.html" class="noticia-peq-link">\
										<div id="cont{0}" class="noticia-peq-text">\
											<p id="ttl{0}" class="noticia-peq-ttl">\
											</p>\
										</div>\
									</a>\
								</div>\
							</div>\
						</div>'.fmt(id_not, id_row, noticiasWordpress[id_not].image_thumb.pequena,noticiasWordpress[id_not].link);
					break;
				//Variável 'noticia' recebendo estrutura da notícia média.
				case 6:
					noticia =
						'<div id="not{0}" class="row{1} col-lg-6 col-height box-not box-meddium">\
							<a href="{3}">\
								<div id="box-img{0}" class="col-lg-6 noticia noticia-img-of">\
									<div class="noticia-med">\
										<img id="img{0}" src="{2}" \
										class="img-responsive noticia-img">\
									</div>\
								</div>\
								<div class="col-lg-6 noticia">\
									<div id="cont{0}" class="noticia-text col-height">\
										<p id="cat{0}" class="noticia-cat">\
										</p>\
										<p id="ttl{0}" class="noticia-ttl">\
										</p>\
										<div id="arrow{0}" class="arrow">\
										</div>\
									</div>\
								</div>\
							</a>\
						</div>'.fmt(id_not, id_row, noticiasWordpress[id_not].image_thumb.media,noticiasWordpress[id_not].link);
					break;
				//Variável 'noticia' recebendo estrutura da notícia grande.
				case 9:
					noticia =
						'<div id="not{0}" class="row{1} col-lg-9 col-height box-not box-big">\
							<a href="{3}">\
								<div id="box-img{0}" class="col-lg-8 noticia noticia-img-of">\
									<img id="img{0}" src="{2}" \
									class="img-responsive noticia-img">\
								</div>\
								<div class="col-lg-4 noticia">\
									<div id="cont{0}" class="noticia-text col-height">\
										<p id="cat{0}" class="noticia-cat">\
										</p>\
										<p id="ttl{0}" class="noticia-ttl">\
										</p>\
										<div id="arrow{0}" class="arrow">\
										</div>\
									</div>\
								</div>\
							</a>\
						</div>'.fmt(id_not, id_row, noticiasWordpress[id_not].image_thumb.grande,  noticiasWordpress[id_not].link);
					break;
			}
			//Retorna a variável 'noticia' com a estrutura previamente carregada para ser inserida na página.
			return noticia;
		}
		/*Função "Carregar Linha de Notícias" para carregar uma linha de notícias, ou seja, carrega notícias até que
		 preencha toda as 12 colunas do Bootstrap.*/
		function load_row()
		{
			//Variável 'tot_row' que servirá para limitar até as 12 colunas do Bootstrap.
			var tot_row = 0;
			//Realizará tudo dentro 'while' enquanto não preencher todas as 12 colunas do Bootstrap com notícias.
			while (tot_row < 12 && limite == false)
			{                
               
				/*Variável 'tam_not' que receberá o tamanho da notícia sem permitir que sobre ou ultrapasse o limite
				 de 12 tamnots do Bootstrap. Cada valor de 'tam_not' é o tamanho da notícia, ou seja, grande, médio ou
				 pequeno*/
				var tam_not = ord_col();
				//Variável 'noticia' que carregará uma notícia no tamanho especificado pela variável 'tam_not';
				var noticia = load_col(tam_not);
				//Soma o total de tamnots adicionadas na linha com a tam_not gerada anteriormente.
				tot_row += tam_not;
				//Insere a notícia contida na variável 'noticia' na página.
				$("#noticias").append(noticia);
				//Carrega os estilos da categoria selecionada.
				cat_not();
				//Aplica o estilo carregado pela função 'cat_not()' na última notícia inserida.
				ins_cat_not(tam_not);
				//Insere o conteúdo da última notícia inserida.
				ins_cont_not(tam_not);
				//Verifica se alcançou o limite de colunas do Bootstrap.
				if (tot_row == 12)
				{
					//Remove a margem direita da última notícia da linha de notícias.
					$('#not' + id_not.toString()).css('margin-right', '0');
				};
				/*Após todos esses processos a variável 'id_not' é acrescida em '1' para que a próxima notícia a ser
				 adicionada tenha um ID diferente, porém, sequencial.*/
				id_not++;
                contadora_noticias ++;
                 if(contadora_noticias == quantidadeNoticias) {
                    limite = true;
                }
			}
			/*Após todos esses processos a variável 'id_row' é acrescida em '1' para que a próxima linha de notícias
			 a ser adicionada tenha um ID diferente, porém, sequencial.*/
			id_row++;
		}
		/*Função "Ordenar/Gerar Colunas" para gerar e organizar as colunas (notícias) de forma que não ultrapasse
		 o limite de 12 colunas do Bootstrap.*/
		function ord_col()
		{
			//Variável 'news' que servirá para receber o tamanho da notícia gerada pelo cálculo.
			var news;
			/*Verifica se o número de notícias é maior que 9 (8 porque a variável inicia com o valor 0) para saber
			 se deve gerar notícias aleatórias ou de acordo com a ordem do PSD.*/
			if (cont > 8)
			{
				//Repetirá o calculo até que o valor gerado esteja dentro do limite de 12 colunas do Bootstrap.
				do
				{
					//Variável 'news' recebendo o tamanho da notícia gerada pelo cálculo.
					news = Math.floor((Math.random() * 2.5)) * 3 + 3;
				}
					//Verifica se o tamanho da notícia gerada cabe dentro do limite de 12 colunas do Bootstrap.
				while (col + news > 12);
			}
			else
			{
				//Variável 'news' recebendo o tamanho da notícia gerada na ordem do PSD.
				news = cols[cont];
				/*Variável 'cont' sendo acrescentada para que a próxima notícia seja do tamanho correto de acordo com
				 o PSD.*/
				cont++;
			}
			/*Quando a repetição do cálculo respeitar os limites a variável 'col' será acrescentada com o novo valor
			 gerado.*/
			col += news;
			//Quando o valor de 'col' é igual a '12' significa que completou uma linha de notícias.
			if (col == 12)
			{
				//Sendo assim a variável 'col' é resetada, para que repita o processo para uma nova linha.
				col = 0;
				//O contador de linhas de notícias, então, é acrescentado de mais '1'.
				lin++;
			}
			/*Após respeitar todas as condições anteriores é retornada a variável 'news' com o tamanho da notícia que
			 foi gerado.*/
			return news;
		}
		//Função "Receber Descrição" para limitar o número de caracteres da descrição da notícia.
		function rece_desc(size)
		{
			console.log(id_not);
			//Verifica o tamanho da notícia.
			switch (size)
			{
				case 3:
					//Caso seja uma notícia pequena retorna a descrição no limite de caracteres da notícia pequena.
					return (conteudo.substring(0, 62) + '...');
				case 6:
					//Caso seja uma notícia média retorna a descrição no limite de caracteres da notícia média.
					return (conteudo.substring(0, 347) + '...');
				case 9:
					//Caso seja uma notícia grande retorna a descrição no limite de caracteres da notícia grande.
					return (conteudo.substring(0, 347) + '...');
			}
		}
		//Função "Configurações ao Carregar" para aplicar todas as configurações da página ao carregar.
		function sets_onload() {
			//Carrega, previamente, duas linhas de notícias.
			load_row();
            load_row();
            load_row();
			/*if (cont_noticias > 6) {
				load_row();
			}*/
			//Oculta o botão 'Carregar mais Notícias'.
			$('#loadmorenews').hide();
		}
		/*Função "Escolher Categoria" guarda na variável o index da opção de categoria de notícia selecionada e
		 carrega as linhas de notícias com o filtro já aplicado de acordo com a opção escolhida.*/
		this.choose_cat = function choose_cat(cat)
		{
			//Salva a opção escolhida no 'ComboBox' para que as notícias sejam filtradas.
			sel_cat = cat;
			//Remove todas as notícias da página para que sejam incluídas as notícias respeitando o filtro.
			$('#noticias').empty();
			//Remove o aviso de que todas as notícias foram carregadas.
			$('#aviso').empty();
			/*Remove o foco do 'ComboBox' para que não sofra interferência caso esteja sendo usado o teclado para
			 descer ou subir a página.*/
			$('#catbox').blur();
			//Diz que o número de linhas agora é 0, pois foram removidas todas as linhas de notícias.
			lin = 0;
			//Diz que o limite de linhas agora é 9, pois foram removidas todas as linhas de notícias.
			lim = 9;
			/*Verifica se a opção escolhida é 'Todas as Categorias' para que gere o Layout do PSD antes do Layout
			 aleatório.*/
			if (cat == 5)
			{
				//Diz que não há as 9 primeiras notícias, que deverão estar no Layout do PSD.
				cont = 0;
			}
			//Carrega 3 linhas de notícias aplicando ou não o filtro de acordo com a opção escolhida no 'ComboBox'.
			load_row();
			load_row();
			load_row();
		}
		//Função "Carregar mais Notícias" para carregar mais notícias ao clicar no botão.
		this.load_more = function load_more()
		{
			//Verifica se o número de linhas chegou a 99.
			if (lim < 99)
			{
				//Aumenta o limite de linhas de notícias que poderão ser carregadas.
				lim += 9;
				//Carrega 3 linhas de notícias aplicando ou não o filtro de acordo com a opção escolhida no 'ComboBox'.
				load_row();
				load_row();
				/*Acrescenta a variável 'load_more_clicks' em '1' para saber quantas vezes o botão 'Carregar mais' já
				 foi clicado. Desta forma sabe-se o junto à variável 'lim' a quantidade de linhas de notícias que já
				 foram carregadas.*/
				load_more_clicks++;
				//Oculta o botão após o click.
				$('#loadmorenews').hide();
			}
		}
		/*Função "Inicializar Recursos" para inicializar os principais recursos que serão utilizados durante o
		 carregamento da página.*/
		this.init = function init()
		{
			global_vars();
			sets_onload();
			//Evento Scroll para carregar notícias ao descer a página.
			$(document).scroll(load_news);
		}
	}
	this.init = function init()
	{
		$("document").ready
		(
			function()
			{
				self.gerarNoticias.init();
			}
		);
	}
}