<?php 
include("conexao.php");

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    $sql = "DELETE FROM veterinario WHERE id_veterinario = $codigo";

    if ($conexao->query($sql) === TRUE) {
        echo "<script>
            alert('Veterinário excluído com sucesso!');
            window.location.href = 'consulta_funcionarios.php';
        </script>";
    } else {
        echo "<script>
            alert('Erro ao excluir veterinário: " . addslashes($conexao->error) . "');
            window.location.href = 'consulta_funcionarios.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Código do veterinário não informado.');
        window.location.href = 'consulta_funcionarios.php';
    </script>";
}
?>
