<?php
class VisitasController extends controller{
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
		if($user->hasPermission('visitas_view')){
			$visitas = new Visitas();
			$data['visitas_list'] = $visitas->getList();
			
			//REDIRECIONA AO VIEW Visitas
			$this->loadTemplate('visitas', $data);
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
		if($user->hasPermission('visitas_view')){
			$visitas = new Visitas();
			$veiculos = new Veiculos();

			if(isset($_POST['nome']) && !empty($_POST['nome'])){
				$nome = addslashes($_POST['nome']);
				$cpf = addslashes($_POST['cpf']);
				$id_veiculo = addslashes($_POST['id_veiculo']);

				$a = $visitas->add($nome, $cpf, $id_veiculo);
				if($a == '1'){
					header("Location: ".BASE_URL."/visitas");
				}else{
					$data['error_msg'] = "Visita Já existe!";
				}
			}
			$data['veiculos_list'] = $veiculos->getList();

			//REDIRECIONA AO VIEW USERS_ADD
			$this->loadTemplate('visitas_add', $data);
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
		if($user->hasPermission('visitas_view')){
			$visitas = new Visitas();

			if(isset($_POST['nome']) && !empty($_POST['nome'])){
				$nome = addslashes($_POST['nome']);
				$cpf = addslashes($_POST['cpf']);

				$visitas->edit($nome, $cpf, $id);
				header("Location: ".BASE_URL."/visitas");
			}

			$data['visitas_info'] = $visitas->getInfo($id);

			//REDIRECIONA AO VIEW USERS_ADD
			$this->loadTemplate('visitas_edit', $data);
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
		if($user->hasPermission('visitas_view')){
			$visitas = new Visitas();

			$visitas->delete($id);
			header("Location: ".BASE_URL."/visitas");
		}else{
			header("Location: ".BASE_URL);
		}
	}


}


?>