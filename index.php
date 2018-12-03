<?php
 	require_once('connection.php');
 	//Declaro constante que tomara la URL para poder formar las URL amigables.

 	define('URL', 'http://localhost/bloc_php_mvc/');

//echo $_GET['url'];

		if(isset($_GET['url'])){
		 $url = $_GET['url']; // 'posts/index'
		 // Quita / innecesarias a la derecha.
		 $url = rtrim($url, '/');

		 // Devuelve un array utilizando la / como delimitador.
		 $url = explode('/', $url); // ['posts', 'index']
		 $controller = $url[0];
		 $action = $url[1];
		 $param = (!empty($url[2])) ? $url[2]:null;
		 } else {
			 $controller = 'pages';
			 $action = 'home';
			 $param = null;
	 		}
	 require_once('views/layout.php');
?>