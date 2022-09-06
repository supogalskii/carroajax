<?php
include "conexao.php";

if(isset($_GET['atualizar'])) {
        $sql_atualizar_carro= "UPDATE carro set nome=nome WHERE ModeloPlaca = :ModeloPlaca";
        $carro_atualizar_prepara = $conn->prepare($sql_atualizar_carro);
        $carro_atualizar_prepara->execute(array("ModeloPlaca"=>$_GET['ModeloPlaca']));
        echo "Dados Atualizados com sucesso";
}

    //consulta de dados
    $sql = "SELECT * FROM carro where ModeloPlaca = :ModeloPlaca";
    $carro_prepara = $conn->prepare($sql);
    $carro_prepara->execute(array("ModeloPlaca" => $_GET['ModeloPlaca']));
    $carro = $carro_prepara->fetch();
 ?>
    <form method ="post">
    <table class="table">
    
    <tr>
        <td>
        Modelo / Placa: 
        </td>
        <td>
            <input type="text" name="ModeloPlaca" class="form-control" id="floatingInput" value="<?php echo $carro['ModeloPlaca']; ?>">
        </td>
    </tr>
    <tr>
        <td>
        Motorista :
        </td>
        <td>
            <input type="text" name="Motorista" class="form-control" id="floatingInput" value="<?php echo $carro['Motorista']; ?>">
        </td>
    </tr>
    <tr>
        <td>
        Local de Origem:
        </td>
        <td>
            <input type="text" name= "localdeorigem" class="form-control" id="floatingInput" value="<?php echo $carro['localdeorigem']; ?>">
        </td>
    </tr>
    <tr>
        <td>
        Local de Destino:
        </td>
        <td>
            <input type="text" name= "localdedestino" class="form-control" id="floatingInput" value="<?php echo $carro['localdedestino']; ?>">
        </td>
    </tr>
    <tr>
        <td>
        Kilometragem Percorrida:
        </td>
        <td>
            <input type="text" name= "Km" class="form-control" id="floatingInput" value="<?php echo $carro['Km']; ?>">
        </td>
    </tr>
    <tr>
        <td>
        Litros de Combustível Gastos:
        </td>
        <td>
            <input type="text" name= "Litrosgastos" class="form-control" id="floatingInput" value="<?php echo $carro['Litrosgastos']; ?>">
        </td>
    </tr>
    <tr>
        <td>
        Valor do Combustível Atual:
        </td>
        <td>
            <input type="text" name= "ValorAtual" class="form-control" id="floatingInput" value="<?php echo $carro['ValorAtual']; ?>">
        </td>
    </tr>
    </table>
    
    <input type="submit" class="btn btn-primary" name="salvar" value="Salvar">&nbsp;
</form>
   