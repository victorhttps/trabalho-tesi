<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
</head>

<body>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de veículo</h5>

                        <!-- Vertical Form -->
                        <form method="POST" action="/index.php/barba/salvaralteracao">
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" value="<?php echo $produto->nome; ?>" required>
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Perecivel</label>
                                <input type="text" class="form-control" name="perecivel" value="<?php echo $produto->perecivel; ?>" required>
                            </div>
                            <!--  <input type="text" class="form-control" name="perecivel" required> -->
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Valor</label>
                                <input type="text" class="form-control" name="valor" value="<?php echo $produto->valor; ?>" required>
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Tipo</label>
                                <select name="tipo" class="form-select" required>
                                    <option selected value="">Selecione o tipo do produto</option>
                                    <?php echo $opcoes; ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Imagem</label>
                                <input type="text" class="form-control" name="imagem" value="<?php echo $produto->imagem; ?>" required>
                            </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-secondary" href="/index.php/barba">Voltar/Cancelar</a>
                    </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>

        </div>

        </div>
    </section>

</body>

</html>