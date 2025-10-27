<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_tutor'];
    $nome = $_POST['nome'];
    $cpf = $_POST['CPF'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['CEP'];

    $sql = "UPDATE usuario 
            SET nome='$nome', CPF='$cpf', telefone='$telefone', CEP='$cep'
            WHERE id_tutor=$id";

    if ($conexao->query($sql) === TRUE) {
        echo "<script>
                alert('Dados atualizados com sucesso!');
                window.location.href='consultar_usuarioss.php';
              </script>";
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
}
?>
