var noticias = new function noticias()
{
	var self = this;
	var noticiasWordpress = JSON.parse(noticias_by_wordpress_JSON_encoded);
	self.gerarNoticias = new function gerarNoticias()
	{
		/*Inicializa todas as variáveis que serão usadas ao longo da página.*/
		var global_vars = function global_vars()
		{
			/*Variável 'cols' com os tamanhos de notícias previamente estabelecidos nesta variável para gerar o
			 Layout na ordem do PSD.*/
			cols = [9, 3, 3, 3, 6, 3, 3, 3, 3];
			/*Variável 'cont' para saber se as 9 primeiras notícias, ou seja, as notícias do PSD, já foram
			 geradas.*/
			cont = 0;
			/*Variável 'filter_news' que saberá que notícias estarão sendo filtradas.*/
			filter_news = [];
			/*Inicialmente a variável 'filter_news' é preenchida com o valor 'true' em todas as posições para
			 indicar que as notícias deverão ser exibidas.*/
			// for (var x = 0; x < noticiasWordpress.length; x++)
			// {
			// 	Variável 'filter_news' sendo preenchida com o valor 'true'.
			// 	filter_news[x] = true;
			// }
			/*Variável 'filtering' que dirá se há filtro ou não.*/
			filtering = false;
			/*Variável 'id_row' (ID da Linha de Notícias) com um ID contativo para gerar um ID sequencial para cada
			 Linha de Notícias gerada.*/
			id_row = 0;
			/*Variável 'search' para saber as palavras-chave digitadas pelo usuário no campo de busca de notícias.*/
			key_words = '';
			/*Variável 'lin' (Linhas) usada para contar o números de linhas de Notícias.*/
			lin = 0;
			/*Variável 'lim' para definir o limite de linhas de notícias a serem carregadas.*/
			lim = 9;
			/*Variável 'limite' para definir quando atingiu o limite de notícias a serem exibidas.*/
			limite = false;
			/*Variável 'qtd_news' que contará a quantidade de notícias que serão carregadas, isso não significa que
			será a quantidade de notícias que serão exibidas.*/
			qtd_news = 0;
			/*Variável 'qtd_news_filtered' para saber a quantidade de notícias que foram filtradas.*/
			qtd_news_filtered = 0;
			/*Variável 'sel_cat' (Categoria Selecionada) que guarda a categoria de notícia selecionada. Começa com
			 'Todas as Categorias' pois é a primeira opção, indicando que nunca será carregada a página com
			 filtro.*/
			sel_cat = 'Todas as Categorias';
			/*Variável 'sel_arqmes' (Arquivo Mensal Selecionado) que guarda o mês da notícia selecionada. Começa com
			 'Arquivo Mensal' pois é a primeira opção, indicando que nunca será carregada a página com filtro.*/
			sel_arqmes = 'Arquivo Mensal';
			/*Variável 'total_col' usada para limitar ao número de colunas do bootstrap.*/
			total_col = 0;
			/*Variável 'total_not' que saberá o limite de notícias a serem exibidas.*/
			total_not = noticiasWordpress.length;
			/*Variável 'window_width' que armazena a largura da tela no momento que o site é carregado.*/
			window_width = $(document).width();
		}
		var load_news = function load_news()
		{
			/*Verifica se chegou ao final da página menos duas linhas de notícias, ou seja, irá sempre carregar duas
			 linhas de notícias abaixo de onde o usuário está visualizando, desde que respeite o limite máximo de
			 linhas que poderão ser exibidos.*/
			if (($(window).scrollTop() + $(window).height()) > ($(document).height() - 1080) && lin < lim)
			{
				/*Verifica se é a última linha de notícias que poderá ser carregada dentro do limite.*/
				if (lin + 1 == lim)
				{
					/*Verifica se o número de linhas chegou a 99.*/
					if (lim < 99)
					{
						/*Remove o foco do botão.*/
						$('#loadmorenews').blur();
						/*Exibe o botão de 'Carregar mais Notícias' ou de 'Próxima Página'.*/
						$('#loadmorenews').show();
					}
					else
					{
						/*Após alcançar o limite de 99 linhas de notícias é exibido no lugar do botão 'Carregar mais
						 Notícias' uma mensagem informando que foi atingido o limite máximo de notícias
						 carregadas.*/
						$('#aviso').append('Número máximo de notícias atingido.');
					}
				}
				/*Carrega uma linha de notícias ao alcançar um ponto determinado da página.*/
				load_row(1);
			}
		}
		/*Função 'Adicionar Categorias' adiciona todas as categorias de notícias disponíveis no Banco de Dados.*/
		function add_cats()
		{
			/*Variável 'added' que servirá para salvar as categorias que deverão se adicionadas no 'ComboBox' de
			 filtragem.*/
			var added = [];
			/*Variável 'verify' que servirá para saber se a categoria já foi adicionada à variável 'added'.*/
			var verify = false;
			/*Verifica todas as categorias de notícias carregadas do Banco de Dados.*/
			for (var add = 0; add < noticiasWordpress.length; add++)
			{
				/*Verifica todas as posições da variável 'added'.*/
				for (var x = 0; x < added.length; x++)
				{
					/*Verifica se em tal posição já possui a categoria em questão.*/
					if (added[x] == noticiasWordpress[add].category)
					{
						/*Caso sim, é dito que a categoria não deva ser adicionada à variável 'added'.*/
						verify = true;
					}
				}
				/*Verifica se a categoria em questão deverá ou não ser adicionada.*/
				if (verify != true)
				{
					/*Caso seja para ser adicionada é adicionada a categoria à variável 'added'.*/
					added[add] = noticiasWordpress[add].category;
				}
				else
				{
					/*Caso não seja para ser adicionada não é adicionada a categoria e afirma que deverá ser testada
					 a próxima categoria.*/
					verify = false;
				}
			}
			/*Ordena as categorias contidas na variável 'added'.*/
			added.sort();
			/*Adiciona todas as categorias contidas na variável 'added' ao 'ComboBox' de filtragem.*/
			for (var x = 0; x < added.length; x++)
			{
				/*Adicionando as categorias ao 'CoamboBox' de filtragem.*/
				$('#catbox').append('<option>' + added[x] + '</option>');
			};
		}
		/*Função "Inserir Categoria da Notícia" para aplicar o estilo da categoria.*/
		function ins_cat_not(size)
		{
			/*Verifica se a notícia é pequena.*/
			if (size == 480 || size == 3 || size == 800.06)
			{
				/*Adiciona a classe com os estilos da categoria, escolhida anteriormente, ao conteúdo/descrição da
				 notícia pequena.*/
				$('#text' + noticiasWordpress[qtd_news].id_not.toString()).css('background-color', noticiasWordpress[qtd_news].cor_categoria);
			}
			else
			{
				/*Adiciona a classe com os estilos da categoria, escolhida anteriormente, ao conteúdo/descrição da
				 notícia grande ou média.*/
				$('#cont' + noticiasWordpress[qtd_news].id_not.toString()).css('background-color', noticiasWordpress[qtd_news].cor_categoria);
				/*Adiciona a classe com os estilos da categoria, escolhida anteriormente, à seta da notícia grande
				 ou média.*/
				$('#arrow' + noticiasWordpress[qtd_news].id_not.toString()).css('border-color', 'transparent '+ noticiasWordpress[qtd_news].cor_categoria + ' transparent transparent');
				$('#box-img' + noticiasWordpress[qtd_news].id_not.toString()).css('background-color', noticiasWordpress[qtd_news].cor_categoria);
			}
		}
		/*Função "Inserir Conteúdo da Notícia" para inserir o conteúdo da notícia em questão.*/
		function ins_cont_not(size)
		{
			/*Adiciona a data da notícia junto à categoria dela. Esta data é apenas para teste, a real data estará
			 salva junto à notícia em questão no Banco de Dados.*/
			$('#cat' + noticiasWordpress[qtd_news].id_not.toString()).append(noticiasWordpress[qtd_news].day + "." + noticiasWordpress[qtd_news].month + " | " + noticiasWordpress[qtd_news].category);
			/*Verifica se o número de caracteres do título respeita o limite de 61 caracteres.*/
			if (noticiasWordpress[qtd_news].title.length > 57)
			{
				/*Adiciona o título da notícia removendo os caracteres excedidos, adicionando redicências ao final
				 do título da notícia. Este título é apenas para teste, o real título estará salvo junto à notícia
				 em questão no Banco de Dados.*/
				$('#ttl' + noticiasWordpress[qtd_news].id_not.toString()).append(noticiasWordpress[qtd_news].title.substring(0, 58) + "...");
			}
			else
			{
				/*Apenas adiciona o título. Este título é apenas para teste, o real título estará salvo junto à
				 notícia em questão no Banco de Dados.*/
				$('#ttl' + noticiasWordpress[qtd_news].id_not.toString()).append(noticiasWordpress[qtd_news].title);
			}
			/*Verifica o tamanho da notícia para saber como o conteúdo deverá ser inserido.*/
			switch (size)
			{
				case 480:
					/*Resume o conteúdo da notícia para que caiba na notícia responsiva de 480px.*/
					conteudo_resumido = noticiasWordpress[qtd_news].conteudo.substring(0, 62) + '...';
					/*Coloca a imagem da notícia responsiva de 480px.*/
					$('#img' + noticiasWordpress[qtd_news].id_not.toString()).attr('src', noticiasWordpress[qtd_news].image_thumb['grande']);
					break;
				case 640:
					/*Resume o conteúdo da notícia para que caiba na notícia responsiva de 640px.*/
					conteudo_resumido = noticiasWordpress[qtd_news].conteudo.substring(0, 250) + '...';
					/*Coloca a imagem da notícia responsiva de 640px.*/
					$('#img' + noticiasWordpress[qtd_news].id_not.toString()).attr('src', noticiasWordpress[qtd_news].image_thumb['media']);
					break;
				case 800.06:
					/*Resume o conteúdo da notícia para que caiba na notícia responsiva pequena de 800px.*/
					conteudo_resumido = noticiasWordpress[qtd_news].conteudo.substring(0, 62) + '...';
					/*Coloca a imagem da notícia responsiva pequena de 800px.*/
					$('#img' + noticiasWordpress[qtd_news].id_not.toString()).attr('src', noticiasWordpress[qtd_news].image_thumb['grande']);
					break;
				case 800.12:
					/*Resume o conteúdo da notícia para que caiba na notícia responsiva grande de 800px.*/
					conteudo_resumido = noticiasWordpress[qtd_news].conteudo.substring(0, 200) + '...';
					/*Coloca a imagem da notícia responsiva grande de 800px.*/
					$('#img' + noticiasWordpress[qtd_news].id_not.toString()).attr('src', noticiasWordpress[qtd_news].image_thumb['grande']);
					break;
				case 3:
					/*Resume o conteúdo da notícia para que caiba na notícia pequena.*/
					conteudo_resumido = noticiasWordpress[qtd_news].conteudo.substring(0, 62) + '...';
					/*Coloca a imagem da notícia pequena.*/
					$('#img' + noticiasWordpress[qtd_news].id_not.toString()).attr('src', noticiasWordpress[qtd_news].image_thumb['pequena']);
					break;
				case 6:
					/*Resume o conteúdo da notícia para que caiba na notícia média.*/
					conteudo_resumido = noticiasWordpress[qtd_news].conteudo.substring(0, 250) + '...';
					/*Coloca a imagem da notícia média.*/
					$('#img' + noticiasWordpress[qtd_news].id_not.toString()).attr('src', noticiasWordpress[qtd_news].image_thumb['media']);
					break;
				case 9:
					/*Resume o conteúdo da notícia para que caiba na notícia grande.*/
					conteudo_resumido = noticiasWordpress[qtd_news].conteudo.substring(0, 250) + '...';
					/*Coloca a imagem da notícia grande.*/
					$('#img' + noticiasWordpress[qtd_news].id_not.toString()).attr('src', noticiasWordpress[qtd_news].image_thumb['grande']);
					break;
			}
			/*Coloca o conteúdo resumido na notícia.*/
			$('#cont' + noticiasWordpress[qtd_news].id_not.toString()).append(conteudo_resumido);
		}
		/*Função "Carregar Coluna da Notícia" para carregar um Bloco de notícia de acordo com o tamanho da coluna
		 do Bootstrap.*/
		function load_col(tam_not)
		{
			/*Variável 'noticia' que receberá a estrutura HTML de cada tamanho da notícia.*/
			var noticia = "";
			/*Cada notícia terá um ID diferente, mas sequencial conforme forem sendo adicionadas mais notícias, ou
			 seja, dinâmico. Isso não será necessário após conectar ao Banco de Dados, tendo, então, apenas trocar a
			 variável em seus respectivos lugares, conforme pode ser visualizado nos códigos HTML abaixo. Apenas
			 estão sendo usados IDs para identificar Notícia, Imagem, Texto do Título, Texto do Conteúdo/Descrição e
			 Seta no caso das notícias grandes e médias.*/
			switch (tam_not)
			{
				/*Variável 'noticia' recebendo estrutura da notícia responsiva para celulares em posição retrato.*/
				case 480:
					noticia =
						'<div id="not{0}" class="row{1} col-xs-12 col-height box-not">\
							<a href="{3}" class="noticia-peq-link">\
								<div class="noticia-peq">\
									<div>\
										<img id="img{0}" src="{2}"\
										\
										class="img-responsive noticia-peq-img">\
										<div class="row">\
											<div class="col-xs-12 noticia-peq-cat-padd">\
												<div id="text{0}" class="noticia-peq-cat">\
													<p id="cat{0}" class="noticia-cat">\
													</p>\
													<div class="noticia-peq-symbol">\
														9\
													</div>\
												</div>\
											</div>\
										</div>\
									</div>\
								</div>\
								<div>\
									<div>\
										<div id="cont{0}" class="noticia-peq-text">\
											<p id="ttl{0}" class="noticia-peq-ttl">\
											</p>\
										</div>\
									</div>\
								</div>\
							</a>\
						</div>'.fmt(noticiasWordpress[qtd_news].id_not, id_row, noticiasWordpress[qtd_news].image_thumb.grande, noticiasWordpress[qtd_news].link);
					break;
				/*Variável 'noticia' recebendo estrutura da notícia responsiva para celulares em posição paisagem.*/
				case 640:
					noticia =
						'<div id="not{0}" class="row{1} col-xs-12 col-height box-not">\
							<a href="{3}">\
								<div id="box-img{0}" class="col-xs-6 noticia noticia-img-of">\
									<div class="noticia-med">\
										<img id="img{0}" src="{2}" \
										class="img-responsive noticia-img">\
									</div>\
								</div>\
								<div class="col-xs-6 noticia">\
									<div id="cont{0}" class="noticia-text col-height">\
										<div id="arrow{0}" class="arrow">\
										</div>\
										<p id="cat{0}" class="noticia-cat">\
										</p>\
										<p id="ttl{0}" class="noticia-ttl">\
										</p>\
									</div>\
								</div>\
							</a>\
						</div>'.fmt(noticiasWordpress[qtd_news].id_not, id_row, noticiasWordpress[qtd_news].image_thumb.media, noticiasWordpress[qtd_news].link);
					break;
				/*Variável 'noticia' recebendo estrutura da notícia responsiva pequena para tablets em posição
				retrato.*/
				case 800.06:
					noticia =
						'<div id="not{0}" class="row{1} col-xs-6 col-height box-not">\
							<a href="{3}" class="noticia-peq-link">\
								<div class="noticia-peq">\
									<div>\
										<img id="img{0}" src="{2}"\
										\
										class="img-responsive noticia-peq-img">\
										<div class="row">\
											<div class="col-xs-12 noticia-peq-cat-padd">\
												<div id="text{0}" class="noticia-peq-cat">\
													<p id="cat{0}" class="noticia-cat">\
													</p>\
													<div class="noticia-peq-symbol">\
														9\
													</div>\
												</div>\
											</div>\
										</div>\
									</div>\
								</div>\
								<div>\
									<div>\
										<div id="cont{0}" class="noticia-peq-text">\
											<p id="ttl{0}" class="noticia-peq-ttl">\
											</p>\
										</div>\
									</div>\
								</div>\
							</a>\
						</div>'.fmt(noticiasWordpress[qtd_news].id_not, id_row, noticiasWordpress[qtd_news].image_thumb.grande, noticiasWordpress[qtd_news].link);
					break;
				/*Variável 'noticia' recebendo estrutura da notícia responsiva grande para tablets em posição
				retrato.*/
				case 800.12:
					noticia =
						'<div id="not{0}" class="row{1} col-xs-12 col-height box-not">\
							<a href="{3}">\
								<div id="box-img{0}" class="col-xs-7 noticia noticia-img-of">\
									<img id="img{0}" src="{2}" \
									class="img-responsive noticia-img">\
								</div>\
								<div class="col-xs-5 noticia">\
									<div id="cont{0}" class="noticia-text col-height">\
										<div id="arrow{0}" class="arrow">\
										</div>\
										<p id="cat{0}" class="noticia-cat">\
										</p>\
										<p id="ttl{0}" class="noticia-ttl">\
										</p>\
									</div>\
								</div>\
							</a>\
						</div>'.fmt(noticiasWordpress[qtd_news].id_not, id_row, noticiasWordpress[qtd_news].image_thumb.grande, noticiasWordpress[qtd_news].link);
					break;
				/*Variável 'noticia' recebendo estrutura da notícia pequena.*/
				case 3:
					noticia =
						'<div id="not{0}" class="row{1} col-md-3 col-height box-not box-small">\
							<a href="{3}" class="noticia-peq-link">\
								<div class="noticia-peq">\
									<div>\
										<img id="img{0}" src="{2}"\
										\
										class="img-responsive noticia-peq-img">\
										<div class="row">\
											<div class="col-md-12 noticia-peq-cat-padd">\
												<div id="text{0}" class="noticia-peq-cat">\
													<p id="cat{0}" class="noticia-cat">\
													</p>\
													<div class="noticia-peq-symbol">\
														9\
													</div>\
												</div>\
											</div>\
										</div>\
									</div>\
								</div>\
								<div>\
									<div>\
										<div id="cont{0}" class="noticia-peq-text">\
											<p id="ttl{0}" class="noticia-peq-ttl">\
											</p>\
										</div>\
									</div>\
								</div>\
							</a>\
						</div>'.fmt(noticiasWordpress[qtd_news].id_not, id_row, noticiasWordpress[qtd_news].image_thumb.pequena, noticiasWordpress[qtd_news].link);
					break;
				/*Variável 'noticia' recebendo estrutura da notícia média.*/
				case 6:
					noticia =
						'<div id="not{0}" class="row{1} col-md-6 col-height box-not box-meddium">\
							<a href="{3}">\
								<div id="box-img{0}" class="col-md-6 noticia noticia-img-of">\
									<div class="noticia-med">\
										<img id="img{0}" src="{2}" \
										class="img-responsive noticia-img">\
									</div>\
								</div>\
								<div class="col-md-6 noticia">\
									<div id="cont{0}" class="noticia-text col-height">\
										<div id="arrow{0}" class="arrow">\
										</div>\
										<p id="cat{0}" class="noticia-cat">\
										</p>\
										<p id="ttl{0}" class="noticia-ttl">\
										</p>\
									</div>\
								</div>\
							</a>\
						</div>'.fmt(noticiasWordpress[qtd_news].id_not, id_row, noticiasWordpress[qtd_news].image_thumb.media, noticiasWordpress[qtd_news].link);
					break;
				/*Variável 'noticia' recebendo estrutura da notícia grande.*/
				case 9:
					noticia =
						'<div id="not{0}" class="row{1} col-md-9 col-height box-not box-big">\
							<a href="{3}">\
								<div id="box-img{0}" class="col-md-8 noticia noticia-img-of">\
									<img id="img{0}" src="{2}" \
									class="img-responsive noticia-img">\
								</div>\
								<div class="col-md-4 noticia">\
									<div id="cont{0}" class="noticia-text col-height">\
										<div id="arrow{0}" class="arrow">\
										</div>\
										<p id="cat{0}" class="noticia-cat">\
										</p>\
										<p id="ttl{0}" class="noticia-ttl">\
										</p>\
									</div>\
								</div>\
							</a>\
						</div>'.fmt(noticiasWordpress[qtd_news].id_not, id_row, noticiasWordpress[qtd_news].image_thumb.grande, noticiasWordpress[qtd_news].link);
					break;
			}
			/*Retorna a variável 'noticia' com a estrutura previamente carregada para ser inserida na página.*/
			return noticia;
		}
		/*Função "Carregar Linha de Notícias" para carregar uma linha de notícias, ou seja, carrega notícias até
		 que preencha toda as 12 colunas do Bootstrap.*/
		function load_row(times)
		{
			/*Cria a quantidade indica pelo parâmetro de linhas de notícias.*/
			for (var x = 1; x <= times; x++)
			{
				/*Variável 'tot_row' que servirá para limitar até as 12 colunas do Bootstrap.*/
				var tot_row = 0;
				/*Variável 'loaded_news' que servirá para saber a quantidade de notícias que foram exibidas.*/
				var loaded_news = 0;
				/*Realizará tudo dentro 'while' enquanto não preencher todas as 12 colunas do Bootstrap com
				notícias.*/
				while (tot_row < 12 && limite == false)
				{
					/*Verifica se tal notícia deverá ou não ser exibida dependendo dos valores dos filtros.*/
					if (filter_news[qtd_news] == true)
					{
						/*Variável 'tam_not' que receberá o tamanho da notícia sem permitir que sobre ou
						 ultrapasse o limite de 12 tamnots do Bootstrap. Cada valor de 'tam_not' é o tamanho da
						 notícia, ou seja, grande, médio ou pequeno*/
						var tam_not = ord_col();
						/*Verifica se o tamanho de notícia gerado é menor que 10, pois não há notícias com 10 ou
						 mais colunas do Bootstrap.*/
						if (tam_not[1] < 10)
						{
							/*Caso a notícia tenha menos de 10 colunas do Bootstrap, significa que caberá mais de
							 uma notícia na mesma linha, então é somado à variável a quantidade de colunas do
							 Bootstrap que já foram inseridas na mesma linha.*/
							tot_row += tam_not[1];
						}
						else
						{
							/*Afirma que o tamanho de notícia gerado é de uma notícia de 12 colunas, ou seja,
							 uma única notícia preencherá toda a linha de notícias.*/
							tot_row = 12;
						};
						/*Insere a notícia no tamanho especificado pela variável 'tam_not' na página.*/
						$("#noticias").append(load_col(tam_not[0]));
						/*Aplica o estilo carregado pela função 'cat_not()' na última notícia inserida.*/
						ins_cat_not(tam_not[0]);
						/*Insere o conteúdo da última notícia inserida.*/
						ins_cont_not(tam_not[0]);
						/*Diz que foi exibida mais uma notícia.*/
						loaded_news++;
						/*Variável que conta a quantidade de notícias que já foram exibidas.*/
						qtd_news_filtered++;
						/*Verifica se a quantidade de notícias exibidas é igual a quantidade de notícias disponíveis
						no filtro selecionado.*/
						if ((loaded_news == total_not || qtd_news_filtered == total_not) && filtering == true)
						{
							/*Afirma que foi alcançado o limite de notícias a serem carregadas do banco de dados.*/
							limite = true;
							/*Volta o valor inicial para que a próxima vez que for carregada mais notícias deverá
							 contar novamente a quantidade de notícias.*/
							qtd_news_filtered = 0;
							/*Informa que todas as notícias no filtro selecionado já foram exibidas.*/
							$('#aviso').empty().append('Todas as notícias no filtro selecionado já foram exibidas.');
						}
					};
					/*Verifica se a quantidade de notícias processadas é igual a quantidade de notícias disponíveis
					 no banco de dados.*/
					if (qtd_news + 1 == total_not && filtering == false || total_not == 0)
					{
						/*Afirma que foi alcançado o limite de notícias a serem carregadas do banco de dados.*/
						limite = true;
						/*Volta o valor inicial para que a próxima vez que for carregada mais notícias deverá contar
						novamente a quantidade de notícias.*/
						qtd_news_filtered = 0;
						/*Verifica se na filtragem tiveram notícias a serem exibidas.*/
						if (total_not == 0)
						{
							/*Caso não, informa que há notícias no filtro selecionado para serem exibidas.*/
							$('#aviso').empty().append('Não há notícias no filtro selecionado.');
						}
						else
						{
							/*Caso sim, informa que todas as notícias já foram exibidas.*/
							$('#aviso').empty().append('Todas as notícias já foram exibidas.');
						};
					}
					/*Verifica se alcançou o limite de colunas do Bootstrap ou o limite de notícias disponíveis.*/
					if (tot_row == 12 || limite == true)
					{
						/*Remove a margem direita da última notícia da linha de notícias.*/
						$('#not' + noticiasWordpress[qtd_news].id_not.toString()).css('margin-right', '0');
						/*Zera o contador de colunas do Bootstrap, pois já foram inseridas todas as 12 colunas ou
						 porque já foi atingido o limite de notícias disponíveis a serem exibidas, significando
						 que sobrará um espaço à direita da última notícia exibida.*/
						total_col = 0;
						/*Afirma que foi concluída mais uma linha de notícias.*/
						lin++;
					};
					/*Variável que conta a quantidade de notícias que já foram processadas.*/
					qtd_news++;
				}
				/*Após todos esses processos a variável 'id_row' é acrescida em '1' para que a próxima linha de
				notícias a ser adicionada tenha um ID diferente, porém, sequencial.*/
				id_row++;
			};
			$('.box-not').each(function(contador)
			{
				setTimeout(function ()
				{
					$('.box-not:nth-child(' + (contador + 1) + ')').css('opacity', '1');
				}, 150 * contador);
			});
		}
		/*Função "Ordenar/Gerar Colunas" para gerar e organizar as colunas (notícias) de forma que não ultrapasse
		 o limite de 12 colunas do Bootstrap.*/
		function ord_col()
		{
			/*Variável 'news' que servirá para receber o tamanho da notícia gerada pelo cálculo.*/
			var news = 0;
			var col_size = 0;
			/*Verifica se o dispositivo é um celular, se é de viewport máximo de 480px e se está em posição
			 retrato.*/
			if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(document).width() <= 1024)
			{
				/*Afirma que a tela possui no máximo 1024px*/
				news = 1024;
				/*Realiza as verificações para saber se é menor que 1024px*/
				if ($(document).width() <= 800 && $(document).width() > 640)
				{
					do
					{
						/*Caso seja diz que a estrutura HTML deverá ser de tablet em posição retrato.*/
						news = (Math.floor(Math.random() * 1.5) / 10 + 0.1) * 0.6 + 800;
						col_size = Math.round((news - 800) * 100);
					}
					while (total_col + col_size > 12);
				};
				if ($(document).width() <= 640 && $(document).width() > 480)
				{
					/*Caso seja diz que a estrutura HTML deverá ser de celular em posição paisagem.*/
					news = 640;
					col_size = 12;
				};
				if ($(document).width() <= 480)
				{
					/*Caso seja diz que a estrutura HTML deverá ser de celular em posição retrato.*/
					news = 480;
					col_size = 12;
				};
			}
			else
			{
				/*Verifica se o número de notícias é maior que 9 (8 porque a variável inicia com o valor 0) para
				 saber se deve gerar notícias aleatórias ou de acordo com a ordem do PSD.*/
				if (cont > 8)
				{
					/*Repetirá o calculo até que o valor gerado esteja dentro do limite de 12 colunas do
					 Bootstrap.*/
					do
					{
						/*Variável 'news' recebendo o tamanho da notícia gerada pelo cálculo.*/
						news = Math.floor((Math.random() * 2.5)) * 3 + 3;
						col_size = news;
					}
					/*Verifica se o tamanho da notícia gerada cabe dentro do limite de 12 colunas do Bootstrap.*/
					while (total_col + col_size > 12);
				}
				else
				{
					/*Variável 'news' recebendo o tamanho da notícia gerada na ordem do PSD.*/
					news = cols[cont];
					col_size = cols[cont];
					/*Variável 'cont' sendo acrescentada para que a próxima notícia seja do tamanho correto de
					 acordo com o PSD.*/
					cont++;
				}
			}
			/*Quando a repetição do cálculo respeitar os limites a variável 'total_col' será acrescentada com o novo
			 valor gerado.*/
			total_col += col_size;
			/*Após respeitar todas as condições anteriores é retornada a variável 'news' identificando que tipo de
			 notícia que foi gerada, ou seja, se é responsiva ou não e, caso sim, em que resolução e a variável
			 'col_size' informando o tamanho desta mesma notícia para que seja calculada a quantidade de notícias
			 que foram inseridas em uma única linha do Bootstrap.*/
			return [news, col_size];
		}
		/*Função "Configurações ao Carregar" para aplicar todas as configurações da página ao carregar.*/
		function sets_onload()
		{
			filter();
			/*Carrega, previamente, três linhas de notícias.*/
			load_row(3);
			/*Oculta o botão 'Carregar mais Notícias'.*/
			$('#loadmorenews').hide();
			/*Adiciona as categorias de notícias no 'ComboBox' de filtragem de notícias.*/
			add_cats();
			$(window).on('resize', function()
			{
				if (window_width != $(document).width())
				{
					window_width = $(document).width();
					filter();
				};
			});
			/*Adiciona o evento que verificará se houve alguma mudança nos boxes de filtragem.*/
			$('#arqmesbox').on('change', function()
			{
				/*Chama a função que irá filtrar as notícias.*/
				filter();
			});
			/*Adiciona o evento que verificará se houve alguma mudança nos boxes de filtragem.*/
			$('#catbox').on('change', function()
			{
				/*Chama a função que irá filtrar as notícias.*/
				filter();
			});
			$('input.buscar').keyup(function(key)
			{
				/*Verifica o resto da divisão da quantidade de caracteres inseridos com 5 será 0, para que apenas
				aplique o filtro a cada 5 caracteres inseridos.*/
				if (this.value.length % 5 == 0)
				{
					/*Chamando a função encarregada de filtrar as notícias com o que o usuário digitou.*/
					filter();
				};
				if ($('input.buscar')[0].value == '' && (key.keyCode == 46 || key.keyCode == 8))
				{
					filter();
				};
			});
			/*Verifica se foi digitado alguma coisa no campo de busca de notícias.*/
			$('input.buscar').keypress(function(key)
			{
				/*Verifica se o botão pressionado é o botão 'Enter'.*/
				if (key.keyCode == 13)
				{
					/*Caso seja, executará o filtro para procurar a notícia desde que tenha sido digitado ao menos
					 5 letras.*/
					if ($('input.buscar')[0].value.length > 4 || $('input.buscar')[0].value == '')
					{
						/*Chamando a função encarregada de filtrar as notícias com o que o usuário digitou.*/
						filter();
					}
					/*Caso seja menos do que necessário, enviará uma menssagem ao usuário informando o usuário que
					 ele precisará digitar mais para que seja encontrada a(s) notícia(s) que ele deseja.*/
					else
					{
						/*Enviando a menssagem ao usuário.*/
						alert('Digite um mínimo de 5 letras para realizar a pesquisa.');
					};
				};
			});
			$('div.buscar').on('click', function()
			{
				/*Executará o filtro para procurar a notícia desde que tenha sido digitado ao menos 5 letras.*/
				if ($('input.buscar')[0].value.length > 4)
				{
					/*Chamando a função encarregada de filtrar as notícias com o que o usuário digitou.*/
					filter();
				}
				/*Caso seja menos do que necessário, enviará uma menssagem ao usuário informando o usuário que ele
				 precisará digitar mais para que seja encontrada a(s) notícia(s) que ele deseja.*/
				else
				{
					/*Enviando a menssagem ao usuário.*/
					alert('Digite um mínimo de 5 letras para realizar a pesquisa.');
				};
			});
		}
		/*Função "Escolher Categoria" guarda na variável o index da opção de categoria de notícia selecionada e
		 carrega as linhas de notícias com o filtro já aplicado de acordo com a opção escolhida.*/
		function filter()
		{
			/******************************************************************************************************\
			Legenda do filtro:
				I -> Igual
				D -> Diferente
				C -> Categoria
				A -> Arquivo Mensal
				B -> Busca
			Possíveis Combinações de Filtragem:
						 C A B
						 ↓ ↓ ↓
				1° CASO: I I I -> Obedece a Todos os Filtros;
				2° CASO: D I I -> Filtrado por 'Arquivo Mensal' e Busca;
				3° CASO: I D I -> Filtrado por 'Categoria' e 'Busca';
				4° CASO: I I D -> Filtrado por 'Categoria' e 'Arquivo Mensal';
				5° CASO: I D D -> Filtrado por 'Categoria';
				6° CASO: D I D -> Filtrado por 'Arquivo Mensal';
				7° CASO: D D I -> Filtrado por 'Busca';
				8° CASO: D D D -> Obedece a Nenhum dos Filtros;
			\******************************************************************************************************/
			/*Remove todas as notícias da página para que sejam incluídas as notícias respeitando o filtro.*/
			$('#noticias').empty();
			/*Remove o aviso de que todas as notícias foram carregadas.*/
			$('#aviso').empty();
			/*Remove o foco do 'ComboBox' para que não sofra interferência caso esteja sendo usado o teclado para
			 descer ou subir a página.*/
			$('#catbox').blur();
			/*Diz que o número de linhas agora é 0, pois foram removidas todas as linhas de notícias.*/
			lin = 0;
			/*Diz que o limite de linhas agora é 9, pois foram removidas todas as linhas de notícias.*/
			lim = 9;
			/*Diz que o limite do total de notícias não foi atingindo, pois foram removidas todas as notícias.*/
			limite = false;
			/*Afirma que a quantidade de notícias agora é zero.*/
			qtd_news = 0;
			/*Zera o contador de colunas do Bootstrap, pois todas as notícias foram removidas da tela.*/
			total_col = 0;
			/*Salva as palavras-chave digitadas pelo usuário no campo de busca de notícias.*/
			key_words = $('input.buscar')[0].value.toLowerCase();
			/*Salva a categoria escolhida no 'ComboBox' para que as notícias sejam filtradas.*/
			sel_cat = $('#catbox')[0].selectedOptions[0].value;
			/*Salva o arquivo mensal escolhido no 'ComboBox' para que as notícias sejam filtradas.*/
			sel_arqmes = $('#arqmesbox')[0].selectedOptions[0].value;
			/*Verifica se a opção escolhida é 'Todas as Categorias' para que gere o Layout do PSD antes do Layout
			 aleatório.*/
			if (sel_cat == 'Todas as Categorias' && sel_arqmes == 'Arquivo Mensal' && key_words == '')
			{
				/*Diz que não há as 9 primeiras notícias, que deverão estar no Layout do PSD.*/
				cont = 0;
				/*Afirma que não estará sendo filtrada.*/
				filtering = false;
				/*Diz que o total de notícias a serem exibidas será a quanidade de notícias disponíveis.*/
				total_not = noticiasWordpress.length;
				/*Variável 'filter_news' sendo preenchida com o valor 'true' em todas as posições para indicar que
				todas as notícias deverão ser exibidas.*/
				for (var x = 0; x < noticiasWordpress.length; x++)
				{
					/*Variável 'filter_news' sendo preenchida com o valor 'true'.*/
					filter_news[x] = true;
				}
			}
			else
			{
				/*Afirma que um filtro está selecionado.*/
				filtering = true;
				/*Variável 'news_filtered' para saber quantas notícias pertencem ao filtro selecionado.*/
				var news_filtered = 0;
				/*Verifica a categoria de todas as notícias disponíveis.*/
				for (var x = 0; x < noticiasWordpress.length; x++)
				{
					/*Afirma que não deverá ser exibida até que seja filtrada, e caso não seja filtrada funcionará
					 como o '8° CASO: D D D -> Obedece a Nenhum dos Filtros;' sendo então exibindo uma mensagem
					 avisando que não notícias no(s) filtro(s) selecionados.*/
					filter_news[x] = false;
					/*1° CASO: I I I -> Obedece a Todos os Filtros;*/
					if (noticiasWordpress[x].category == sel_cat && sel_cat != 'Todas as Categorias' &&
						noticiasWordpress[x].month == sel_arqmes && sel_arqmes != 'Arquivo Mensal' &&
						(noticiasWordpress[x].conteudo.toLowerCase().search(key_words) != -1 ||
						noticiasWordpress[x].title.toLowerCase().search(key_words) != -1) &&
						key_words != '')
					{
						/*Caso seja, afirma que a notícia com esta categoria deverá ser exibida.*/
						filter_news[x] = true;
						/*Diz que deverá ser exibida mais uma notícia.*/
						news_filtered++;
					};
					/*2° CASO: D I I -> Filtrado por 'Arquivo Mensal' e Busca;*/
					if (noticiasWordpress[x].category != sel_cat && sel_cat == 'Todas as Categorias' &&
						noticiasWordpress[x].month == sel_arqmes && sel_arqmes != 'Arquivo Mensal' &&
						(noticiasWordpress[x].conteudo.toLowerCase().search(key_words) != -1 ||
						noticiasWordpress[x].title.toLowerCase().search(key_words) != -1) &&
						key_words != '')
					{
						/*Caso seja, afirma que a notícia com este arquivo mensal deverá ser exibida.*/
						filter_news[x] = true;
						/*Diz que deverá ser exibida mais uma notícia.*/
						news_filtered++;
					};
					/*3° CASO: I D I -> Filtrado por 'Categoria' e 'Busca';*/
					if (noticiasWordpress[x].category == sel_cat && sel_cat != 'Todas as Categorias' &&
						noticiasWordpress[x].month != sel_arqmes && sel_arqmes == 'Arquivo Mensal' &&
						(noticiasWordpress[x].conteudo.toLowerCase().search(key_words) != -1 ||
						noticiasWordpress[x].title.toLowerCase().search(key_words) != -1) &&
						key_words != '')
					{
						/*Caso seja, afirma que a notícia com este arquivo mensal deverá ser exibida.*/
						filter_news[x] = true;
						/*Diz que deverá ser exibida mais uma notícia.*/
						news_filtered++;
					};
					/*4° CASO: I I D -> Filtrado por 'Categoria' e 'Arquivo Mensal';*/
					if (noticiasWordpress[x].category == sel_cat && sel_cat != 'Todas as Categorias' &&
						noticiasWordpress[x].month == sel_arqmes && sel_arqmes != 'Arquivo Mensal' &&
						(noticiasWordpress[x].conteudo.toLowerCase().search(key_words) != -1 ||
						noticiasWordpress[x].title.toLowerCase().search(key_words) != -1) &&
						key_words == '')
					{
						/*Caso seja, afirma que a notícia com este arquivo mensal deverá ser exibida.*/
						filter_news[x] = true;
						/*Diz que deverá ser exibida mais uma notícia.*/
						news_filtered++;
					};
					/*5° CASO: I D D -> Filtrado por 'Categoria';*/
					if (noticiasWordpress[x].category == sel_cat && sel_cat != 'Todas as Categorias' &&
						noticiasWordpress[x].month != sel_arqmes && sel_arqmes == 'Arquivo Mensal' &&
						(noticiasWordpress[x].conteudo.toLowerCase().search(key_words) != -1 ||
						noticiasWordpress[x].title.toLowerCase().search(key_words) != -1) &&
						key_words == '')
					{
						/*Caso seja, afirma que a notícia com este arquivo mensal deverá ser exibida.*/
						filter_news[x] = true;
						/*Diz que deverá ser exibida mais uma notícia.*/
						news_filtered++;
					};
					/*6° CASO: D I D -> Filtrado por 'Arquivo Mensal';*/
					if (noticiasWordpress[x].category != sel_cat && sel_cat == 'Todas as Categorias' &&
						noticiasWordpress[x].month == sel_arqmes && sel_arqmes != 'Arquivo Mensal' &&
						(noticiasWordpress[x].conteudo.toLowerCase().search(key_words) != -1 ||
						noticiasWordpress[x].title.toLowerCase().search(key_words) != -1) &&
						key_words == '')
					{
						/*Caso seja, afirma que a notícia com este arquivo mensal deverá ser exibida.*/
						filter_news[x] = true;
						/*Diz que deverá ser exibida mais uma notícia.*/
						news_filtered++;
					};
					/*7° CASO: D D I -> Filtrado por 'Busca';*/
					if (noticiasWordpress[x].category != sel_cat && sel_cat == 'Todas as Categorias' &&
						noticiasWordpress[x].month != sel_arqmes && sel_arqmes == 'Arquivo Mensal' &&
						(noticiasWordpress[x].conteudo.toLowerCase().search(key_words) != -1 ||
						noticiasWordpress[x].title.toLowerCase().search(key_words) != -1) &&
						key_words != '')
					{
						/*Caso seja, afirma que a notícia com este arquivo mensal deverá ser exibida.*/
						filter_news[x] = true;
						/*Diz que deverá ser exibida mais uma notícia.*/
						news_filtered++;
					};
				};
				total_not = news_filtered;
			}
			/*Carrega 3 linhas de notícias aplicando ou não o filtro de acordo com a opção escolhida no
			 'ComboBox'.*/
			load_row(3);
		}
		/*Função "Carregar mais Notícias" para carregar mais notícias ao clicar no botão.*/
		this.load_more = function load_more()
		{
			/*Verifica se o número de linhas chegou a 99.*/
			if (lim < 99)
			{
				/*Aumenta o limite de linhas de notícias que poderão ser carregadas.*/
				lim += 9;
				/*Carrega 2 linhas de notícias aplicando ou não o filtro de acordo com a opção escolhida no
				'ComboBox'.*/
				load_row(2);
				/*Oculta o botão após o click.*/
				$('#loadmorenews').hide();
			}
		}
		/*Função "Inicializar Recursos" para inicializar os principais recursos que serão utilizados durante o
		 carregamento da página.*/
		this.init = function init()
		{
			/*Inicia todas as variáveis que serão usadas ao longo do carregamento e/ou uso da página Notícias.*/
			global_vars();
			/*Carrega as configurações iniciais da página Notícias.*/
			sets_onload();
			/*Evento Scroll para carregar notícias ao descer a página.*/
			$(document).scroll(load_news);
		}
	}
	self.init = function init()
	{
		$("document").ready
		(
			function()
			{
				/*Inicia todo código necessário para a página Notícias.*/
				self.gerarNoticias.init();
			}
		);
	}
}