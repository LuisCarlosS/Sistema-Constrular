<?php

require_once "components/topo.php";
require_once "funcoes/conexoes.php";

$idproduto = $_GET["id"];
$sql = "SELECT * FROM produtos WHERE idproduto = " .$idproduto;
$resultSet = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultSet) == 0){
    echo "Nenhuma movimentação encontrada";
    exit;
}


$registro = mysqli_fetch_assoc($resultSet);
?>

       <h3>Editar Cadastro de Produtos</h3>
        <form action="confirmar_edicao.php" method="post">
                    <input type="hidden" name="idproduto" value="<?=$registro["idproduto"]?>">
                    <div>
                        <label for="">Nome do produto:</label><br>
                        <input type="text" name="nome" id="nome" value="<?=$registro["nome"] ?>"><br><br>
                    </div>
                    <div>
                        <label for="">Preço de compra:</label><br>
                        <input type="text" name="precocompra" id="precocompra" value="<?=$registro["precocompra"] ?>"><br><br>
                    </div>
                    <div>
                        <label for="">Preço de venda:</label><br>
                        <input type="text" name="precovenda" id="precovenda" value="<?=$registro["precovenda"] ?>"><br><br>
                    </div>
                    <div>
                        <label for="">Quantidade em estoque:</label><br>
                        <input type="text" name="estoque" id="estoque" value="<?=$registro["estoque"] ?>"><br><br>
                    </div>
                    
                    <input type="submit" value="Editar Cadastro" id="btn">
                </form>
                <div id="resposta"></div>
    <?php require_once "components/rodape.php"; ?>