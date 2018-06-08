<?php
class relatoriosController extends controller{
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
		$data['user_id'] = $user->getId();
		//SE O USUARIO TIVER PERMISSAO PARA ACESSAR O VIEW
		$r = new Relatorios();
		
		if($user->hasPermission('controle_view')){
			$data['relatorios_list'] = $r->getListAdmin();

			//REDIRECIONA AO VIEW CONTROLE
			$this->loadTemplate('relatorios', $data);
		}else if($user->hasPermission('relatorios_view')){
			$data['relatorios_list'] = $r->getList();

			//REDIRECIONA AO VIEW CONTROLE
			$this->loadTemplate('relatorios', $data);
			
		}else{
			header("Location: ".BASE_URL);
		}
	}

}

?>