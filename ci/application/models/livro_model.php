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
    function insert($isbn,$nome,$editora,$ano,$idAutor){
        $sql = "INSERT INTO livro(isbn,nome,editora,ano,idAutor) 
				VALUES (".$this->db->escape($isbn).", ".$this->db->escape($nome).", 
				".$this->db->escape($editora).", ".$this->db->escape($ano).", 
				".$this->db->escape($idAutor).")";
			return $this->db->query($sql);
			
    }
    function alter(){
        
        $this->db->update('livro',$data);
    }
}




?>