<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'tema');
//define('DB_NAME', 'wp_cmcorp');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'k$w6!j)O 0V,1^*#RZq&*iO?C{ndVdu*#(W)g.tfM%[&D~y)n8!-rmSQ06Vc8=%8');
define('SECURE_AUTH_KEY',  's-xKq./<s9%YUOTN%1%-@UEVTEb#.,[!Nh6#$hcqcLb6fGrZ%11@=4]PE$;q.*EG');
define('LOGGED_IN_KEY',    '+V_{$ZU{Z71=rK-YoFxOVvcA5f=XTmT4TJOx/G:1^c@p5X#9S1lW!z7UhWUpvKv2');
define('NONCE_KEY',        '!7Kw&2{E1C*n{WeC4&o`ax]K2b7jHLN8YcZ+ZX4?>Ll^WK$&ZbW_(@/_7i.NQuGn');
define('AUTH_SALT',        'ypg5(#P18zI]bE[Pyv?A: Wir!C v$v%78dC>#}m>)R4!F^4a~gsy$u>^IRz2k]R');
define('SECURE_AUTH_SALT', '?^W7|*>r7sq.}OMu(mwpdlvZQHgBuG!5A-u+LExgw`)86yhj2U4W8DNKveW&G^FN');
define('LOGGED_IN_SALT',   '=_5/uHXuf^uk{1}zF_7ZDrY-&Nn-N93|uZ5b@|iIIHBwgQrd/=.R=PdXy7@6~!uo');
define('NONCE_SALT',       '%elH=J*Ffw5HUc. sbswa{)_a=E@?AHa>(R%p%Wl~2Xi26Z}m=al;U)7t{x:-hvY');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
