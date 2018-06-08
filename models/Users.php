<?php
class Users extends model{
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

	//PEGA O NOME DO GRUPO DE PERMISSÕES
	public function getName(){
		if(isset($this->userInfo['name'])){
			return $this->userInfo['name'];
		}else{
			return '';
		}
	}

	//PEGA O NOME DO USUARIO
	public function getNome(){
		if(isset($this->userInfo['nome'])){
			return $this->userInfo['nome'];
		}else{
			return '';
		}
	}

	//PEGA O ID DO USUARIO
	public function getId(){
		if(isset($this->userInfo['id'])){
			return $this->userInfo['id'];
		}else{
			return '';
		}
	}

	public function getInfo($id){
		$array = array();
		$sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}
		return $array;
	}

	public function getAll(){
		$array = array();
		
		$sql = $this->db->prepare("SELECT * FROM users");
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
		//ASSOCIA O ID DO PERMISSIONS GROUP COM O ID DO USERS GROUP
		$sql = $this->db->prepare("
			SELECT users.id, users.email, users.nome, users.telefone, users.celular, permission_groups.name 
			FROM users
			LEFT JOIN permission_groups ON permission_groups.id = users.id_group");
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
	//ADICIONA UM NOVO USUÁRIO
	public function add($email, $nome, $telefone, $celular, $pass, $group, $id_residencia){
		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();
		$row = $sql->fetch();
		if($row['c'] == '0'){
			$sql = $this->db->prepare("INSERT INTO users SET email = :email, nome = :nome, telefone = :telefone, celular = :celular, password = :password, id_group = :id_group, id_residencia = :id_residencia");
			$sql->bindValue(":email", $email);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":password", md5($pass));
			$sql->bindValue(":telefone", $telefone);
			$sql->bindValue(":celular", $celular);
			$sql->bindValue(":id_group", $group);
			$sql->bindValue(":id_residencia", $id_residencia);
			$sql->execute();
			return '1';
		}else{
			return '0';
		}
	}
	public function edit($nome, $pass, $telefone, $celular, $group, $id, $id_residencia){
		$sql = $this->db->prepare("UPDATE users SET id_group = :id_group, id_residencia = :id_residencia WHERE id = :id 
			");
		$sql->bindValue(":id_group", $group);
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_residencia", $id_residencia);
		$sql->execute();
		if(!empty($pass)){
			$sql = $this->db->prepare("UPDATE users SET nome = :nome, password = :password, 
				telefone = :telefone, celular = :celular WHERE id = :id");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":password", md5($pass));
			$sql->bindValue(":id", $id);
			$sql->execute();
		}
	}
	public function delete($id){
		$sql = $this->db->prepare("DELETE FROM users WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
}