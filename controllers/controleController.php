<?php
class ControleController extends controller{
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
		if($user->hasPermission('controle_view')){
			$controle = new Controle();
			$data['controle_list'] = $controle->getList();

			//REDIRECIONA AO VIEW CONTROLE
			$this->loadTemplate('controle', $data);
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
		if($user->hasPermission('controle_view')){
			$controle = new Controle();
			$residencias = new Residencias();
			$moradores = new Moradores();
			$veiculos = new Veiculos();
			$visitas = new Visitas();

			if(isset($_POST['visitas_id']) && !empty($_POST['visitas_id'])){
				$residencias_id = addslashes($_POST['residencias_id']);
				$veiculos_id = addslashes($_POST['veiculos_id']);
				$visitas_id = addslashes($_POST['visitas_id']);

				$controle->add($residencias_id, $veiculos_id, $visitas_id);
				header("Location: ".BASE_URL."/controle");
			}
			
			$data['residencias_list'] = $residencias->getResidencias();
			$data['veiculos_list'] = $veiculos->getList();
			$data['visitas_list'] = $visitas->getList();

			//REDIRECIONA AO VIEW CONTROLE_ADD
			$this->loadTemplate('controle_add', $data);
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
		if($user->hasPermission('controle_view')){
			$contole = new Controle();

			if(isset($_POST['visitas_id']) && !empty($_POST['visitas_id'])){
				$residencias_id = addslashes($_POST['residencias_id']);
				$veiculos_id = addslashes($_POST['veiculos_id']);
				$visitas_id = addslashes($_POST['visitas_id']);

				$controle->edit($residencias_id, $veiculos_id, $visitas_id, $id);
				header("Location: ".BASE_URL."/controle");
			}

			$data['controle_info'] = $controle->getInfo($id);

			//REDIRECIONA AO VIEW CONTROLE_ADD
			$this->loadTemplate('controle_edit', $data);
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
		if($user->hasPermission('controle_view')){
			$controle = new Controle();

			$controle->delete($id);
			header("Location: ".BASE_URL."/controle");
		}else{
			header("Location: ".BASE_URL);
		}
	}

	public function saida($id){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();
		//SE O USUARIO TIVER PERMISSAO PARA ACESSAR O VIEW
		if($user->hasPermission('controle_view')){
			$controle = new Controle();

			$controle->saida($id);
			header("Location: ".BASE_URL."/controle");
		}else{
			header("Location: ".BASE_URL);
		}
	}

}


?>