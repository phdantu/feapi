<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Livro extends CI_Model{
    public $idLivro;
    public $isbn;
    public $nome;
    public $editora;
    public $ano;
    public $idAutor;
    public function __construct($idLivro,$isbn,$nome,$editora,$ano,$idAutor)
    {
        $this->idLivro = $idLivro;
        $this->isbn = $isbn;
        $this->nome = $nome;
        $this->editora = $editora;
        $this->ano = $ano;
        $this->idAutor = $idAutor;
    }
    
}
?>