<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Autor extends CI_Controller {

    function __contruct(){
		parent::__construct();
		
    }
    public function cadastroAutor(){
		$dados['titulo'] = "Cadastro de Autores";
		$this->load->view('cadastroAutores',$dados);
	}
	public function tabelaAutor(){
		$dados['titulo'] = "Tabela de Autores";
		$dados['autores'] = $this->autor_model->getQuery();
		$this->load->view('tabelaAutores',$dados);
	}
    	//Pega os dados para encaminhar para o livro model, e retorna para o formulario de sucesso
	public function salvarAutor(){
		$nome = $_POST["nome"];
        $pais = $_POST["pais"];
        
        $this->autor_model->salvar($nome,$pais);
		//$sql = "INSERT INTO autor(nome,pais) VALUES (".$this->db->escape($nome).", ".$this->db->escape($pais).")";
			//$this->db->query($sql);
			//$dados['cadastra'] = $this->db->affected_rows(); 
			$dados['titulo'] = "Cadastro de Clientes";
			$this->load->view('successForm',$dados);
    }
    //carrega o livro e manda para o formulario
	public function alterAutor($id){
		$dados['tempAutor'] = $this->autor_model->getOne($id);
		$dados['titulo'] = "Alteração de Livro";
		$this->load->view('alteraAutor',$dados);
    }
    public function alterarAutor(){
		$idAutor = $_POST["idAutor"];
		$nome = $_POST["nome"];
		$pais = $_POST["pais"];

		$this->autor_model->alterar($idAutor,$nome,$pais);

		$dados['autores'] = $this->autor_model->getQuery();
		$dados['titulo'] = "Tabela de Autores";
		$dados['altera'] = "Alteração efetuada com sucesso";
		$this->load->view('tabelaAutores',$dados);
    }
    public function deletaAutor($id){
		$this->autor_model->deletar($id);
		$dados['autores'] = $this->autor_model->getQuery();
		$dados['deleta'] = "Autor Deletado com sucesso";
		$dados['titulo'] = "Tabela de Autores";
		$this->load->view('tabelaAutores',$dados);
	}

}

?>