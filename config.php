<?php
/**
 * Configuração geral
 */

// Caminho para a raiz
define( 'ABSPATH', dirname( __FILE__ ) );

// Caminho para a pasta de uploads
define( 'UP_ABSPATH', ABSPATH . '\views\_uploads' );

// URL da home
define( 'HOME_URI', '/financeiro' );

// Nome do host da base de dados
//define( 'HOSTNAME', 'mysql.hostinger.com.br' );
define( 'HOSTNAME', 'localhost' );

// Nome do DB
//define( 'DB_NAME', 'u907871164_fin' );
define( 'DB_NAME', 'financeiro' );

// Usuário do DB
//define( 'DB_USER', 'u907871164_fin' );
define( 'DB_USER', 'root' );

// Senha do DB
//define( 'DB_PASSWORD', 'R1o2b3i4s5o6n7' );
define( 'DB_PASSWORD', 'Rob3108' );

// Charset da conexão PDO
define( 'DB_CHARSET', 'utf8' );

// Se você estiver desenvolvendo, modifique o valor para true
define( 'DEBUG', true );

/**
 * Não edite daqui em diante
 */

// Carrega o loader, que vai carregar a aplicação inteira
require_once ABSPATH . '/loader.php';
?>