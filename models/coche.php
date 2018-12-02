<?php 
	class Coche{
		public $bastidor;
		public $marca;
		public $modelo;
		public $puertas;
		public $created;

		public function __construct($bastidor, $marca, $modelo, $puertas, $created){

			$this->bastidor = $bastidor;
			$this->marca = $marca;
			$this->modelo = $modelo;
			$this->puertas = $puertas;
			$this->created = $created;
		}
		public function todos(){
			$lista = [];
			 $db = Db::getInstance();
			 $req = $db->query('SELECT * FROM coches');

			 // creamos una lista de objectos coche y recorremos la respuesta de la consulta
		 	foreach($req->fetchAll() as $coche) {
				 $list[] = new Coche($coche['bastidor'], $coche['marca'], $coche['modelo'], $coche['puertas'], $coche['created']);
			}
			 return $list;
		}

		public static function readOne($bastidor) {
			$db = Db::getInstance();
			// nos aseguramos que $id es un entero
			$id = intval($bastidor);
			$req = $db->prepare('SELECT * FROM coches WHERE bastidor = :bastidor');
			// preparamos la sentencia y reemplazamos :bastidor con el valor de $bastidor
			$req->execute(array('bastidor' => $bastidor));
			$coche = $req->fetch();

		 return new Coche($coche['bastidor'], $coche['marca'], $coche['modelo'], $coche['puertas'], $coche['created']);
	 	}

	 	public static function crearCocheBD(){

	 		$db = Db::getInstance();
	 	$req = $db->prepare('INSERT INTO  coches 
            SET bastidor=:bastidor, marca=:marca, modelo=:modelo,
                 puertas=:puertas, created=:created');
	 	$bastidor=htmlspecialchars(strip_tags($_POST['bastidor']));
	 	$marca=htmlspecialchars(strip_tags($_POST['marca']));
	 	$modelo=htmlspecialchars(strip_tags($_POST['modelo']));
	 	$puertas=htmlspecialchars(strip_tags($_POST["puertas"]));
	 	

        $timestamp = date('Y-m-d H:i:s');

	 	$req->bindParam(":bastidor", $bastidor);
	 	$req->bindParam(":marca", $marca);
	 	$req->bindParam(":modelo", $modelo);
	 	$req->bindParam(":puertas", $puertas);
	 	$req->bindParam(":created", $timestamp);

	 	if($req->execute()){
            return true;
        }else{
            return false;
        }
        
	 	}

	 	public static function modificarCocheBD(){

		 		$db = Db::getInstance();
		 	$req = $db->prepare('UPDATE  coches 
	            SET marca=:marca, modelo=:modelo, puertas=:puertas WHERE bastidor=:bastidor');
		 	
		 	$marca=htmlspecialchars(strip_tags($_POST['marca']));
		 	$modelo=htmlspecialchars(strip_tags($_POST['modelo']));
		 	$puertas=htmlspecialchars(strip_tags($_POST['puertas']));
		 	$bastidor=htmlspecialchars(strip_tags($_POST['bastidor']));

		 	$req->bindParam(":marca", $marca);
		 	$req->bindParam(":modelo", $modelo);
		 	$req->bindParam(":puertas", $puertas);
		 	$req->bindParam(":bastidor", $bastidor);

		 	if($req->execute()){
	            return true;
	        }else{
	            return false;
	        }
	 	}

	 	public static function eliminarBD($bastidor){
	 		$db = Db::getInstance();
			$req = $db->prepare('DELETE FROM coches 
	            WHERE bastidor=:bastidor');

			$req->bindParam(":bastidor", $bastidor);

			if($req->execute()){
	            return true;
	        }else{
	            return false;
	        }
	 	}

	}
?>