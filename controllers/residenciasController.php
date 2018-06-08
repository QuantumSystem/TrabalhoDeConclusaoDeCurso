<?php
class residenciasController extends controller{
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
		if($user->hasPermission('residencias_view')){
			$residencias = new Residencias();
			$data['residencias_list'] = $residencias->getList();

			//REDIRECIONA AO VIEW PERMISSIONS
			$this->loadTemplate('residencias', $data);
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
		if($user->hasPermission('residencias_view')){
			$residencias = new Residencias();

			if(isset($_POST['endereco']) && !empty($_POST['endereco'])){
				$endereco = addslashes($_POST['endereco']);
				$numero = addslashes($_POST['numero']);
				
				$a = $residencias->add($endereco, $numero);
				if($a == '1'){
					header("Location: ".BASE_URL."/residencias");
				}else{
					$data['error_msg'] = "Este número Já existe!";
				}
			}

			//REDIRECIONA AO VIEW USERS_ADD
			$this->loadTemplate('residencias_add', $data);
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
			$residencias = new Residencias();

			if(isset($_POST['endereco']) && !empty($_POST['endereco'])){
				$endereco = addslashes($_POST['endereco']);
				$numero = addslashes($_POST['numero']);

				$a = $residencias->edit($endereco, $numero, $id);
				if($a == '1'){
					header("Location: ".BASE_URL."/residencias");
				}else{
					$data['error_msg'] = "Este número Já existe!";
				}

				//header("Location: ".BASE_URL."/residencias");
			}

			$data['residencias_info'] = $residencias->getInfo($id);

			//REDIRECIONA AO VIEW USERS_ADD
			$this->loadTemplate('residencias_edit', $data);
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
			$residencias = new Residencias();

			$residencias->delete($id);
			header("Location: ".BASE_URL."/residencias");
		}else{
			header("Location: ".BASE_URL);
		}
	}


}


?>