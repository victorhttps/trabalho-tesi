<?php

class Barba extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!isset($_SESSION["session"])) {
      header("Location: /index.php/login");
    }
  }

  public function index()
  {
    $this->load->model("barbamodel");

    $produtos = $this->barbamodel->selectTodos();
    $tabela = "";

    foreach ($produtos as $item) {
      $tabela = $tabela . " <tr>";
      if (isset($_SESSION["session"])) {
        $tabela = $tabela . "
          <td style='cursor: pointer'>
                <a href='/index.php/barba/alterar?id=" . $item->id . "'>
                ✏️</a> 
                <a href='/index.php/barba/excluir?id=" . $item->id . "'>
              ❌</a> 
              </td>";
      }

      $tabela = $tabela . "
              <td>" . $item->nome . "</td>
              <td>" . $item->perecivel . "</td>
              <td>" . $item->valor . "</td>
              <td>" . $item->tipo_prod . "</td>
              <td>
                <img src='" . $item->imagem . "' style='width:150px'/>
              </td>
          </tr>
        ";
    }

    $variavel = array(
      "lista_produtos" => $produtos,
      "tabela" => $tabela,
      "titulo" => "Você está em Padaria do Barba",
      "sucesso" => "Produto adicionado com sucesso!",
      "erro" => "Erro ao adicionar produto."
    );

    $this->template->load("templates/adminTemp", "barba/index", $variavel);
  }

  public function novo()
  {
    $nome = $_POST['nome'];
    $perecivel = $_POST['perecivel'];
    $valor = $_POST['valor'];
    $tipo = $_POST['tipo'];
    $imagem = $_POST['imagem'];

    $data = array(
      "nome" => $nome,
      "perecivel" => $perecivel,
      "valor" => $valor,
      "tipo" => $tipo,
      "imagem" => $imagem
    );

    $this->load->model("barbamodel");
    $this->barbamodel->criaProduto($data);
  }

  public function excluir()
  {
    $this->load->model("barbamodel");

    $id = $_GET["id"];

    $this->barbamodel->excluirProduto($id);

    header("Location: /index.php/barba");
  }

  public function alterar()
  {
    $this->load->model("barbamodel");

    $id = $_GET["id"];
    $retorno = $this->barbamodel->selectID($id);

    $data = array(
      "titulo" => "Alteração de produtos",
      "produto" => $retorno[0],
      "opcoes" => $this->comboTipos($retorno[0]->tipo)
    );

    $this->template->load("templates/adminTemp", "barba/formAlterar", $data);
  }

  public function salvarAlteracao()
  {

    $this->load->model("barbamodel");

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $perecivel =  $_POST["perecivel"];
    $valor =  $_POST["valor"];
    $tipo =  $_POST["tipo"];
    $imagem = $_POST["imagem"];

    $retorno = $this->barbamodel->alterarProduto($id, $nome, $perecivel, $valor, $tipo, $imagem);
    if ($retorno == true) {
      header('location: /index.php/barba');
    } else {
      echo "Erro ao alterar.";
    }
  }

  public function formNovo()
  {
    $opcao = $this->comboTipos(0);

    $data = array(
      'opcoes' => $opcao
    );

    $this->template->load("templates/adminTemp", "barba/formnovo", $data);
  }
  private function comboTipos($idTipo)
  {
    $this->load->model("tipoModel");
    $tipos = $this->tipoModel->selectTodos();
    $option = "";

    foreach ($tipos as $linha) {
      $selecionado = "";
      if ($idTipo == $linha->id)
        $selecionado = "selected";

      $option .= "<option 
      value='" . $linha->id . "' " . $selecionado . "
      >" . $linha->nome_tipo . " </option>";
    }
    return $option;
  }

  public function salvarNovo()
  {
    $this->load->model("barbamodel");

    $nome = $_POST['nome'];
    $perecivel = $_POST['perecivel'];
    $valor = $_POST['valor'];
    $tipo = $_POST['tipo'];
    $imagem = $_POST['imagem'];


    $retorno = $this->barbamodel->selectTipo($tipo);

    if ($retorno[0]->total > 0) {
      echo "Não pode incluir, já existe um total de: " . $retorno[0]->total . " Itens";
    } else {
      $retorno = $this->barbamodel->criaProduto($nome, $perecivel, $valor, $tipo, $imagem);
      header("location: /index.php/barba");
    }
  }
}
