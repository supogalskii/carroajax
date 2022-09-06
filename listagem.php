<h3>LISTAGEM DE CARROS</h3>
    
    <?php
    session_start();
    include "conexao.php"
    ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script language="JavaScript">

    function fDeletar (ModeloPlaca) {
        let acao = "deletar.php?deletar=deletar&ModeloPlaca="+ModeloPlaca;
        console.log(acao);
        $.get(acao,function(retorno){
            alert(retorno);
            location.reload();
        });
    }
    function fAtualizar (ModeloPlaca) {
        let atualizar = "atualizar.php?ModeloPlaca="+ModeloPlaca;
        $.get(atualizar,function(retorno){
            //console.log(retorno);
            $('#form').html(retorno);
        });
    }
    
    </script>
    <div id="form"></div>
    <?php
    $sql= "SELECT *
    FROM carro";
    $carro_prepara = $conn->prepare($sql);
    $carro_prepara ->execute();
    ?>
<link rel="stylesheet" href="estilo.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<table class="table table-dark table-hover">
    <tr>
        <th>Modelo / Placa</th>
        <th>Motorista</th>
        <th>Local De Origem</th>
        <th>Local de Destino</th>
        <th>Kilometragem</th>
        <th>Litros Gastos</th>
        <th>Valor Atual</th>
        <th>Ações</th>
    </tr>
    <tbody>
    <?php
        while ($aula= $carro_prepara->fetch()) {
            echo"<tr>";
            echo"<td>".$aula['ModeloPlaca']."</td>";
            echo"<td>".$aula['Motorista']."</td>";
            echo"<td>".$aula['localdeorigem']."</td>";
            echo"<td>".$aula['localdedestino']."</td>";
            echo"<td>".$aula['Km']."</td>";
            echo"<td>".$aula['Litrosgastos']."</td>";
            echo"<td>".$aula['ValorAtual']."</td>";
            echo "
                <td>
                    <a class=\"btn btn-info\" onclick=\"fAtualizar('".$aula['ModeloPlaca']."')\">Atualizar</a>
                    <a class=\"btn btn-danger\" onclick=\"fDeletar('".$aula['ModeloPlaca']."')\">Deletar</a>
                </td>
            ";
            echo"</tr>";


        }
    ?>
</table>
<a href="home.php"> Voltar à Página Inicial</a>



