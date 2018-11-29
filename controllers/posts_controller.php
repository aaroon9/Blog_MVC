<?php
	class PostsController {
		 public function index() {
		 // Guardamos todos los posts en una variable
		 $posts = Post::all();
		 require_once('views/posts/index.php');
		 }
		 public function show() {
		 // esperamos una url del tipo ?controller=posts&action=show&id=x
		 // si no nos pasan el id redirecionamos hacia la pagina de error, el id tenemos que buscarlo
		//en la BBDD
		 if (!isset($_GET['id'])) {
		 return call('pages', 'error');
		 }
		 // utilizamos el id para obtener el post correspondiente
		 $post = Post::find($_GET['id']);
		 require_once('views/posts/show.php');
		 }

		 public function mostrarInsertar(Type $var = null){
		 	//NO modelo

		 	//VISTA
		 	require_once('views/insertar/mostrarInsertar.php');
		 }
		 public function insertar(){
		 	
		 	if(Post::insertarBD() == true){
            	require_once('views/insertar/mostrarInsertar.php');
		 	}else{
            	require_once('views/insertar/mostrarInsertar.php');
		 	}
		 	//header (Location:'?cotron=post&action=mostrarInsertar');
		 }
		 public function mostrarModificar(){

			 if (!isset($_GET['id'])) {
			 	return call('pages', 'error');
			 }else{
			 	$post = Post::find($_GET['id']);
			 	require_once('views/modificar/modificar.php');
			 }
		 }

		 public function modificar(){
		 	if(Post::modificarBD()== true){
		 		$posts = Post::all();
		 		echo "<div class='alert alert-success'>Post actualizado correctamente.</div>";
		 		require_once('views/posts/index.php');
		 	}
		 	else{
		 		$posts = Post::all();
		 		echo "<div class='alert alert-danger'>Yeeee ande ibas? Post no actualizado.</div>";
		 		require_once('views/posts/index.php');
		 	}

		 }
		 public function eliminar(){
		 	if(Post::eliminarBD() == true){
		 		$posts = Post::all();
		 		echo "<div class='alert alert-success'>Post eliminado correctamente.</div>";
		 		require_once('views/posts/index.php');
		 	}else{
		 		$posts = Post::all();
		 		echo "<div class='alert alert-success'>Imposible eliminar el post</div>";
		 		require_once('views/posts/index.php');

		 	}
		 }
}
?>