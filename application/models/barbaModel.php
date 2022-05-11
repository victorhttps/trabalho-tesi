<?php
class barbaModel extends CI_Model
{
  public function criaProduto($nome, $perecivel, $valor, $tipo, $imagem)
  {
    $sql = "INSERT INTO Produto
        (nome, perecivel, valor, tipo, imagem) VALUES
        ('" . $nome . "', '" . $perecivel . "', '" . $valor . "', '" . $tipo . "', '" . $imagem . "')";
    $this->db->query($sql);
    return true;
  }

  public function excluirProduto($id)
  {
    $sql = "DELETE FROM produto WHERE ID = " . $id;
    $this->db->query($sql);
    return true;
  }

  public function alterarProduto($id, $nome, $perecivel, $valor, $tipo, $imagem)
  {
    $sql = "UPDATE produto 
        SET
          nome = '" . $nome . "',
          perecivel = '" . $perecivel . "',
          valor =' " . $valor . "',
          tipo = '" . $tipo . "',
          imagem = '" . $imagem . "'
        WHERE id = " . $id . "
      ";
    $this->db->query($sql);
    return true;
  }

  public function selectTodos()
  {
    $retorno = $this->db->query("SELECT P.*, T.nome_tipo AS tipo_prod
      FROM PRODUTO AS P
      INNER JOIN TIPO_PRODUTO AS T
     ON T.id = P.tipo");
    return $retorno->result();
  }

  public function selectID($id)
  {
    $retorno = $this->db->query("SELECT * FROM produto where id = " . $id);
    return $retorno->result();
  }

  public function selectTipo($tipo)
  {
    $sql = "SELECT COUNT(1) as total FROM produto where tipo= '" . $tipo . "'";
    $retorno = $this->db->query($sql)->result();
    return $retorno;
  }
}
