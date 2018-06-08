<?php
class moradoresController extends controller{
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
		if($user->hasPermission('moradores_view')){
			$moradores= new Moradores();
			$data['moradores_list'] = $moradores->getList();

			//REDIRECIONA AO VIEW USERS
			$this->loadTemplate('moradores', $data);
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
		if($user->hasPermission('moradores_view')){
			$moradores = new Moradores();

			if(isset($_POST['nome']) && !empty($_POST['nome'])){
				$nome = addslashes($_POST['nome']);
				$telefone = addslashes($_POST['telefone']);
				$celular = addslashes($_POST['celular']);

				$a = $moradores->add($nome, $telefone, $celular);
				if($a == '1'){
					header("Location: ".BASE_URL."/moradores");
				}else{
					$data['error_msg'] = "Usuário Já existe!";
				}
			}

			//REDIRECIONA AO VIEW USERS_ADD
			$this->loadTemplate('moradores_add', $data);
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
		if($user->hasPermission('moradores_view')){
			$moradores = new Moradores();

			if(isset($_POST['nome']) && !empty($_POST['nome'])){
				$nome = addslashes($_POST['nome']);
				$telefone = addslashes($_POST['telefone']);
				$celular = addslashes($_POST['celular']);

				$moradores->edit($nome, $telefone, $id, $celular);
				header("Location: ".BASE_URL."/moradores");
			}

			$data['moradores_info'] = $moradores->getInfo($id);

			//REDIRECIONA AO VIEW USERS_ADD
			$this->loadTemplate('moradores_edit', $data);
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
		if($user->hasPermission('moradores_view')){
			$moradores = new Moradores();

			$moradores->delete($id);
			header("Location: ".BASE_URL."/moradores");
		}else{
			header("Location: ".BASE_URL);
		}
	}


}


?>