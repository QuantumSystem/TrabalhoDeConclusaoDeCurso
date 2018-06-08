<?php
class entradasController extends controller{
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
	public function getveiculos($id){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();
		//SE O USUARIO TIVER PERMISSAO PARA ACESSAR O VIEW
		if($user->hasPermission('entradas_view')){
			$veiculos = new Veiculos();

			$teste = array();
			// select from veiculos inner join visita where .... id = $id

			$teste['veiculos_list'] = $veiculos->getveiculos($id);

			$json = json_encode($teste);
			echo $json;
		}
	}

	public function index(){
		$data = array();
		$user = new Users();
		$user->setLoggedUser();
		$data['user_email'] = $user->getEmail();
		$data['user_name'] = $user->getNome();
		//SE O USUARIO TIVER PERMISSAO PARA ACESSAR O VIEW
		if($user->hasPermission('entradas_view')){
			$entradas = new Entradas();
			$residencias = new Residencias();
			$controle = new Controle();
			$veiculos = new Veiculos();
			$visitas = new Visitas();

			if(isset($_POST['cpf']) && !empty($_POST['cpf']) || isset($_POST['placa']) && !empty($_POST['placa'])){
				//Veículo
				$placa = addslashes($_POST['placa']);
				$modelo = addslashes($_POST['modelo']);
				$cor = addslashes($_POST['cor']);
								
				//Visita
				$nome = addslashes($_POST['nome']);
				$cpf = addslashes($_POST['cpf']);
				
				//Verifica se os campos do veículo são vazio
				//caso a visita não tenha veículo
				if($placa == "" && $modelo == "" && $cor == ""){
					//não faz nada!	
				}else{
					//Verifica se o veiculo já existe
					$v = $entradas->addVeiculos($modelo, $placa, $cor);
					if($v == '1'){
						$data['success_msg'] = "Salvo com sucesso!";
					}else{
						$data['error_msg'] = "Este veículo Já existe!";
					}

				}
				
				//Verifica a visita já existe
				if($nome == "" && $cpf == ""){
					//não faz nada!	
				}else{
					//Verifica se o veiculo já existe
					$p = $entradas->addVisitas($nome, $cpf);
					if($p == '1'){
						$data['success_msg'] = "Salvo com sucesso!";
					}else{
						$data['error_msg'] = "Esta visita Já existe!";
					}

				}

			}elseif (isset($_POST['visitas_id']) && !empty($_POST['visitas_id'])){
				$residencias_id = addslashes($_POST['residencias_id']);
				$veiculos_id = addslashes($_POST['veiculos_id']);
				$visitas_id = addslashes($_POST['visitas_id']);

				$controle->add($residencias_id, $veiculos_id, $visitas_id);
				header("Location: ".BASE_URL."/entradas");
			}
		$data['residencias_list'] = $residencias->getResidencias();
		$data['veiculos_list'] = $veiculos->getList();
		$data['visitas_list'] = $visitas->getList();
		//REDIRECIONA AO VIEW ENTRADAS
		$this->loadTemplate('entradas', $data);
		}else{
			header("Location: ".BASE_URL);
		}
	}

}
?>