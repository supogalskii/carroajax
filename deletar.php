<?php
include "conexao.php";

if(isset($_GET['deletar'])) {
        $sql_delete_carro= "DELETE FROM carro WHERE ModeloPlaca = :ModeloPlaca";
        $carro_delete_prepara = $conn->prepare($sql_delete_carro);
        $carro_delete_prepara->execute(array("ModeloPlaca"=>$_GET['ModeloPlaca']));
        echo "Excluido com sucesso! ";
}
 ?>