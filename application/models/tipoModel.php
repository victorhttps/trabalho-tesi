<?php
class tipoModel extends CI_Model
{
  public function selectTodos()  {
    $dados = $this->db->query("SELECT * FROM tipo_produto ORDER BY nome_tipo")->result();
    return $dados;
  }
  public function inserir($dados) {
    
    try{
      $this->db->insert('nome_tipo', $dados);
      return true;
    }
    catch(Exception $ex){
      return false;
    }
  }

}
