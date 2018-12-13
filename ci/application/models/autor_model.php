<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class autor_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function getQuery()
	{
			$query = $this->db->get('autor');
			foreach ($query->result() as $row)
			{
				$autor[] = $row;
            }
			return $autor;
	}
	public function getOne($id){
		$query = $this->db->query('SELECT * FROM autor where idAutor='.$this->db->escape($id));
		return $autor = $query->result();		
	}
    public function alterar($idAutor,$nome,$pais){
        $data = array(
			'idAutor' => $idAutor,
			'nome' => $nome,
			'pais' => $pais
		);
		$this->db->where('idAutor', $idAutor);
		$this->db->update('autor',$data);
		// Produces:
		//
		//      UPDATE mytable
		//      SET title = '{$title}', name = '{$name}', date = '{$date}'
		//      WHERE id = $id
		
		
	}
	
	public function salvar($nome,$pais){
		$data = array(
			'nome' => $nome,
			'pais' => $pais
		);
		$this->db->insert('autor',$data);
	}
	public function deletar($id){
		$this->db->delete('autor', array('idAutor' => $id));
	}
}




?>