<?php
class homeController extends controller{
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

	public function index(){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();

		$residencias = new Residencias();
		$veiculos = new Veiculos();
		$visitas = new Visitas();
		
		$data['residencias_list'] = $residencias->getList();
		$data['veiculos_list'] = $veiculos->getList();
		$data['visitas_list'] = $visitas->getList();
		$data['users_list'] = $user->getList();
		
		//REDIRECIONA AO VIEW HOME
		$this->loadTemplate('home', $data);
		
	}

}
?>