<?php
class Login extends CI_Controller
{
  private $crypt = "QuebraAEscobar,,,.ç";

  public function __construct()
  {
    parent::__construct();
    $this->load->model("loginModel");
  }

  public function SalvarRegistro()
  {
    echo $_POST["nome"];
    echo $_POST["email"];

    $num1 = rand(0, 9);
    $num2 = rand(0, 9);
    $num3 = rand(0, 9);
    $num4 = rand(0, 9);
    $num5 = rand(0, 9);
    $num6 = rand(0, 9);

    $chave = $num1 . '' . $num2 . '' .
      $num3 . '-' . $num4 . '' .
      $num5 . '' . $num6 . '';

    $data = array(
      "email" => $_POST["email"],
      "nome" => $_POST["nome"],
      "chave" => $chave
    );

    //$this->load->model("loginModel");
    $retorno = $this->loginModel->registrar($data);
    if ($retorno) {
      echo "Veja seu e-mail para confirmar o cadastro.";
    } else {
      echo "Erro ao criar usuário";
    }
  }
  //Chamando o formulario de registro
  public function Registro()
  {
    $this->load->view('templates/registrar');
  }
  //Apenas chamando o formulario registrarsenha
  public function RegistrarSenha()
  {
    $this->load->view('templates/registrarsenha');
  }
  //Alteração de senha
  public function AlterarSenha()
  {
    $senha = md5($_POST["senha"] . $this->crypt);
    $email = $_POST["email"];
    $chave = $_POST["chave"];
    //$this->load->model("loginModel");
    $retorno = $this->loginModel->criarSenha($email, $senha, $chave);

    if ($retorno) {
      echo "Senha cadastrada com sucesso.";
    } else {
      echo "Erro ao cadastrar senha";
    }
  }

  //Tela de login 
  public function Index()
  {
    $this->template->load("templates/adminLogin", "login/login");
  }

  public function ValidaLogin()
  {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $senha = md5($senha . $this->crypt);

    $retorno = $this->loginModel->ValidaLogin($email, $senha);
    if ($retorno) {
      $_SESSION["session"] = array(
        "email" => $email,
        "admin" => true
      );
      echo "Login efetuado com sucesso!";
      header("Location: /index.php/barba");
    } else {
      echo "Usuário e/ou senha inválida.";
    }
  }

  public function Deslogar()
  {
    unset($_SESSION["session"]);
    header("Location: /index.php/login");
  }
}
