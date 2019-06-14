<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
		$this->load->view('cadastro_view');		
	}
	
	public function cadastrar_usuario()
	{
		$this->load->model('usuario_model');
		
		$this->load->view('cadastro_view');		
    }
}
