<?php require_once "components/topo.php"; ?>
<?php

    require_once "funcoes/conexoes.php";

    $categoria = $_POST["categoria"];

    $sql = "INSERT INTO tipo VALUES(NULL, '".$categoria."' )";

    if(mysqli_query($conn, $sql)){
        echo "Categoria cadastrada com sucesso!";
    }else{
        echo "Categoria não cadastrada";
    }

    mysqli_close($conn);
?>
<?php require_once "components/rodape.php"; ?>