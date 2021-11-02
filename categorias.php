<?php require_once "components/topo.php"; ?>
<h3>Adicionar categoria</h3>

    <form action="salvartipo.php" method="post">
        <div>
            <label for="tipo">Nova categoria:</label><br>
            <input type="text" name="categoria" id="categoria"><br><br>
        </div>
        <div class="clear"></div>
        <input type="submit" value="Adicionar categoria" id="btn">
    </form>
    
<h1>Categorias Cadastradas</h1>

<?php
    require_once "funcoes/conexoes.php";
    $sql = "select * from tipo ORDER BY tipo";
    $result = mysqli_query($conn, $sql);
    $totalRegistros = mysqli_num_rows($result);

    if($totalRegistros > 0){
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>CATEGORIAS</th>
        </tr>
    </thead>
    <tbody>
        <?php while($registro = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?=$registro["idtipo"]?></td>
            <td><?=$registro["tipo"]?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php
    }else{
        echo (Mysqli_error($conn)); // "<p>Nenhuma movimentação encontrada no banco de dados</p>";
    }
?>
<?php require_once "components/rodape.php"; ?>