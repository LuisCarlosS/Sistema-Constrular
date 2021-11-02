<?php require_once "components/topo.php"; ?>
<?php

require_once "funcoes/conexoes.php";

$id = $_GET["id"];

$sql = "DELETE FROM produtos WHERE idproduto = " . $id;
if(mysqli_query($conn, $sql)){
    echo "<p>Cadastro excluido com sucesso!</p>";
}else{
    echo (Mysqli_error($conn)); //"<p>Erro ao excluir o cadastro!</p>";
}

mysqli_close($conn);
?>
<?php require_once "components/rodape.php"; ?>