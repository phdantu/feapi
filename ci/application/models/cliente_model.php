<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class cliente_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function getQuery()
	{
		$query = $this->db->get('cliente');
		foreach ($query->result() as $row)
		{
			$cliente[] = $row;
		}
		return $cliente;
	}
	public function getOne($id){
		$query = $this->db->query('SELECT * FROM cliente where idCliente='.$this->db->escape($id));
		return $cliente = $query->result();		
	}
    public function alterar($idCliente,$matricula,$nome,$telefone,$cep,$logradouro){
        $data = array(
			'idCliente' => $idCliente,
			'matricula' => $matricula,
            'nome' => $nome,
            'telefone' => $telefone,
            'cep' => $cep,
            'logradouro' => $logradouro
		);
		$this->db->where('idCliente', $idCliente);
		$this->db->update('cliente',$data);
		// Produces:
		//
		//      UPDATE mytable
		//      SET title = '{$title}', name = '{$name}', date = '{$date}'
		//      WHERE id = $id
		
		
	}
	
	public function salvar($matricula,$nome,$telefone,$cep,$logradouro){
        $data = array(
            'matricula' => $matricula,
            'nome' => $nome,
            'telefone' => $telefone,
            'cep' => $cep,
			'logradouro' => $logradouro
		);
		$this->db->insert('cliente',$data);
	}
	public function deletar($id){
		$this->db->delete('cliente', array('idCliente' => $id));
	}
}




?>