<?php
class moradores extends model{
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

		$sql = $this->db->prepare("SELECT * FROM moradores WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getList(){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM moradores");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	//ADICIONA UM NOVO MORADOR
	public function add($nome, $telefone, $celular){
		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM moradores WHERE celular = :celular");
		$sql->bindValue(":celular", $celular);
		$sql->execute();
		$row = $sql->fetch();

		if($row['c'] == '0'){
			$sql = $this->db->prepare("INSERT INTO moradores SET nome = :nome, telefone = :telefone ,celular = :celular");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":telefone", $telefone);
			$sql->bindValue(":celular", $celular);
			$sql->execute();

			return '1';
		}else{
			return '0';
		}
	}

	//EDITA UM MORADOR
	public function edit($nome, $telefone, $id, $celular){
			$sql = $this->db->prepare("UPDATE moradores SET nome = :nome, telefone = :telefone, celular = :celular WHERE id = :id");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":telefone", $telefone);
			$sql->bindValue(":id", $id);
			$sql->bindValue(":celular", $celular);
			$sql->execute();
	}

	//DELETA UM MORADOR
	public function delete($id){
		$sql = $this->db->prepare("DELETE FROM moradores WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
}