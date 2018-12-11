<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pagina extends CI_Controller {

    function __contruct(){
		parent::__construct();
		
    }

	public function index()
	{
		$dados['titulo'] = "Cadastro de Livros";
		$dados['autores'] = $this->getQueryAutores();
		$this->load->view('home',$dados);
	}

	public function tabela()
	{
		$dados['titulo'] = "Tabela de Livros";
		$dados['livro'] = $this->livro_model->getQuery();
		$this->load->view('tabela',$dados);
	}
	public function cadastroAutor(){
		$dados['titulo'] = "Cadastro de Autores";
		$this->load->view('cadastroAutores',$dados);
	}
	public function tabelaAutor(){
		$dados['titulo'] = "Tabela de Autores";
		$dados['autores'] = $this->getQueryAutores();
		$this->load->view('tabelaAutores',$dados);
	}
	public function logout(){
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
		$this->login();
	}
	public function login(){
		$dados['titulo'] = "Tabela de Livros";
		$this->load->view('login',$dados);
	}
	public function header(){
		$login = $_POST["login"];
		$senha = $_POST["senha"];
		$usuario = $this->getOneUser($login,$senha);
		if(empty($usuario)){
			$dados['titulo'] = "Cadastro de Livros";
			$dados['loginFail'] = "Dados incorretos";
			$this->load->view('login',$dados);
		}else{
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$dados['titulo'] = "Cadastro de Livros";
			$dados['autores'] = $this->getQueryAutores();
			$this->load->view('home',$dados);
		}
	}
	public function getOneUser($login,$senha){
		$query = $this->db->query('SELECT * FROM usuario where nome='.$this->db->escape($login).' AND senha='.$this->db->escape($senha));
		return $user = $query->result();		
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
			/* $sql = "INSERT INTO livro(isbn,nome,editora,ano,idAutor) 
				VALUES (".$this->db->escape($isbn).", ".$this->db->escape($nome).", 
				".$this->db->escape($editora).", ".$this->db->escape($ano).", 
				".$this->db->escape($idAutor).")";
			$this->db->query($sql); */
			$this->livro_model->insert($isbn,$nome,$editora,$ano,$idAutor);
			$dados['cadastra'] = $this->db->affected_rows(); 
			$dados['titulo'] = "Cadastro de Livros";
			$this->load->view('successForm',$dados);
		}
	}

	public function salvarAutor(){
		$nome = $_POST["nome"];
		$pais = $_POST["pais"];
		$sql = "INSERT INTO autor(nome,pais) 
				VALUES (".$this->db->escape($nome).", ".$this->db->escape($pais).")";
			$this->db->query($sql);
			//$dados['cadastra'] = $this->db->affected_rows(); 
			$dados['titulo'] = "Cadastro de Autores";
			$this->load->view('successForm',$dados);
	}
	public function getQueryAutores()
	{
			$query = $this->db->get('autor');
			foreach ($query->result() as $row)
			{
				$autor[] = $row;
				//$livro[] = new Livro($row->$id, $row->isbn, $row->nome, $row->editora,$row->ano,$row->idAutor);
				//return $query;
			}
			return $autor;
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
	public function getOneAutor($id){
		$query = $this->db->query('SELECT * FROM autor where idAutor='.$this->db->escape($id));
		return $livro = $query->result();		
	}
	public function alter($id){
		$dados['tempLivro'] = $this->getOne($id);
		$dados['titulo'] = "Alteração de Livro";
		$this->load->view('alterar',$dados);
	}
	public function alterAutor($id){
		$dados['tempAutor'] = $this->getOneAutor($id);
		$dados['titulo'] = "Alteração de Livro";
		$this->load->view('alteraAutor',$dados);
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
		$dados['livro'] = $this->livro_model->getQuery();
		$dados['titulo'] = "Tabela de Livro";
		$dados['altera'] = "Alteração efetuada com sucesso";
		$this->load->view('tabela',$dados);
	}
	public function alterarAutor(){
		$idAutor = $_POST["idAutor"];
		$nome = $_POST["nome"];
		$pais = $_POST["pais"];

		$data = array(
			'idAutor' => $idAutor,
			'nome' => $nome,
			'pais' => $pais
		);
		$this->db->where('idAutor', $idAutor);
		$this->db->update('autor',$data);

		$dados['autores'] = $this->getQueryAutores();
		$dados['titulo'] = "Tabela de Autores";
		$dados['altera'] = "Alteração efetuada com sucesso";
		$this->load->view('tabelaAutores',$dados);
	}
	public function deleta($id){
		$this->db->delete('livro', array('idLivro' => $id));
		$dados['livro'] = $this->getQuery();
		$dados['deleta'] = "Livro Deletado com sucesso";
		$dados['titulo'] = "Tabela de Livro";
		$this->load->view('tabela',$dados);
	}
	public function deletaAutor($id){
		$this->db->delete('autor', array('idAutor' => $id));
		$dados['autores'] = $this->getQueryAutores();
		$dados['deleta'] = "Autor Deletado com sucesso";
		$dados['titulo'] = "Tabela de Autores";
		$this->load->view('tabelaAutores',$dados);
	}
}