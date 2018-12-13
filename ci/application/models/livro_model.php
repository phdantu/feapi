<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class livro_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function getQuery()
	{
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
    function insert($isbn,$nome,$editora,$ano,$idAutor){
        $sql = "INSERT INTO livro(isbn,nome,editora,ano,idAutor) 
				VALUES (".$this->db->escape($isbn).", ".$this->db->escape($nome).", 
				".$this->db->escape($editora).", ".$this->db->escape($ano).", 
				".$this->db->escape($idAutor).")";
			return $this->db->query($sql);
			
	}
    function alterar($idLivro,$isbn,$nome,$editora,$ano,$idAutor){
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
		
		
	}
	
	function salvar($isbn,$nome,$editora,$ano,$idAutor){
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
			/* $sql = "INSERT INTO livro(isbn,nome,editora,ano,idAutor) 
				VALUES (".$this->db->escape($isbn).", ".$this->db->escape($nome).", 
				".$this->db->escape($editora).", ".$this->db->escape($ano).", 
				".$this->db->escape($idAutor).")";
			$this->db->query($sql); */
			$this->livro_model->insert($isbn,$nome,$editora,$ano,$idAutor);
			
		}
	}
	function deletar($id){
		$this->db->delete('livro', array('idLivro' => $id));
	}
}




?>