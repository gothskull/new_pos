<?php 

class Conexion
{
	static public function conectar()
	{
		$link = new PDO('mysql:host=localhost;dbname=practica_pos','root','');
		$link->exec('set names utf8');

		return $link;
		
	}
}