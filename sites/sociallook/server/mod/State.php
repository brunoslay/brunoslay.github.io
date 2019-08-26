<?php

class State
{	

	private $pdo;
	
	function __construct()
	{
		$host = "localhost"; //Host
		$user = "root";//Nome de usuario do banco de dados
		$pass = ""; //Senha do banco de dados
		$db   = "social_look"; //Banco de Dados

		//conexao

		$this->pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
	}

	function getLeads($email){

		$state = $this->pdo->prepare(" SELECT email FROM leads WHERE email = :email ");
		$state->bindParam(":email", $email);
		$state->execute();

		return $state->fetchAll(PDO::FETCH_ASSOC);
		// return $state->rowCount();


	}

	function saveLeads($email){

		$state = $this->pdo->prepare(" INSERT INTO leads (email) VALUES ( :email ) ");
		$state->bindParam(":email", $email);
		$state->execute();

		// return $state->fetchAll(PDO::FETCH_ASSOC);
		return $state->rowCount();


	}


	


}