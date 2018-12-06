<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

    function __contruct(){
		parent::__construct();
		//$this->load->helper('url');
    }

	public function index()
	{
		$dados['titulo'] = "Cadastro de Livros";
		$this->load->view('home',$dados);
	}

	public function tabela()
	{
		$dados['titulo'] = "Tabela de Livros";
		$this->load->view('tabela',$dados);
	}
}