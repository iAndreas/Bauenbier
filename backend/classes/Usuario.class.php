<?php
require_once "autoload.php";

class Usuario {

	private $usuario;
	private $nome;
	private $senha;
	private $dataNascimento;
	private $ultimoLogin;
	private $email;

	public function setUsuario($usuario){$this->usuario=$usuario;}
	public function getUsuario(){return $this->usuario;}
	
	public function setNome($nome){$this->nome=$nome;}
	public function getNome(){return $this->nome;}
	
	public function setSenha($senha){$this->senha=$senha;}
	public function getSenha(){return $this->senha;}
	
	public function setDataNascimento($dataNascimento){$this->dataNascimento=$dataNascimento;}
	public function getDataNascimento(){return $this->dataNascimento;}
	
	public function setUltimoLogin($ultimoLogin){$this->ultimoLogin=$ultimoLogin;}
	public function getUltimoLogin(){return $this->ultimoLogin;}
	
	public function setEmail($email){$this->email=$email;}
	public function getEmail(){return $this->email;}
	
	public function __toString(){
			
		return " Usuario: ".$this->usuario." | Senha: ".$this->senha." | Nome: ".$this->nome." | Data de nascimento: ".$this->dataNascimento." | Último login: ".$this->ultimoLogin." | E-Mail: ".$this->email;
	}
}
?>