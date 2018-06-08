<?php
class Permissions extends model{

	private $group;
	private $permissions;

	public function setGroup($id){
		$this->grou = $id;
		$this->permissions = array();

		$sql = $this->db->prepare("SELECT params FROM permission_groups WHERE id = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$row = $sql->fetch();

			if(empty($row['params'])){
				$row['params'] = '0';
			}

			$params = $row['params'];

			$sql = $this->db->prepare("SELECT name FROM permission_params WHERE id IN ($params)");
			$sql->bindValue(':id', $id);
			$sql->execute();

			if($sql->rowCount() > 0){
				foreach($sql->fetchAll() as $item){
					$this->permissions[] = $item['name'];
				}
			}
		}
	}

	public function hasPermission($name){
		if(in_array($name, $this->permissions)){
			return true;
		}else{
			return false;
		}
	}

	public function getList(){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM permission_params");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getGroupList(){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM permission_groups");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getGroup($id){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM permission_groups WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
			$array['params'] = explode(',', $array['params']);
		}

		return $array;
	}

	public function add($name){
		$sql = $this->db->prepare("INSERT INTO permission_params SET name = :name");
		$sql->bindValue(":name", $name);
		$sql->execute();
	}

	public function addGroup($name, $plist){
		$params = implode(',', $plist);//ADICIONA OS DADOS DO ARRAY COM VIRGULA NO PARAMS
		$sql = $this->db->prepare("INSERT INTO permission_groups SET name = :name, params = :params");
		$sql->bindValue(":name", $name);
		$sql->bindValue(":params", $params);
		$sql->execute();
	}

	public function editGroup($name, $plist, $id){
		$params = implode(',', $plist);//ADICIONA OS DADOS DO ARRAY COM VIRGULA NO PARAMS
		$sql = $this->db->prepare("UPDATE permission_groups SET name = :name, params = :params WHERE id = :id");
		$sql->bindValue(":name", $name);
		$sql->bindValue(":params", $params);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function delete($id){
		$sql = $this->db->prepare("DELETE FROM permission_params WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		
	}

	public function deleteGroup($id){
		$user = new Users();

		//PEGA O METODO DO MODEL USERS * SE NAO TIVER USUARIOS NO GRUPO ENTAO DELETA
		if($user->findUserInGroup($id) == false){
			$sql = $this->db->prepare("DELETE FROM permission_groups WHERE id = :id");
			$sql->bindValue(":id", $id);
			$sql->execute();
		}
	}
}
?>