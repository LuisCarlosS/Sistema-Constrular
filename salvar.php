<?php require_once "components/topo.php"; ?>
<?php

    require_once "funcoes/conexoes.php";

    $nome = trim($_POST["nome"]);
    $precocompra = trim($_POST["precocompra"]);
    $precovenda = trim($_POST["precovenda"]);
    $estoque = trim($_POST["estoque"]);
    $categoria = trim($_POST["categoria"]);

    if($nome == "" || $precocompra == "" || $precovenda == "" || $estoque == "" || $categoria == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    if($precovenda < $precocompra){
        echo "O valor de venda deve ser MAIOR que o valor de compra!";
        exit;
    }

    $sql = "INSERT INTO produtos VALUES(NULL, '".$nome."', '".$precocompra."', '".$precovenda."', '".$estoque."', '".$categoria."')";

    if(mysqli_query($conn, $sql)){
        echo "<p>Produto cadastrado com sucesso!</p>";
    }else{
        echo (Mysqli_error($conn)); //"<p>Não pode cadastrar o produto</p>";
    }

    mysqli_close($conn);
?>
<?php require_once "components/rodape.php"; ?>