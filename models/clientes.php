<?php
	class Clientes{
		private static $nome;
		private static $email;
		private static $senha;

		public function setNome($nome){
			self::$nome = $nome;
		}
		public function setEmail($email){
			self::$email = $email;
		}
		public function setSenha($senha){
			self::$senha = $senha;
		}



		public function getNome(){
			return self::$nome;
		}
		public function getEmail(){
			return self::$email;
		}
		public function getSenha(){
			return self::$senha;
		}



	}


?>