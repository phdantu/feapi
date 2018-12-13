<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente extends CI_Controller {
    function __contruct(){
		parent::__construct();
		
    }
    public function cadastroCliente(){
		$dados['titulo'] = "Cadastro de Clientes";
		$this->load->view('cadastroCliente',$dados);
	}
	public function tabelaCliente(){
		$dados['titulo'] = "Tabela de Clientes";
		if($this->cliente_model->getQuery()){
			$dados['clientes'] = $this->cliente_model->getQuery();
			$this->load->view('tabelaClientes',$dados);
		}else{
			$this->load->view('cadastroCliente',$dados);
		}
	}
    	//Pega os dados para encaminhar para o livro model, e retorna para o formulario de sucesso
	public function salvarCliente(){
        $matricula = $_POST["matricula"];
		$nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $cep = $_POST["cep"];
        $logradouro = $_POST["logradouro"];
        
        $this->cliente_model->salvar($matricula,$nome,$telefone,$cep,$logradouro);
			//$dados['cadastra'] = $this->db->affected_rows(); 
			$dados['titulo'] = "Cadastro de Clientes";
			$this->load->view('successForm',$dados);
    }
    public function salvarClienteParaConfirmar(){
		$cep = $_POST["cep"];
		$url = "https://viacep.com.br/ws/".$cep."/xml/";
		
		//abre a conexao
		$ch = curl_init();
		//define a url
		curl_setopt($ch, CURLOPT_URL, $url);
		//define para trazer o xml como string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		//transforma a string de resultado em um xml
		$xml = simplexml_load_string($result);
		$logradouro = $xml->logradouro;

       /*  $xml = simplexml_load_string($url);
        print_r($xml);
        die(); */

		/*$this->load->library('guzzle');

		 $client = new GuzzleHttp\Client();
		$res = $client->request('GET', $url);
		print_r($res->getBody());
		$dados['dados'] = $res->getBody(); */


		$dados['matricula'] = $_POST["matricula"];
		$dados['nome'] = $_POST["nome"];
		$dados['telefone'] = $_POST["telefone"];
		$dados['cep'] = $cep;
		$dados['logradouro'] = $logradouro;
		$dados['titulo'] = "Cadastro de Clientes";
		 $this->load->view('confirmaCadastroCliente',$dados);
	}
	
/* 	public function consulta(){
    
        $cep = $this->input->post('cep');
        
        $this->load->library('curl');
        
        echo $this->curl->consulta($cep);
        
    } */
    //carrega o livro e manda para o formulario
	public function alterCliente($id){
		$dados['tempCliente'] = $this->cliente_model->getOne($id);
		$dados['titulo'] = "Alteração de Cliente";
		$this->load->view('alteraCliente',$dados);
    }
    public function alterarCliente(){
		$idCliente = $_POST["idCliente"];
		$matricula = $_POST["matricula"];
		$nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $cep = $_POST["cep"];
        $logradouro = $_POST["logradouro"];

		$this->autor_model->alterar($idCliente,$matricula,$nome,$telefone,$cep,$logradouro);

		$dados['clientes'] = $this->cliente_model->getQuery();
		$dados['titulo'] = "Tabela de Clientes";
		$dados['altera'] = "Alteração efetuada com sucesso";
		$this->load->view('tabelaClientes',$dados);
    }
    public function deletaCliente($id){
		$this->cliente_model->deletar($id);
		if($this->cliente_model->getQuery() !== null){
			$dados['clientes'] = $this->cliente_model->getQuery();
			$dados['deleta'] = "Autor Deletado com sucesso";
			$dados['titulo'] = "Tabela de Clientes";
			$this->load->view('tabelaClientes',$dados);
		}else{
			$this->load->view('cadastroCliente',$dados);
		}
	}

}
?>