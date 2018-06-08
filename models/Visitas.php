<?php
class visitas extends model{
	private $userInfo;
	private $permissions;
	private $lastId;

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

		$sql = $this->db->prepare("SELECT * FROM visitas WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getList(){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM visitas");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	//ADICIONA UMA NOVA VISITA
	public function add($nome, $cpf){
		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM visitas WHERE cpf = :cpf");
		$sql->bindValue(":cpf", $cpf);
		$sql->execute();
		$row = $sql->fetch();

		if($row['c'] == '0'){
			$sql = $this->db->prepare("INSERT INTO visitas SET nome = :nome, cpf = :cpf");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":cpf", $cpf);
			$sql->execute();
			$lastId = $this->db->lastInsertId();

			return '1';
		}else{
			return '0';
		}
	}

	//EDITA UMA VISITA
	public function edit($nome, $cpf, $id){
			$sql = $this->db->prepare("UPDATE visitas SET nome = :nome, cpf = :cpf WHERE id = :id");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":cpf", $cpf);
			$sql->bindValue(":id", $id);
			$sql->execute();
	}

	//DELETA UM MORADOR
	public function delete($id){
		$sql = $this->db->prepare("DELETE FROM visitas WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
}