<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar novo usuário</title>
</head>
<body>
  <form action="/index.php/login/salvarregistro" method="POST">
    <label>E-mail</label>
    <input type="email" name="email" required>
    <br/>
    <label>Nome</label>
    <input type="text" name="nome" required>
    </br>
    <input type="submit" value="Criar">

  </form>
</body>
</html>