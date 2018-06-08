<?php
class residencias extends model{
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

	//PEGA O EMAIL DO USUARIO
	public function getEmail(){
		if(isset($this->userInfo['email'])){
			return $this->userInfo['email'];
		}else{
			return '';
		}
	}

	public function getInfo($id){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM residencias WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}

	//VERIFICA SE TEM USUARIOS NO GRUPO * FUNCAO UTILIZADA NO MODEL PERMISSIONS
	public function findUserInGroup($id){
		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE id_group = :id_group");
		$sql->bindValue(":id_group", $id);
		$sql->execute();
		$row = $sql->fetch();

		if($row['c'] == '0'){
			return false;
		}else{
			return true;
		}
	}

	public function getList(){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM residencias");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getResidencias(){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM residencias");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	//ADICIONA UM NOVO USUÁRIO
	public function add($endereco, $numero){
		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM residencias WHERE numero = :numero");
		$sql->bindValue(":numero", $numero);
		$sql->execute();
		$row = $sql->fetch();

		if($row['c'] == '0'){
			$sql = $this->db->prepare("INSERT INTO residencias SET endereco = :endereco, numero = :numero");
			$sql->bindValue(":endereco", $endereco);
			$sql->bindValue(":numero", $numero);
			$sql->execute();

			return '1';
		}else{
			return '0';
		}
	}

	public function edit($endereco, $numero, $id){
			$sql = $this->db->prepare("UPDATE residencias SET endereco = :endereco, numero = :numero WHERE id = :id");
			$sql->bindValue(":endereco", $endereco);
			$sql->bindValue(":numero", $numero);
			$sql->bindValue(":id", $id);
			$sql->execute();
	}

	public function delete($id){
		$sql = $this->db->prepare("DELETE FROM residencias WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
}