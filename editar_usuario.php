<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Usuário</title>
  <link rel="stylesheet" href="navbar.css">
  <link rel="icon" href="Group 31.png">

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding-top: 80px; /* espaço pro header fixo */
    }

    /* ===== POP-UP CENTRAL ===== */
    .popup-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: calc(100vh - 80px);
    }

    .popup {
      background: #fff;
      width: 420px;
      padding: 30px 35px;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      text-align: left;
      animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }

    .popup h2 {
      color: #066B13;
      margin-bottom: 20px;
      text-align: center;
    }

    .popup label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    .popup input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-bottom: 15px;
    }

    .btns {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .btns button,
    .btns a {
      flex: 1;
      padding: 10px;
      text-align: center;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      text-decoration: none;
      color: white;
    }

    .btn-salvar {
      background-color: #066B13;
    }

    .btn-salvar:hover {
      background-color: #055010;
    }

    .btn-cancelar {
      background-color: #f4a000;
    }

    .btn-cancelar:hover {
      background-color: #d89000;
    }

    /* ===== HEADER PADRÃO ===== */
    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: white;
      padding: 0 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      height: 60px;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
    }

    .logo-section {
      display: flex;
      align-items: center;
    }

    .logo {
      height: 45px;
      margin-right: 10px;
    }

    .logo-text {
      font-size: 22px;
      color: #066B13;
      font-weight: 700;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
    }

    nav ul li a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
      transition: 0.3s;
    }

    nav ul li a:hover {
      color: #066B13;
    }
  </style>
</head>

<body>

  <header class="header">
    <div class="logo-section">
      <img src="Group 31.png" alt="PetSaúde Logo" class="logo">
      <span class="logo-text">PetSaúde</span>
    </div>

    <nav>
      <ul>
        <li><a href="index.html#home">Home</a></li>
        <li><a href="index.html#parcerias">Parcerias</a></li>
        <li><a href="index.html#servicos">Serviços</a></li>
        <li><a href="index.html#sobre">Sobre</a></li>
      </ul>
    </nav>

    <div class="auth-section">
      <a href="cadastro.html" class="cadastre-se">Cadastre-se</a>
      <a href="login.html" class="login-btn">Login</a>
    </div>
  </header>

  <?php
include("conexao.php");

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $sql = "SELECT * FROM tutor WHERE ID_TUTOR = $codigo";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $TUTOR = $usuario; 

    } else {
        echo "<script>
                alert('Usuário não encontrado.');
                window.location.href = 'consulta_usuario.php';
              </script>";
        exit;
    }
} else {
    echo "<script>
            alert('Código do usuário não informado.');
            window.location.href = 'consulta_usuario.php';
          </script>";
    exit;
}
?>


  <div class="popup-container">
    <div class="popup">
      <h2>Editar Usuário</h2>

      <form method="post" action="atualizar_usuario.php">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $TUTOR['NOME']; ?>" required>

        <label>CPF:</label>
        <input type="text" name="CPF" value="<?php echo $TUTOR['CPF']; ?>" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $TUTOR['TELEFONE']; ?>" required>

        <label>CEP:</label>
        <input type="text" name="CEP" value="<?php echo $TUTOR['CEP']; ?>" required>

         <label>Email:</label>
        <input type="text" name="email" value="<?php echo $TUTOR['email']; ?>" required>


        <div class="btns">
          <button type="submit" class="btn-salvar">Salvar Alterações</button>
          <a href="consulta_usuarioss.php" class="btn-cancelar">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
