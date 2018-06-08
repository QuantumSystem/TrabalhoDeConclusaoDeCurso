<?php
class permissionsController extends controller{

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
		if($user->hasPermission('permissions_view')){
			$permissions = new Permissions();
			$data['permissions_list'] = $permissions->getList();
			$data['permissions_groups_list'] = $permissions->getGroupList();

			//REDIRECIONA AO VIEW PERMISSIONS
			$this->loadTemplate('permissions', $data);
		}else{
			header("Location: ".BASE_URL);
		}
	}

	//ADICIOMA UMA NOVA PERMISSÃO * FUNÇÃO DA VIEWS PERMISSIONS
	public function add(){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();
		if($user->hasPermission('permissions_view')){
			$permissions = new Permissions();

			if(isset($_POST['name']) && !empty($_POST['name'])){
				$pname = addslashes($_POST['name']);
				$permissions->add($pname);
				header("Location: ".BASE_URL."/permissions");
			}
			
			$this->loadTemplate('permissions_add', $data);
		}else{
			header("Location: ".BASE_URL);
		}
	}

	//ADICIONA UM NOVO GRUPO * FUNÇÃO DA VIEWS PERMISSIONS
	public function add_group(){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();
		if($user->hasPermission('permissions_view')){
			$permissions = new Permissions();

			if(isset($_POST['name']) && !empty($_POST['name'])){
				$pname = addslashes($_POST['name']);
				$plist = $_POST['permissions'];//RECEBE O ARRAY DO CHECKBOX DA VIEWS 
				$permissions->addGroup($pname, $plist);//ENVIA OS DADOS PARA O MODEL PERMISSIONS FUNÇÃO ADDGROUP
				header("Location: ".BASE_URL."/permissions");
			}
			$data['permissions_list'] = $permissions->getList();


			$this->loadTemplate('permissions_addgroup', $data);
		}else{
			header("Location: ".BASE_URL);
		}
	}

	//DELETA UMA PERMISSÃO * FUNÇÃO DA VIEWS PERMISSIONS
	public function delete($id){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();
		if($user->hasPermission('permissions_view')){
			$permissions = new Permissions();

			$permissions->delete($id);
			header("Location: ".BASE_URL."/permissions");
		}else{
			header("Location: ".BASE_URL);
		}
	}

	//DELETA UM GRUPO * FUNÇÃO DA VIEWS PERMISSIONS
	public function delete_group($id){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();
		if($user->hasPermission('permissions_view')){
			$permissions = new Permissions();

			$permissions->deleteGroup($id);
			header("Location: ".BASE_URL."/permissions");
		}else{
			header("Location: ".BASE_URL);
		}
	}

	//EDITA DADOS DO GRUPO * FUNÇÃO DA VIEWS PERMISSIONS
	public function edit_group($id){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();
		if($user->hasPermission('permissions_view')){
			$permissions = new Permissions();

			if(isset($_POST['name']) && !empty($_POST['name'])){
				$pname = addslashes($_POST['name']);
				$plist = $_POST['permissions'];//RECEBE O ARRAY DO CHECKBOX DA VIEWS 
				$permissions->editGroup($pname, $plist, $id);//ENVIA OS DADOS PARA O MODEL PERMISSIONS FUNÇÃO ADDGROUP
				header("Location: ".BASE_URL."/permissions");
			}
			$data['permissions_list'] = $permissions->getList();
			$data['group_info'] = $permissions->getGroup($id);//ENVIA OS DADOS PARA O MODEL PERMISSIONS


			$this->loadTemplate('permissions_editgroup', $data);
		}else{
			header("Location: ".BASE_URL);
		}
	}

}

?>
