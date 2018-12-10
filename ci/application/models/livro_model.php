<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class livro_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function getAll(){
        $this->load->database();
        $query = $this->db->query('SELECT * FROM livros');
            //foreach ($query->result() as $row)
            //{
                //$livro[] = array();
                //$livro = new Livro($row->idLivro, $row->isbn, $row->nome, $row->editora,$row->ano,$row->idAutor);
                //$livro = new Livro($row['dLivro'], $row['isbn'], $row['nome'], $row['editora'],$row['ano'],$row['idAutor']);
            //}
            $livro = $query->row_array();
        }


    function insert(){
        $sql = "INSERT INTO livro(isbn,nome,editora,ano,idAutor) VALUES (".$this->db->escape($title).", ".$this->db->escape($name).")";
        $this->db->query($sql);
        echo $this->db->affected_rows();
    }
    function alter(){
        
        $this->db->update('livro',$data);
    }
}




?>