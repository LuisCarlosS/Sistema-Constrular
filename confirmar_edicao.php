<?php require_once "components/topo.php"; ?>
<?php

    $idproduto = $_POST["idproduto"];
    $nome = $_POST["nome"];
    $precocompra = $_POST["precocompra"];
    $precovenda = $_POST["precovenda"];
    $estoque = $_POST["estoque"];

    if($nome == "" || $precocompra == "" || $precovenda == "" || $estoque == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    if($precovenda < $precocompra){
        echo "O valor de venda deve ser MAIOR que o valor de compra!";
        exit;
    }

    require_once "funcoes/conexoes.php";

    $sql = "UPDATE produtos SET nome = '".$nome."', precocompra = '".$precocompra."', precovenda = '".$precovenda."', estoque = '".$estoque."' WHERE idproduto = '".$idproduto."'";

    if(mysqli_query($conn, $sql)){
        echo "Cadastro editado com sucesso!";
    }else{
        echo  (Mysqli_error($conn)); //"Cadastro não pode ser editado!";
    }

    mysqli_close($conn);

?>
<?php require_once "components/rodape.php"; ?>