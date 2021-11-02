<?php
require_once "components/topo.php";
require_once "funcoes/conexoes.php";

?>
<h3>Buscar produto</h3>
<form action="buscar.php" method="post" id="buscar">
    <div class="nome">
        <label for="nome">Produto:</label>
        <input type="text" name="nome" id="nome"><br><br>
    </div>
    <div class="tipo">
        <label for="categoria">Categoria:</label>
        <select type="text" name="categoria" id="categoria">
            <option value="">TODAS</option>
            <?php
            $sql = "select idtipo, tipo from tipo order by tipo";
            $resultSetTipo = mysqli_query($conn, $sql);
            if(mysqli_num_rows($resultSetTipo) > 0){
                while($registroTipo = mysqli_fetch_assoc($resultSetTipo)){
                    echo "<option value='" . $registroTipo["idtipo"]. "'>" 
                    . $registroTipo["tipo"]. "</option>";
                }
            }
            ?>
        </select><br><br>
    </div>
    <div class="clear"></div>
    <input type="submit" value="Buscar" id="btn">
</form>
<?php

    if($_POST){

    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];

    $sql = "SELECT p.idproduto, p.nome, p.precocompra, p.precovenda, p.estoque, t.tipo 
    FROM produtos p INNER JOIN tipo t ON p.tipo_idtipo = t.idtipo WHERE p.nome LIKE '".$nome."%' order by p.nome";
    
    if($categoria != ""){
        $sql .= " AND t.idtipo = " . $categoria;
    }
    
    $resultSet = mysqli_query($conn, $sql);
    if(mysqli_num_rows($resultSet) > 0){
?>

<table>
    <thead>
        <tr>
            <th>PRODUTO</th>
            <th>PREÇO DE COMPRA</th>
            <th>PREÇO DE VENDA</th>
            <th>QUANTIDADE</th>
            <th>CATEGORIA</th>
            <th>AÇÃO</th>
        </tr>
    </thead>
    <tbody>
        <?php while( $registro = mysqli_fetch_assoc($resultSet)){ ?>
        <tr>
            <td><?=$registro["nome"]?></td>
            <td><?=$registro["precocompra"]?></td>
            <td><?=$registro["precovenda"]?></td>
            <td><?=$registro["estoque"]?></td>
            <td><?=$registro["tipo"]?></td>
            <td>
                <a href="editar.php?id=<?=$registro["idproduto"]?>" class="btn btn-edit">
                    <i class="fas fa-edit"></i> 
                </a>

                <a href="deletar.php?id=<?=$registro["idproduto"]?>" onclick="return excluir()" class="btn btn-remove">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php
    }
    else{
        echo (Mysqli_error($conn));
    }
}
?>
<?php require_once "components/rodape.php";?>