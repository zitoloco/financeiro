<?php
/**
 * Verifica chaves de arrays
 *
 * Verifica se a chave existe no array e se ela tem algum valor.
 *
 * @param array  $array O array
 * @param string $key   A chave do array
 * @return string|null  O valor da chave do array ou nulo
 */
function chk_array ( $array, $key ) {
	// Verifica se a chave existe no array
	if ( isset( $array[ $key ] ) && ! empty( $array[ $key ] ) ) {
		// Retorna o valor da chave
		return $array[ $key ];
	}
	
	// Retorna nulo por padrão
	return null;
} // chk_array

/**
 * Realiza a conversão de datas
 *
 * Verifica se a data está em formato de gravação ou vice-versa e converte.
 *
 */
function converteData($data){
       if (strstr($data, "/")){//verifica se tem a barra /
           $d = explode ("/", $data);//tira a barra
           $rstData = "$d[2]-$d[1]-$d[0]";//separa as datas $d[2] = ano $d[1] = mes etc...
           return $rstData;
       }
       else if(strstr($data, "-")){
          $data = substr($data, 0, 10);
          $d = explode ("-", $data);
          $rstData = "$d[2]/$d[1]/$d[0]";
          return $rstData;
       }
       else{
           return '';
      }
}

/**
 * Função para carregar automaticamente todas as classes padrão
 * Ver: http://php.net/manual/pt_BR/function.autoload.php.
 * Nossas classes estão na pasta classes/.
 * O nome do arquivo deverá ser class-NomeDaClasse.php.
 */
function __autoload($class_name) {
	$file = ABSPATH . '/classes/class-' . $class_name . '.php';
	
	if ( ! file_exists( $file ) ) {
		require_once ABSPATH . '/includes/404.php';
		return;
	}
	
	// Inclui o arquivo da classe
    require_once $file;
} // __autoload
