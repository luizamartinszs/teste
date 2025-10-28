<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id_animal']);
    $nome_animal = $_POST['nome_animal'];
    $id_tutor = $_POST['id_tutor'];
    $raca = $_POST['raça'];
    $cor = $_POST['cor'];
    $especie = $_POST['especie'];

    $sql = "UPDATE animal 
            SET nome_animal='$nome_animal', id_tutor='$id_tutor', raça='$raca', cor='$cor', especie='$especie'
            WHERE id_animal=$id";

    if ($conexao->query($sql) === TRUE) {
        echo "<script>
                alert('Dados do animal atualizados com sucesso!');
                window.location.href = 'consulta_pacientes.php';
              </script>";
    } else {
        echo 'Erro: ' . $conexao->error;
    }
}
?>
