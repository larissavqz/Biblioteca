<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livro extends CI_Controller {

	public function index()
	{
		$this->load->view('cadastro_view');
    }
}
