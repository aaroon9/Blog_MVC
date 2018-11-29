<?php 
	class Coche{
		public $bastidor;
		public $marca;
		public $modelo;
		public $puertas;
		public $creted;

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
		 $post = $req->fetch();

	 	return new Coche($coche['bastidor'], $coche['marca'], $coche['modelo'], $coche['puertas'], $coche['created']);
	 	}

	}

 ?>