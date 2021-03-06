<?php 

	class Usuario
	{

		private $id;
		private $modelo;
		private $placa;
		private $entrada;
		private $saida;
		private $valor;
		private $ver;

		public function getId(){
			return $this->id;
		}
		public function setId($value){
			$this->id = $value;
		}

		public function getModelo(){
			return $this->modelo;
		}
		public function setModelo($value){
			$this->modelo = $value;
		}

		public function getPlaca(){
			return $this->placa;
		}
		public function setPlaca($value){
			$this->placa = $value;
		}

		public function getEntrada(){
			return $this->entrada;
		}
		public function setEntrada($value){
			$this->entrada = $value;
		}

		public function getSaida(){
			return $this->saida;
		}
		public function setSaida($value){
			$this->saida = $value;
		}

		public function getValor(){
			return $this->valor;
		}
		public function setValor($value){
			$this->valor = $value;
		}

		public function getVer(){
			return $this->ver;
		}
		public function setVer($value){
			$this->ver = $value;
		}

		public function loadById($id){

			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_estacionamento WHERE id = :ID", array(
				":ID"=>$id
			));

			if(count($results) > 0){

				$this->setData($results[0]);

			}

		}

		public static function getList(){

			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_estacionamento ORDER BY entrada DESC");

		}

		public static function search($modelo){

			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_estacionamento WHERE modelo LIKE :SEARCH ORDER BY modelo", array(
				':SEARCH'=>"%".$modelo."%"

			));

		}

		public function login($modelo, $placa){

			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_estacionamento WHERE modelo = :MODELO AND placa = :PLACA", array(
				":MODELO"=>$modelo,
				":PLACA"=>$placa
			));

			if(count($results) > 0){

				$this->setData($results[0]);
				
			} else {

				throw new Exception("Login e/ou senha inválidos.");

			}

		}

		public function setData($data){

			$this->setId($data['id']);
			$this->setModelo($data['modelo']);
			$this->setPlaca($data['placa']);
			$this->setEntrada(new DateTime($data['entrada']));
			$this->setSaida(new DateTime($data['saida']));
			$this->setValor($data['valor']);
			$this->setVer($data['ver']);

		}

		/*public function insert(){

			$sql = new Sql();

			$results = $sql->select("CALL sp_modelo_insert(:MODELO, :PLACA)", array(

				':MODELO'=>$this->getModelo(),
				':PLACA'=>$this->getPlaca()
			));

			if(count($results) > 0){
				$this->setData$results[0];
			}

		}*/

		public function __toString(){

			return json_encode(array(
				"id"=>$this->getId(),
				"modelo"=>$this->getModelo(),
				"placa"=>$this->getPlaca(),
				"entrada"=>$this->getEntrada()->format("d/m/Y H:i"),
				"saida"=>$this->getSaida()->format("d/m/Y H:i"),
				"valor"=>$this->getValor(),
				"ver"=>$this->getVer()
			));
		}


	}

?>