<?php
class controle extends model{
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

		$sql = $this->db->prepare("SELECT * FROM controle WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getList(){
		$array = array();

		$sql = $this->db->prepare("SELECT controle.id, visitas.nome, veiculos.modelo, veiculos.placa, residencias.endereco, residencias.numero, controle.entrada, controle.saida
			FROM visitas, veiculos, residencias, controle
			WHERE visitas.id = controle.visitas_id
			AND veiculos.id = controle.veiculos_id
			AND residencias.id = controle.residencias_id;");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	//ADICIONA UM CONTROLE
	public function add($residencias_id, $veiculos_id, $visitas_id){
		$sql = $this->db->prepare("INSERT INTO controle SET residencias_id = :residencias_id, veiculos_id = :veiculos_id, visitas_id = :visitas_id, entrada = NOW(), saida = '0000-00-00 00:00:00.000000'");
		$sql->bindValue(":residencias_id", $residencias_id);
		$sql->bindValue(":veiculos_id", $veiculos_id);
		$sql->bindValue(":visitas_id", $visitas_id);
		$sql->execute();
	}

	//EDITA UM CONTROLE
	public function edit($residencias_id, $moradores_id, $veiculos_id, $visitas_id, $id){
		$sql = $this->db->prepare("UPDATE controle SET residencias_id = :residencias_id, veiculos_id = :veiculos_id, visitas_id = :visitas_id WHERE id = :id");
		$sql->bindValue(":residencias_id", $residencias_id);
		$sql->bindValue(":veiculos_id", $veiculos_id);
		$sql->bindValue(":visitas_id", $visitas_id);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	//DELETA UM CONTROLE
	public function delete($id){
		$sql = $this->db->prepare("DELETE FROM controle WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function saida($id){
		$sql = $this->db->prepare("UPDATE controle SET saida = NOW() WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
}