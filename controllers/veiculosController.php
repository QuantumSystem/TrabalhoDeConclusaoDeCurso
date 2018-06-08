<?php
class veiculosController extends controller{
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
		if($user->hasPermission('veiculos_view')){
			$veiculos = new Veiculos();
			$data['veiculos_list'] = $veiculos->getList();

			//REDIRECIONA AO VIEW VEICULOS
			$this->loadTemplate('veiculos', $data);
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
		if($user->hasPermission('veiculos_view')){
			$veiculos = new Veiculos();

			if(isset($_POST['modelo']) && !empty($_POST['modelo'])){
				$modelo = addslashes($_POST['modelo']);
				$placa = addslashes($_POST['placa']);
				$cor = addslashes($_POST['cor']);

				$a = $veiculos->add($modelo, $placa, $cor);
				if($a == '1'){
					header("Location: ".BASE_URL."/veiculos");
				}else{
					$data['error_msg'] = "Este veículo Já existe!";
				}
			}

			//REDIRECIONA AO VIEW VEICULOS_ADD
			$this->loadTemplate('veiculos_add', $data);
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
		if($user->hasPermission('veiculos_view')){
			$veiculos = new Veiculos();

			if(isset($_POST['modelo']) && !empty($_POST['modelo'])){
				$modelo = addslashes($_POST['modelo']);
				$placa = addslashes($_POST['placa']);
				$cor = addslashes($_POST['cor']);

				$veiculos->edit($modelo, $placa, $id, $cor);
				header("Location: ".BASE_URL."/veiculos");
			}

			$data['veiculos_info'] = $veiculos->getInfo($id);

			//REDIRECIONA AO VIEW VEICULOS_EDIT
			$this->loadTemplate('veiculos_edit', $data);
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
		if($user->hasPermission('veiculos_view')){
			$veiculos = new Veiculos();

			$veiculos->delete($id);
			header("Location: ".BASE_URL."/veiculos");
		}else{
			header("Location: ".BASE_URL);
		}
	}


}


?>