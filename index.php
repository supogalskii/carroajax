
<?php
session_start();

include 'conexao.php';

?>
<?php
if(isset($_POST['gravar'])){
    $erro=false;

    (isset($_POST['ModeloPlaca']) && empty($_POST['ModeloPlaca']))?$erro=true: ''; 
    (isset($_POST['Motorista']) && empty($_POST['Motorista']))?$erro=true: ''; 
    (isset($_POST['localdeorigem']) && empty($_POST['localdeorigem']))?$erro=true: ''; 
    (isset($_POST['localdedestino']) && empty($_POST['localdedestino']))?$erro=true: ''; 
    (isset($_POST['Km']) && empty($_POST['Km']))?$erro=true: ''; 
    (isset($_POST['Litrosgastos']) && empty($_POST['Litrosgastos']))?$erro=true: ''; 
    (isset($_POST['ValorAtual']) && empty($_POST['ValorAtual']))?$erro=true: ''; 


     if(!$erro){
       
        try{
            $stmt= $conn->prepare('INSERT into carro(ModeloPlaca,Motorista,localdeorigem,localdedestino,Km,Litrosgastos,ValorAtual) 
                                        values (:ModeloPlaca,:Motorista,:localdeorigem,:localdedestino,:Km,:Litrosgastos, :ValorAtual)');
            $stmt->execute(array('ModeloPlaca'=> $_POST['ModeloPlaca']
                                , 'Motorista'=> $_POST ['Motorista']
                                , 'localdeorigem'=> $_POST['localdeorigem']
                                , 'localdedestino'=> $_POST['localdedestino']
                                , 'Km'=> $_POST['Km']
                                ,'Litrosgastos'=> $_POST['Litrosgastos']
                                ,'ValorAtual'=> $_POST['ValorAtual']));
                echo '<div class="alert alert-success"> Cadastro realizado com SUCESSO!</div>';
        }catch(error){
            echo '<div class="alert alert-danger"> ERRO!!!</div>';
        }
     }else{
        echo '<div class="alert alert-warning"> Informe todos os campos obrigatórios *</div>';
     }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Dados de viagem- CARRO</title>
</head>
<body>
    
    
    <form method="post" action="" class="container">
    <var><h1>Dados do Carro</h1></var>
  <div class="mb-3">
  <label for="ModeloPlaca" class="form-label">Modelo/Placa</label>
  <input type="text" class="form-control" id="ModeloPlaca" name= "ModeloPlaca" placeholder="Digite o Modelo e placa" required >
</div>


<div class="mb-3">
  <label for="Motorista" class="form-label">Nome do Motorista</label>
  <input type="text" class="form-control" id="Motorista" name= "Motorista" placeholder="Digite o Nome do Motorista" required >
</div>

<div class="mb-3">
  <label for="localdeorigem" class="form-label">Local de origem</label>
  <input type="text" class="form-control" id="localdeorigem" name= "localdeorigem" placeholder="Digite o seu Local" required >
</div>

<div class="mb-3">
  <label for="localdedestino" class="form-label">Local de Destino</label>
  <input type="text" class="form-control" id="localdedestino" name= "localdedestino" placeholder="Digite o seu Destino" required >
</div>

<div class="mb-3">
  <label for="Km" class="form-label">Kilometragem Percorrida</label>
  <input type="text" class="form-control" id="Km" name= "Km" placeholder="Digite a kilometragem Percorrida" required >
</div>
<div class="mb-3">
  <label for="Litrosgastos" class="form-label">Litros de Combustível Gastos</label>
  <input type="text" class="form-control" id="Litrosgastos" name= "Litrosgastos" placeholder="Digite quantos litros foram gastos" required >
</div>
<div class="mb-3">
  <label for="ValorAtual" class="form-label">Valor Atual da Gasolina</label>
  <input type="text" class="form-control" id="ValorAtual" name= "ValorAtual" placeholder="Digite o valor da Gasolina" required >
</div>

<div class="mb-3">
    <input type="submit" name="gravar" value=" Salvar"  class="btn btn-primary"/>
</div>
<br><br>
<div class="mb-3">
  <a href="home.php"> Voltar à Página Inicial </a>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>
