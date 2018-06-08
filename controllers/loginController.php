<?php
class loginController extends controller{

	public function index(){
		$data = array();

		//VERIFICA SE O CAMPO EMAIL NÃO ESTA VAZIO
		if(isset($_POST['email']) && !empty($_POST['email'])){
			$email = addslashes($_POST['email']);
			$pass = addslashes($_POST['password']);

			//ADICIONA O MODEL A VARIAVEL USERS
			$users = new Users();

			//SE O LOGIN E A SENHA DO USUARIO ESTIVER CORRETA
			//REDIRECIONA PARA O HOME
			//SE NAO MANDA A MENSAGEM DE ERRO
			if($users->doLogin($email, $pass)){
				header("Location: ".BASE_URL);
				exit;
			}else{
				$data['error'] = 'E-mail e/ou senha errados.';
			}

		}

		$this->loadView('login', $data);
	}

	//CHAMA A FUNCAO LOGOUT QUE ESTA DENTRO DO MODEL USERS
	//QUE MANDA PARA A PAGINA DE LOGIN
	public function logout(){
		$user = new Users();
		$user->logout();
		header("Location: ".BASE_URL);
	}

}

?>