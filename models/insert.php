<?php
require_once("conexao.php");
	class Insert{
		public function create(Clientes $c){
			$sql = "INSERT INTO users(email,senha,nome) VALUES(?,?,?)";
			$pdo = Cone::getCone()->prepare($sql);
		//	$pdo->bindValue(1,$c->getEmail());
		//	$pdo->bindValue(2,$c->getSenha());
		//	$pdo->bindValue(3,$c->getNome());
			$pdo->execute(array($c->getEmail(),$c->getSenha(),$c->getNome()));
		}
		public function write(){
			$sql = "SELECT * FROM users";
			$pdo = Cone::getCone()->prepare($sql);
			$pdo->execute();
			if($pdo->rowCount() > 0){
				$resultado = $pdo->fetchAll(\PDO::FETCH_ASSOC);

				return $resultado;
			}
		}
		public function update($id,$nome,$email,$senha){
			$sql = "UPDATE users SET nome = ? , email = ?, senha = ? WHERE id = $id";
			$pdo = Cone::getCone()->prepare($sql);
			$pdo->execute(array($nome,$email,$senha));
		}

		public function delete($id){
			$sql  = "DELETE FROM users WHERE id = ?";
			$pdo = Cone::getCone()->prepare($sql);
			$pdo->execute(array($id));

		}
	}



