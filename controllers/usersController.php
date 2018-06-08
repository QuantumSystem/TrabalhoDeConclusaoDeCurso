<?php
class usersController extends controller{
	public function __construct(){
		parent::__construct();
		//RECEBE O MODEL USERS
		$user = new Users();
		//SE NAO ESTIVER LOGADO REDIRECIONA PRO LOGIN
		if($user->isLogged() == false){
			header("Location: ".BASE_URL."/login");
			exit;
		}
		
	}
	//RECEBE AS INFORMAÇÕES DO USUARIO E DA EMPRESA
	public function index(){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();
		//SE O USUARIO TIVER PERMISSAO PARA ACESSAR O VIEW
		if($user->hasPermission('users_view')){
			//PEGA LISTA DE USUÁRIOS
			$data['user_list'] = $user->getList();
			//REDIRECIONA AO VIEW USERS
			$this->loadTemplate('users', $data);
		}else{
			header("Location: ".BASE_URL);
		}
	}
	public function add(){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();
		//SE O USUARIO TIVER PERMISSAO PARA ACESSAR O VIEW
		if($user->hasPermission('users_view')){
			$p = new Permissions();
			$r = new Residencias();
			if(isset($_POST['email']) && !empty($_POST['email'])){
				$email = addslashes($_POST['email']);
				$nome = addslashes($_POST['nome']);
				$telefone = addslashes($_POST['telefone']);
				$celular = addslashes($_POST['celular']);
				$pass = addslashes($_POST['password']);
				$group = addslashes($_POST['group']);
				$id_residencia = addslashes($_POST['id_residencia']);

				$a = $user->add($email, $nome, $telefone, $celular, $pass, $group, $id_residencia);
				if($a == '1'){
					header("Location: ".BASE_URL."/users");
				}else{
					$data['error_msg'] = "Usuário Já existe!";
				}	
			}

			$data['group_list'] = $p->getGroupList();
			$data['residencias_list'] = $r->getList();
			//REDIRECIONA AO VIEW USERS_ADD
			$this->loadTemplate('users_add', $data);
		}else{
			header("Location: ".BASE_URL);
		}
	}
	public function edit($id){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();
		//SE O USUARIO TIVER PERMISSAO PARA ACESSAR O VIEW
		if($user->hasPermission('users_view')){
			$p = new Permissions();
			$r = new Residencias();
			if(isset($_POST['group']) && !empty($_POST['group'])){
				$nome = addslashes($_POST['nome']);
				$pass = addslashes($_POST['password']);
				$telefone = addslashes($_POST['telefone']);
				$celular = addslashes($_POST['celular']);
				$group = addslashes($_POST['group']);
				$id_residencia = addslashes($_POST['id_residencia']);

				$user->edit($nome, $pass, $telefone, $celular, $group, $id, $id_residencia);
				header("Location: ".BASE_URL."/users");
			}
			$data['user_info'] = $user->getInfo($id);
			$data['group_list'] = $p->getGroupList();
			$data['residencias_list'] = $r->getList();
			//REDIRECIONA AO VIEW USERS_ADD
			$this->loadTemplate('users_edit', $data);
		}else{
			header("Location: ".BASE_URL);
		}
	}
	public function delete($id){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();
		//SE O USUARIO TIVER PERMISSAO PARA ACESSAR O VIEW
		if($user->hasPermission('users_view')){
			$p = new Permissions();
			$user->delete($id);
			header("Location: ".BASE_URL."/users");
		}else{
			header("Location: ".BASE_URL);
		}
	}
}
?>