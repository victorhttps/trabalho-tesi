<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar nova senha</title>
</head>
<body>
  <form action="/index.php/login/alterarsenha" method="POST">
    <label>E-mail</label>
    <input type="email" name="email" required>
    <br/>
    <label>Senha</label>
    <input type="password" name="senha" required>
    </br>
    <label>Chave</label>
    <input type="text" name="chave" required>
    </br>
    <input type="submit" value="Criar">

  </form>
</body>
</html>