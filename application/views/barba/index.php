<h1> Produtos da Padaria do barba </h1>
<a href="/index.php/barba/formnovo" class="btn btn-success"> Adicionar </a>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Options</th>
      <th>Nome</th>
      <th>Perecivel</th>
      <th>Valor</th>
      <th>Tipo</th>
      <th>Imagem</th>
    </tr>
  </thead>
  <?php
  echo $tabela;
  ?>

  <?php
  foreach ($lista_produtos as $item) {
    echo '
    <div style="border: 1px #ccc solid; border-radius: 5px; padding: 5px;
    width: 150px; height: 250px; float: left;margin:10px">
  <div>
    <img src="' . $item->imagem . '" style="width: 150px">
  </div>
    <div style="text-align: center">
      <h1 style="font-size:10px">' . $item->nome . '</h1>
      <h2 style="font-size:9px">' . $item->perecivel . '</h1>
      <h3 style="font-size:8px">' . $item->valor . '</h1>
      <h3 style="font-size:8px">' . $item->tipo . '</h1>
    </div>
  </div>
    ';
  }
  ?>
</table>