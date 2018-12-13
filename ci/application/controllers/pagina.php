<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pagina extends CI_Controller {

    function __contruct(){
		parent::__construct();
		
    }
	//chama a view de login
	public function index()
	{
		$dados['titulo'] = "Cadastro de Livros";
		$this->load->view('login',$dados);
	}
	//chama a view do formulario de livro
	public function cadastro()
	{
		$dados['titulo'] = "Cadastro de Livros";
		$dados['autores'] = $this->autor_model->getQuery();
		$this->load->view('home',$dados);
	}
	//puxa os dados para mostrar na tabela
	public function tabela()
	{
		$dados['titulo'] = "Tabela de Livros";
		$dados['livro'] = $this->livro_model->getQuery();
		$this->load->view('tabela',$dados);
	}
	
	public function cadastroCliente(){
		$dados['titulo'] = "Cadastro de Autores";
		$this->load->view('cadastroAutores',$dados);
	}
	public function tabelaCliente(){
		$dados['titulo'] = "Tabela de Autores";
		$dados['autores'] = $this->autor_model->getQuery();
		$this->load->view('tabelaAutores',$dados);
	}
	//Destroi as variaveis de sessao
	public function logout(){
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
		$this->login();
	}
	public function login(){
		$dados['titulo'] = "Cadastro de Livros";
		$this->load->view('login',$dados);
	}
	//Verifica os dados do login, e cria a sessao
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
			$dados['autores'] = $this->autor_model->getQuery();
			$this->load->view('home',$dados);
		}
	}

	public function getOneUser($login,$senha){
		$query = $this->db->query('SELECT * FROM usuario where nome='.$this->db->escape($login).' AND senha='.$this->db->escape($senha));
		return $user = $query->result();		
	}
	//Pega os dados para encaminhar para o livro model, e retorna para o formulario de sucesso
	public function salvar()
	{	
		$isbn = $_POST["isbn"];
		$nome = $_POST["nome"];
		$editora = $_POST["editora"];
		$ano = $_POST["ano"];
		$idAutor = $_POST["idAutor"];
		$this->livro_model->salvar($isbn,$nome,$editora,$ano,$idAutor);
		//$dados['cadastra'] = $this->db->affected_rows(); 
		$dados['titulo'] = "Cadastro de Livros";
		$this->load->view('successForm',$dados);
	}
	
	//carrega o livro e manda para o formulario
	public function alter($id){
		$dados['tempLivro'] = $this->livro_model->getOne($id);
		$dados['titulo'] = "Alteração de Livro";
		$this->load->view('alterar',$dados);
	}
	
	//recebe os dados para alterar e encaminha para o MODEL do livro
	public function alterar(){
		$idLivro = $_POST["idLivro"];
		$isbn = $_POST["isbn"];
		$nome = $_POST["nome"];
		$editora = $_POST["editora"];
		$ano = $_POST["ano"];
		$idAutor = $_POST["idAutor"];
		//manda os dados para o model para edição
		$this->livro_model->alterar($idLivro,$isbn,$nome,$editora,$ano,$idAutor);

		$dados['livro'] = $this->livro_model->getQuery();
		$dados['titulo'] = "Tabela de Livro";
		$dados['altera'] = "Alteração efetuada com sucesso";
		$this->load->view('tabela',$dados);
	}
	
	public function deleta($id){
		$this->livro_model->deletar($id);
		$dados['livro'] = $this->livro_model->getQuery();
		$dados['deleta'] = "Livro Deletado com sucesso";
		$dados['titulo'] = "Tabela de Livro";
		$this->load->view('tabela',$dados);
	}
	/* public function cadastroAutor(){
		$dados['titulo'] = "Cadastro de Autores";
		$this->load->view('cadastroAutores',$dados);
	}
	public function tabelaAutor(){
		$dados['titulo'] = "Tabela de Autores";
		$dados['autores'] = $this->autor_model->getQuery();
		$this->load->view('tabelaAutores',$dados);
	}
	//carrega o livro e manda para o formulario
	public function alterAutor($id){
		$dados['tempAutor'] = $this->autor_model->getOne($id);
		$dados['titulo'] = "Alteração de Livro";
		$this->load->view('alteraAutor',$dados);
	}
	//Pega os dados para encaminhar para o livro model, e retorna para o formulario de sucesso
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
	//recebe os dados para alterar e encaminha para o MODEL do autor
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
	} */
}