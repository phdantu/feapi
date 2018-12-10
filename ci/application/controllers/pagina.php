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
		$dados['livro'] = $this->getQuery();
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
			$dados['cadastra'] = $this->db->affected_rows(); 
			$dados['titulo'] = "Cadastro de Livros";
			$this->load->view('successForm',$dados);
		}
	}
	public function getQuery()
	{
			/* $query = $this->db->query('SELECT * FROM livros where idLivro='.$this->db->escape($id));
			foreach ($query->result() as $row)
			{
				echo $row->idLivro;
				echo $row->isbn;
				echo $row->nome;
				echo $row->editora;
				echo $row->ano;
				echo $row->idAutor;
				return $livro = new Livro($row->$id, $row->isbn, $row->nome, $row->editora,$row->ano,$row->idAutor);
			} */
			$query = $this->db->get('livro');
			foreach ($query->result() as $row)
			{
				$livro[] = $row;
				//$livro[] = new Livro($row->$id, $row->isbn, $row->nome, $row->editora,$row->ano,$row->idAutor);
				//return $query;
			}
			return $livro;
	}
	public function getOne($id){
		$query = $this->db->query('SELECT * FROM livro where idLivro='.$this->db->escape($id));
		return $livro = $query->result();		
	}
	public function alter($id){
		$dados['tempLivro'] = $this->getOne($id);
		$dados['titulo'] = "Alteração de Livro";
		$this->load->view('alterar',$dados);
	}

	public function alterar(){
		$idLivro = $_POST["idLivro"];
		$isbn = $_POST["isbn"];
		$nome = $_POST["nome"];
		$editora = $_POST["editora"];
		$ano = $_POST["ano"];
		$idAutor = $_POST["idAutor"];

		$data = array(
			'isbn' => $isbn,
			'nome' => $nome,
			'editora' => $editora,
			'ano' => $ano,
			'idAutor' => $idAutor
		);
		$this->db->where('idLivro', $idLivro);
		$this->db->update('livro',$data);
		// Produces:
		//
		//      UPDATE mytable
		//      SET title = '{$title}', name = '{$name}', date = '{$date}'
		//      WHERE id = $id
		$dados['livro'] = $this->getQuery();
		$dados['titulo'] = "Tabela de Livro";
		$dados['altera'] = "Alteração efetuada com sucesso";
		$this->load->view('tabela',$dados);
	}
	public function deleta($id){
		$this->db->delete('livro', array('idLivro' => $id));
		$dados['livro'] = $this->getQuery();
		$dados['deleta'] = "Livro Deletado com sucesso";
		$dados['titulo'] = "Tabela de Livro";
		$this->load->view('tabela',$dados);
	}
}