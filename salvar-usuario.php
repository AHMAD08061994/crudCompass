<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_compassv2";
// cria a conexao
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
    switch($_REQUEST["acao"]){
        case"cadastrar":
            $nome = $_POST["nome"];
            $cargo = $_POST["cargo"];
            $email = $_POST["email"];


            // Checar a conexao
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO tb_vendedor (nm_vendedor, nm_cargo_vendedor)
            VALUES ('$nome', '$cargo');";
          
            $conn->multi_query($sql);

            // verifica se foi alterada alguma linha
            if ($conn->affected_rows > 0) {
              $cd_vendedor = $conn->insert_id; // Obtém o ID do vendedor inserido
          
              $sql_email = "INSERT INTO tb_email_vendedor (nm_email, cd_vendedor) VALUES ('$email', '$cd_vendedor')";
              
              // verifica se foi passado os dados atraves da conexao
              if ($conn->query($sql_email) === TRUE) {
                  echo "<script>alert('Cadastrado com sucesso')</script>";
                  echo "<script>location.href='?page=listar'</script>";
              } else {
                  echo "Error: " . $sql_email . "<br>" . $conn->error;
                  echo "<script>location.href='?page=listar'</script>";
              }
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              echo "<script>location.href='?page=listar'</script>";
          }

          // fecha a conexao
          $conn->close();

            break;

        case "alterar":

             
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  } 
                  
                  $cd_vendedor = $_POST["codigo"];
                  $nome = $_POST["nome"];
                  $cargo = $_POST["cargo"];
                  $email = $_POST["email"];

                  // Atualizar tabela tb_vendedor
                  $sql_update_vendedor = "UPDATE tb_vendedor SET nm_vendedor = '$nome', nm_cargo_vendedor = '$cargo' WHERE cd_vendedor = $_POST[codigo]";
                  // verifica se a sql foi executada
                  if ($conn->query($sql_update_vendedor) === TRUE) {
                      // Atualizar tabela tb_email_vendedor
                      $sql_update_email = "UPDATE tb_email_vendedor SET nm_email = '$email' WHERE tb_email_vendedor.cd_vendedor  = $_POST[codigo]";
                      // verifica se a consulta sql foi executada
                      if ($conn->query($sql_update_email) === TRUE) {
                          echo "<script>alert('Usuário atualizado com sucesso')</script>";
                          echo "<script>location.href='?page=listar'</script>";
                      } else {
                          echo "Erro ao atualizar email: " . $sql_update_email . "<br>" . $conn->error;
                      }
                  } else {
                      echo "Erro ao atualizar usuário: " . $sql_update_vendedor . "<br>" . $conn->error;
                  }

                  $conn->close();
            break;
        
        case "excluir":
           if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              } 

              $codigo = $_POST["codigo"];

              echo $codigo;
              $sql_email = "DELETE FROM tb_email_vendedor WHERE cd_vendedor = '$codigo'";


              $conn->query($sql_email);

              if ($conn->query($sql_email) == TRUE) {

                $sql_vendedor = "DELETE FROM tb_vendedor WHERE cd_vendedor = '$codigo'";

                $conn->query($sql_vendedor);

                if ($conn->query($sql_vendedor) == TRUE) {
                    echo "<script>alert('Usuário excluído com sucesso')</script>";
                    echo "<script>location.href='?page=listar'</script>";
                } else {
                    echo "Erro ao atualizar email: " . $sql_email . "<br>" . $conn->error;
                } 
            }
            $conn->close();
            
            
        

            break;
        }
?>