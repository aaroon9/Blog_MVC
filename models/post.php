<?php
	class Post {
	 // definimos tres atributos
	 // los declaramos como públicos para acceder directamente $post->author
	 public $id;
	 public $author;
	 public $content;
	 public function __construct($id, $author, $content) {
	 $this->id = $id;
	 $this->author = $author;
	 $this->content = $content;
	 }

	 public static function all() {
		 $list = [];
		 $db = Db::getInstance();
		 $req = $db->query('SELECT * FROM posts');

		 // creamos una lista de objectos post y recorremos la respuesta de la consulta
	 	foreach($req->fetchAll() as $post) {
			 $list[] = new Post($post['id'], $post['author'], $post['content']);
		}
		 return $list;
	 }

	 public static function find($id) {
		 $db = Db::getInstance();
		 // nos aseguramos que $id es un entero
		 $id = intval($id);
		 $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
		 // preparamos la sentencia y reemplazamos :id con el valor de $id
		 $req->execute(array('id' => $id));
		 $post = $req->fetch();
	 	return new Post($post['id'], $post['author'], $post['content']);
	 }

	 public static function insertarBD(){

	 	$db = Db::getInstance();
	 	$req = $db->prepare('INSERT INTO  posts 
            SET author=:author, titulo=:titulo, content=:content,
                 image=:image, created=:created');
	 	$author=htmlspecialchars(strip_tags($_POST['author']));
	 	$titulo=htmlspecialchars(strip_tags($_POST['titulo']));
	 	$content=htmlspecialchars(strip_tags($_POST['desc']));
	 	$image=htmlspecialchars(strip_tags($_FILES["image"]["name"]));
	 	$image=!empty($_FILES["image"]["name"])? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";

        $timestamp = date('Y-m-d H:i:s');

	 	$req->bindParam(":author", $author);
	 	$req->bindParam(":titulo", $titulo);
	 	$req->bindParam(":content", $content);
	 	$req->bindParam(":image", $image);
	 	$req->bindParam(":created", $timestamp);

	 	if($req->execute()){
            return true;
        }else{
            return false;
        }


	}
}
?>