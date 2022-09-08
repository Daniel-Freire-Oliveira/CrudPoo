<?php

	class Cone{
		private static $instancia;

		public static function getCone(){
			if(!isset(self::$instancia)){
				self::$instancia = new \PDO('mysql:host=localhost;dbname=usuarios;charset=utf8','root','');
			}

			return self::$instancia;
		}
	}