<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
		$this->load->view('cadastro_usuario_view');		
	}
	
	public function cadastrar_admin()
	{		
		$this->load->view('cadastro_admin_view');		
	}
	
	public function cadastro()
	{
		$this->load->model('usuario_model');
		$cpf=str_replace(['+', '-'], '', filter_var($_POST['cpf'], FILTER_SANITIZE_NUMBER_INT));
		$dtnascimento=$_POST['data'];
		$nome=$_POST['nome'];
		$email=$_POST['email'];
		$senha=$_POST['senha'];
		$rua=$_POST['rua'];
		$numero=$_POST['numero'];
		$bairro=$_POST['bairro'];
		$cep=$_POST['cep'];
		if(isset($_POST['ctps']))
		{
			$ctps=$_POST['ctps'];
		}
		if(isset($_POST['cargo']))
		{
			$cargo=$_POST['cargo'];
		}
		$this->usuario_model->cadastrar($cpf, $dtnascimento, $nome, $email, $senha, $rua, $numero, $bairro, $cep, $ctps, $cargo);
	}
}
