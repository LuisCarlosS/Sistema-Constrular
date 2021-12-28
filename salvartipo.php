<?php require_once "components/topo.php"; ?>
<?php

    require_once "funcoes/conexoes.php";

    $categoria = $_POST["categoria"];

    $sql = "INSERT INTO tipo VALUES(NULL, '".$categoria."' )";

    if(mysqli_query($conn, $sql)){
        echo "<div class= mensagem>Categoria cadastrada com sucesso!</div>";
    }else{
        echo "<div class= mensagem>Categoria não cadastrada</div>";
    }

    mysqli_close($conn);
?>
<?php require_once "components/rodape.php"; ?>