<?php
class veiculos extends model{
	private $userInfo;
	private $permissions;

	//VERIFICA SE TEM ALGUM USUARIO LOGADO NA SESSAO
	public function isLogged(){
		if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){
			return true;
		}else{
			return false;
		}
	}

	//EXECUTA O PDO E VERIFICA O LOGIN E SENHA
	public function doLogin($email, $password){

		$sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
		$sql->bindValue(':email', $email);
		$sql->bindValue(':password', md5($password));
		$sql->execute();

		//SE EXISTIR USUARIO PEGA ESTE USUARIO E INICIA NA SESSAO
		if($sql->rowCount() > 0){
			$row = $sql->fetch();

			$_SESSION['ccUser'] = $row['id'];
			return true;
		}else{
			return false;
		}

	}

	//VERIFICA SE TEM ALGUM USUARIO LOGADO NA SESSAO
	//SE TIVER PEGA ESTE USUARIO
	public function setLoggedUser(){
		if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){
			$id = $_SESSION['ccUser'];

			$sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
			$sql->bindValue(':id', $id);
			$sql->execute();

			if($sql->rowCount() > 0){
				$this->userInfo = $sql->fetch();
				$this->permissions = new Permissions();
				$this->permissions->setGroup($this->userInfo['id_group']);
			}
		}
	}

	//SAI DA SESSAO ccUSER
	public function logout(){
		unset($_SESSION['ccUser']);
	}

	public function hasPermission($name){
		return $this->permissions->hasPermission($name);
	}

	public function getInfo($id){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM veiculos WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getList(){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM veiculos");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getListControle(){
		$array = array();

		$sql = $this->db->prepare("SELECT veiculos.id, id_veiculo FROM veiculos, visitas WHERE veiculos.id = visitas.id_veiculo");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getVeiculos($id){
		$array = array();

		$sql = $this->db->prepare("SELECT veiculos.modelo, veiculos.placa FROM visitas INNER JOIN veiculos ON visitas.id =".$id." AND veiculos.id = visitas.idveiculo");
		// $sql = $this->db->prepare("
		// 		SELECT * FROM atendente 
		// 		INNER JOIN pedidos_comercial 
		// 		ON atendente.id_user=" . $idUser . " 
		// 		AND atendente.id_regional=pedidos_comercial.id_regional  
		// 		AND atendente.id_cidade=pedidos_comercial.id_cidade 
		// 		AND atendente.id_delegacia=pedidos_comercial.id_delegacia 
		// 		AND pedidos_comercial.atendimento=" . $idUser . " 
		//		AND pedidos_comercial.statusdopedido='Em Análise'");
		$sql->execute();
		

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	//ADICIONA UM NOVO VEICULO
	public function add($modelo, $placa, $cor){
		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM veiculos WHERE placa = :placa");
		$sql->bindValue(":placa", $placa);
		$sql->execute();
		$row = $sql->fetch();

		if($row['c'] == '0'){
			$sql = $this->db->prepare("INSERT INTO veiculos SET modelo = :modelo, placa = :placa ,cor = :cor");
			$sql->bindValue(":modelo", $modelo);
			$sql->bindValue(":placa", $placa);
			$sql->bindValue(":cor", $cor);
			$sql->execute();

			return '1';
		}else{
			return '0';
		}
	}

	//EDITA UM VEICULO
	public function edit($modelo, $placa, $id, $cor){
			$sql = $this->db->prepare("UPDATE veiculos SET modelo = :modelo, placa = :placa, cor = :cor WHERE id = :id");
			$sql->bindValue(":modelo", $modelo);
			$sql->bindValue(":placa", $placa);
			$sql->bindValue(":id", $id);
			$sql->bindValue(":cor", $cor);
			$sql->execute();
	}

	//DELETA UM VEICULO
	public function delete($id){
		$sql = $this->db->prepare("DELETE FROM veiculos WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
}