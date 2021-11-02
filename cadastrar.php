<?php
require_once "components/topo.php";
require_once "funcoes/conexoes.php";

$sql = "select * from tipo order by tipo";
$resultSetTipo = mysqli_query($conn, $sql);
?>
       <h3>Cadastrar Produtos</h3>
        <form action="salvar.php" method="post">
                    <div>
                        <label for="">Nome do produto:</label><br>
                        <input type="text" name="nome" id="nome"><br><br>
                    </div>
                    <div>
                        <label for="">Preço de compra:</label><br>
                        <input type="text" name="precocompra" id="precocompra"><br><br>
                    </div>
                    <div>
                        <label for="">Preço de venda:</label><br>
                        <input type="text" name="precovenda" id="precovenda"><br><br>
                    </div>
                    <div>
                        <label for="">Quantidade em estoque:</label><br>
                        <input type="text" name="estoque" id="estoque"><br><br>
                    </div>
                    <div>
                        <label for="categoria">Categoria:</label><br>
                        <select name="categoria" id="categoria">
                            <option value=""></option>
                            <?php
                                if(mysqli_num_rows($resultSetTipo) > 0){
                                    while($registroTipo = mysqli_fetch_assoc($resultSetTipo)){
                                        echo "<option value='" . $registroTipo["idtipo"]. "'>" 
                                        . $registroTipo["tipo"]. "</option>";
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <input type="submit" value="Cadastrar" id="btn">
                </form>
                <div id="resposta"></div>
    <?php require_once "components/rodape.php"; ?>