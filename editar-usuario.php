<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Editar Usuário</title>
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-10 ">
                <h1 class="justify-content-center">Editar Usuário</h1>


                <?php

               

$codigo = $_POST["cd_vendedor"];

$sql = "SELECT vend.cd_vendedor, vend.nm_vendedor, vend.nm_cargo_vendedor, emv.nm_email FROM tb_vendedor AS vend JOIN tb_email_vendedor AS emv ON vend.cd_vendedor = emv.cd_vendedor WHERE vend.cd_vendedor = $codigo";

echo $sql;

$res = $conn->query($sql);

if ($res->num_rows > 0){

    $row = $res->fetch_object();
    

    echo "<form action= '?page=salvar' method='POST'>
       
        <div class='mb-3'>
            <label>ID:</label>
            <input type='text' name='codigo' readonly  value=' $row->cd_vendedor' class='form-control'>
        </div>
        <div class='mb-3'>
            <label>Nome:</label>
            <input type='text' name='nome' value=' $row->nm_vendedor' class='form-control'>
        </div>
        <div class='mb-3'>
            <label>Cargo:</label>
            <input type='text' name='cargo' value=' $row->nm_cargo_vendedor' class='form-control'>
        </div>
        <div class='mb-3'>
            <label>E-mail:</label>
            <input type='email' name='email' value=' $row->nm_email' class='form-control'>
        </div>
        <div class='mb-3'>
            <button type='submit' class='btn btn-success'> <input type='hidden' name='acao' value='alterar'>Salvar</button>
        </div>
        <div class='mb-3'>
            <button type='submit' class='btn btn-danger'> <input type='hidden' name='acao' value='excluir'>Excluir</button>
        </div>
    </form>";
}else {
    echo "Nenhum resultado encontrado.";
}
            ?>
            </div>
        </div>
    </div>
</body>

</html>