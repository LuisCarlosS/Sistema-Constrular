<?php require_once "components/topo.php"; ?>
<h1>Lista de Produtos Cadastrados</h1>

<?php
    require_once "funcoes/conexoes.php";
    $sql = "SELECT p.idproduto, p.nome, p.precocompra, p.precovenda, p.estoque, t.tipo FROM produtos p INNER JOIN tipo t ON p.tipo_idtipo = t.idtipo order by p.nome";
    $resultSet = mysqli_query($conn, $sql);

    $totalRegistros = mysqli_num_rows($resultSet);
    if($totalRegistros > 0){
?>

<h2>Total de registros encontrado foi de <?=$totalRegistros ?></h2>
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
    }else{
        echo "<p>Nenhuma movimentação encontrada no banco de dados</p>";
    }
?>
<?php require_once "components/rodape.php"; ?>