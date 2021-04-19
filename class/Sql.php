<?php
	// Class sql tem que extender da classe do PDO
	Class Sql extends PDO {
		private $conn;

	public function __construct(){
		$this->conn = new PDO("sqlsrv:Database=dbphp7;server=201.17.130.115;ConnectionPooling=0","sa","Triangulo31");

		}
		private function setParams($statment,$parameters = array()){
			foreach ($parameters as $key => $value) {
				$this->setParam($key,$value);
			}

		}

		private function setParam($statment,$key,$value){
				$statment->bindParam($key,value);
		}

		public function query($rawQuery,$params = array()){
			$stmt = $this->conn->prepare($rawQuery);
				$this->setParams($stmt,$params);
				$stmt->execute();
				return $stmt;
		}

		public function select($rawQuery,$params=array()):array
		{

			$stmt = $this->query($rawQuery,$params);
			return $stmt->fetchALL(PDO::FETCH_ASSOC);
		}
	}

?>