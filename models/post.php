<?php
//Delcaracion del objeto Post
	class Post {
	 // definimos tres atributos
	 // los declaramos como públicos para acceder directamente $post->author
	 public $id;
	 public $titulo;
	 public $author;
	 public $content;
	 public $image;
	 //contructor del objeto post
	 public function __construct($id, $titulo, $author, $content, $image) {

	 $this->id = $id;
	 $this->titulo= $titulo;
	 $this->author = $author;
	 $this->content = $content;
	 $this->image = $image;
	 }
	 //funcion para buscar todos los post en la BBDD
	 public static function all() {
		 $list = [];
		 $db = Db::getInstance();
		 $req = $db->query('SELECT * FROM posts');

		 // creamos una lista de objectos post y recorremos la respuesta de la consulta
	 	foreach($req->fetchAll() as $post) {
			 $list[] = new Post($post['id'], $post['titulo'], $post['author'], $post['content'], $post['image']);
		}
		 return $list;
	 }
	 //Funcion para buscar un post en concreto al cambiar a URL amigabel no sirve los GET y tenemos que paras el id como variable.
	 public static function find($id) {
		 $db = Db::getInstance();
		 // nos aseguramos que $id es un entero
		 $id = intval($id);
		 $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
		 // preparamos la sentencia y reemplazamos :id con el valor de $id
		 $req->execute(array('id' => $id));
		 $post = $req->fetch();
	 	return new Post($post['id'], $post['titulo'], $post['author'], $post['content'], $post['image']);
	 }
	 //los datos del fomulario inserta llegar a esta funcion donde se guardan en variables y se insertan el la BBDD
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
	 		echo "<div class='alert alert-success'>Post creado correctamente.</div>";
	 		//Si se ejecuta la funcion ejecutamos la subida de la imagen mediante otro metodo
	 		Post::uploadPhoto($image);
            return true;
        }else{
        	echo "<div class='alert alert-danger'>Yeeee ande ibas? Post no creado.</div>";
            return false;
        }
	}
	//funcion para modificar posts de la BBDD, el formulario modificarpost llega aqui donde los nuevos parametros se guardan en variables y se actualizan en la BBDD.
	public static function modificarBD(){

		$db = Db::getInstance();
	 	$req = $db->prepare('UPDATE  posts 
            SET author=:author, titulo=:titulo, content=:content,
                 image=:image, created=:created WHERE id=:id');
	 	
	 	$author=htmlspecialchars(strip_tags($_POST['author']));
	 	$titulo=htmlspecialchars(strip_tags($_POST['titulo']));
	 	$content=htmlspecialchars(strip_tags($_POST['desc']));
	 	$image=htmlspecialchars(strip_tags($_FILES["image"]["name"]));
	 	$id=htmlspecialchars(strip_tags($_POST['id']));
	 	
	 	//en el caso de que la imagen no haya sido modificada cogeremos la imagen antigua y mantendremos su nombre.
        if ($_FILES["image"]["name"] == "") {
        	$image = $_POST['image1'];
        }
        else{
        	$image=!empty($_FILES["image"]["name"])? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
        }

	 	$req->bindParam(":author", $author);
	 	$req->bindParam(":titulo", $titulo);
	 	$req->bindParam(":content", $content);
	 	$req->bindParam(":image", $image);
	 	$req->bindParam(":created", $timestamp);
	 	$req->bindParam(":id", $id);

	 	if($req->execute()){
	 		Post::uploadPhoto($image);
            return true;
        }else{
            return false;
        }

	}
	//funcion que permite eleminar un post de la BBDD.
	public static function eliminarBD($id){
		
		$db = Db::getInstance();
		$req = $db->prepare('DELETE FROM posts 
            WHERE id=:id');

		$req->bindParam(":id", $id);

		if($req->execute()){
            return true;
        }else{
            return false;
        }

	}
	//metodod que permite crear una carpeta upload si no esta creada, donde alli alamcenara las imagenes que suba el usuario.
	public static function uploadPhoto($image){
 
		    $result_message="";
		 
		    // now, if image is not empty, try to upload the image
		if($image){
	 
	// sha1_file() function is used to make a unique file name
	    $target_directory = "uploads/";
	    $target_file = $target_directory . $image;
	    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
		 
	    // error message is empty
	    $file_upload_error_messages="";

		 
		// make sure certain file types are allowed
		$allowed_file_types=array("jpg", "jpeg", "png", "gif");
		if(!in_array($file_type, $allowed_file_types)){
		    $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
		}
		 
		// make sure file does not exist
		if(file_exists($target_file)){
		    $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
		}
		 
		// make sure submitted file is not too large, can't be larger than 1 MB
		if($_FILES['image']['size'] > (1024000)){
		    $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
		}
		 
		// make sure the 'uploads' folder exists
		// if not, create it
		if(!is_dir($target_directory)){
		    mkdir($target_directory, 0777, true);
		}
		// if $file_upload_error_messages is still empty
		if(empty($file_upload_error_messages)){
		    // it means there are no errors, so try to upload the file
		    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
		        // it means photo was uploaded
		    }else{
		        $result_message.="<div class='alert alert-danger'>";
		            $result_message.="<div>Unable to upload photo.</div>";
		            $result_message.="<div>Update the record to upload photo.</div>";
		        $result_message.="</div>";
		    }
		}
		 
		// if $file_upload_error_messages is NOT empty
		else{
		    // it means there are some errors, so show them to user
		    $result_message.="<div class='alert alert-danger'>";
		        $result_message.="{$file_upload_error_messages}";
		        $result_message.="<div>Update the record to upload photo.</div>";
		    $result_message.="</div>";
		}
		 
		    }
		 
		    return $result_message;
		}
}
?>