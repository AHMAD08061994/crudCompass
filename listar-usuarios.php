<h1>Listar usuários</h1>

<?php 

    // $sql = "SELECT  * FROM tb_vendedor";

    // $res = $conn->query($sql);

    // if ($conn->affected_rows > 0) {
    //     $cd_vendedor = $conn->insert_id; // Obtém o ID do vendedor inserido

    //     $sql = "SELECT nm_email_vendedor FROM tb_email_vendedor WHERE $cd_vendedor = cd_vendedor ";
    // }

    

    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         echo "ID: " . $row["cd_vendedor"]. " - Nome: " . $row["nm_vendedor"]. " - Cargo: " . $row["nm_cargo_vendedor"]." - E-mail: " . $row["nm_email_vendedor"]. "<br>";
    //     }
    // } else {
    //     echo "Nenhum resultado encontrado.";
    // }

    $sql = "SELECT  * FROM tb_vendedor";

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        echo "<table class='table table-hover table-striped table-bordered'>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Nome</th>";
        echo "<th>Cargo</th>";
        echo "<th>E-mail</th>";
        echo "<th>Ações</th>";
        echo "</tr>";
        while ($row = $res->fetch_assoc()) {
            $cd_vendedor = $row["cd_vendedor"]; // Obtém o ID do vendedor
            // seleciona o email de acordo com o id passado
            $sql_email = "SELECT nm_email FROM tb_email_vendedor WHERE cd_vendedor = $cd_vendedor";
            // executa a consulta sql
            $result_email = $conn->query($sql_email);
            // verifica se a consulta teve retorno
            if ($result_email->num_rows > 0) {
                $email_row = $result_email->fetch_assoc();
                $email = $email_row["nm_email"];
            } else {
                $email = "Email não encontrado";
            }
            
            echo "<tr>";
            
            echo "<td>$row[cd_vendedor] </td>";
            echo "<td>$row[nm_vendedor]</td>";
            echo "<td>$row[nm_cargo_vendedor] </td>"; 
            echo "<td>$email </td>";
            echo "<form action='?page=editar' method='POST'>";
            echo "<input type='hidden' name='cd_vendedor' value='" .$row["cd_vendedor"]."'>";
            echo "<td class='d-flex justify-content-center'>";
            echo "<button type='submit' class='btn btn-primary me-2'\">Editar/Excluir</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
    print "</table>";



    // Seu código de conexão ao banco de dados aqui
    
    // $sql = "SELECT * FROM tb_vendedor";
    // $result = $conn->query($sql);
    
    // if ($result->num_rows > 0) {
    //     echo "<table>";
    //     echo "<tr><th>ID</th><th>Nome</th><th>Cargo</th><th>Ação</th></tr>";
        
    //     while ($row = $result->fetch_assoc()) {
    //         echo "<tr>";
    //         echo "<td>" . $row["cd_vendedor"] . "</td>";
    //         echo "<td>" . $row["nm_vendedor"] . "</td>";
    //         echo "<td>" . $row["nm_cargo_vendedor"] . "</td>";
    //         echo "<td>";
    //         echo "<form action='editar-usuario.php' method='POST'>";
    //         echo "<input type='hidden' name='cd_vendedor' value='" . $row["cd_vendedor"] . "'>";
    //         echo "<button type='submit'>Editar</button>";
    //         echo "</form>";
    //         echo "</td>";
    //         echo "</tr>";
    //     }
        
    //     echo "</table>";
    // } else {
    //     echo "Nenhum usuário encontrado.";
    // }
    
    // $conn->close();
    
    
?>