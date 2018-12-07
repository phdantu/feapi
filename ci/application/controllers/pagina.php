<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pagina extends CI_Controller {

    function __contruct(){
		parent::__construct();
		
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

	public function salvar()
	{	
		$isbn = $_POST["isbn"];
		$nome = $_POST["nome"];
		$editora = $_POST["editora"];
		$ano = $_POST["ano"];
		$idAutor = $_POST["idAutor"];
		/* $this->form_validation->set_rules('IdAutor', 'IdAutor', 'required');
		$this->form_validation->set_rules('isbn', 'isbn', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('editora', 'Editora', 'required');
		if ($this->form_validation->run() == FALSE) */
		if (false)
		{	
			$this->form_validation->set_message('oi');
			$dados['titulo'] = "Cadastro de Livros";
			$this->load->view('myform',$dados);
		}
		else
		{
			$sql = "INSERT INTO livro(isbn,nome,editora,ano,idAutor) 
				VALUES (".$this->db->escape($isbn).", ".$this->db->escape($nome).", 
				".$this->db->escape($editora).", ".$this->db->escape($ano).", 
				".$this->db->escape($idAutor).")";
			$this->db->query($sql);
			$dados['resultSet'] = $this->db->affected_rows(); 
			$dados['titulo'] = "Cadastro de Livros";
			$this->load->view('successForm',$dados);
		}
	}
	public function getQuery($id)
	{
		if(isset($id)){
			$query = $this->db->query('SELECT * FROM livros where idLivro='.$this->db->escape($id));
			foreach ($query->result() as $row)
			{
				echo $row->idLivro;
				echo $row->isbn;
				echo $row->nome;
				echo $row->editora;
				echo $row->ano;
				echo $row->idAutor;
				return $livro = new Livro($row->$id, $row->isbn, $row->nome, $row->editora,$row->ano,$row->idAutor);
			}
		}
		else{
			
			$query = $this->db->get('livro');
			foreach ($query->result() as $row)
			{
				echo $row->idLivro;
				echo $row->isbn;
				echo $row->nome;
				echo $row->editora;
				echo $row->ano;
				echo $row->idAutor;
				$livro[] = new Livro($row->$id, $row->isbn, $row->nome, $row->editora,$row->ano,$row->idAutor);
				return $livro;
			}
		}
	}
}