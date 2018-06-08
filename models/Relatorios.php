<?php
class relatorios extends model{
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
		$id = $_SESSION['ccUser'];
		$sql = $this->db->prepare("SELECT residencias_id, veiculos_id, visitas_id, entrada, saida
			FROM controle, users
			where users.id = :id AND id_residencia = residencias_id ORDER BY 1");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getListAdmin(){
		$array = array();
		$id = $_SESSION['ccUser'];
		$sql = $this->db->prepare("SELECT *	FROM controle ORDER BY 1");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

}