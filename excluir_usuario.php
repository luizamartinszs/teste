<?php
include("conexao.php");

if (isset($_GET['codigo'])) {
    $id = intval($_GET['codigo']);

    // Excluir primeiro os animais relacionados ao tutor
    $conexao->query("DELETE FROM animal WHERE ID_TUTOR = $id");

    // Agora excluir o tutor
    $sql = "DELETE FROM tutor WHERE ID_TUTOR = $id";
    
    if ($conexao->query($sql) === TRUE) {
        echo "<script>alert('Usuário excluído com sucesso!'); 
        window.location='consultar_usuarioss.php';</script>";
    } else {
        echo "Erro ao excluir: " . $conexao->error;
    }

} else {
    echo "Código do usuário não informado!";
}

$conexao->close();
?>
