<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		//$this->load->view('welcome_message');
		//$this->template->load('templates/admintemp', 'welcome_message');
		$this->load->model("barbaModel");

		$produtos = $this->barbaModel->selectTodos();
		$tabela = "";

		//echo "Bem vindo " . @$_SESSION["tesi2022"]["email"];

		foreach ($produtos as $item) {
			//GET

			$tabela = $tabela . "<div class='col-md-4'>";
			$tabela = $tabela . "
					
			<a href='single-product.html'><img src='" . $item->imagem . "' style='width:250px'; height='250px';/></a>
					<div class='product-wid-price'><h4>" . $item->nome . "</h4>
					<h4 '><br>R$: " . $item->valor . "</br></div></h4>
				</div>			";
		}
		$variavel = array(
			"lista_produtos" => $produtos,
			"tabela" => $tabela,
			"titulo" => "Você está em Marquinhos admin",
			"sucesso" => "Veiculo add com sucesso",
			"erro" => "sdadasda"
		);

		$this->template->load("templates/main", "main/main", $variavel);
		//$this->template->load('templates/main', 'welcome_message');
	}
	/*public function admin()
	{
		//$this->load->view('welcome_message');
		$this->template->load('templates/admintemp', 'welcome_message');
		//$this->template->load('index/product', 'welcome_message');
	}*/
}
