<?php include "header.php" ?>
<br>
<br>
<br>

    <?php
        // Verifica se o método de envio das informações do form é "POST"
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            // Inclui a conexão com o banco
            include "conexaoBD.php";

            // Cria variáveis para armazenar as informações do formulário
            $emailCandidato = $senhaCandidato = "";
            $erroPreenchimento = false;

            // Validação do campo emailCandidato
            if(empty($_POST["emailUsuario"])){
                echo "<div class='alert alert-warning text-center'>O campo <strong>E-MAIL</strong> é obrigatório!</div>";
                $erroPreenchimento = true;
            }
            else{
                $emailCandidato = filtrar_entrada($_POST["emailUsuario"]);
            }

            // Validação do campo senhaCandidato
            if(empty($_POST["senhaUsuario"])){
                echo "<div class='alert alert-warning text-center'>O campo <strong>SENHA</strong> é obrigatório!</div>";
                $erroPreenchimento = true;
            }
            else{
                $senhaCandidato = md5(filtrar_entrada($_POST["senhaUsuario"]));
            }

            // Se não houver campos vazios, faz a consulta no banco
            if(!$erroPreenchimento){

                // Prepara a consulta na tabela Candidato
                $buscarLogin = "SELECT * 
                                FROM Usuarios 
                                WHERE emailUsuario = '$emailCandidato' 
                                AND senhaUsuario = '$senhaCandidato'";

                $efetuarLogin = mysqli_query($conn, $buscarLogin); 

                if($registro = mysqli_fetch_assoc($efetuarLogin)){

                    // Inicia a sessão
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    // Salva as variáveis de sessão no padrão Candidato
                    $_SESSION['idCandidato']    = $registro['idUsuario'];
                    $_SESSION['nomeCandidato']  = $registro['nomeUsuario'];
                    $_SESSION['emailCandidato'] = $registro['emailUsuario'];
                    $_SESSION['logado']         = true;

                    // Redireciona diretamente para listarVagas.php
                    header('location:listarVagas.php');
                    exit();

                }
                else{
                    echo "<div class='alert alert-danger text-center'><strong>E-MAIL</strong> ou <strong>SENHA</strong> incorretos!</div>";
                    echo "<div class='text-center mt-3'><a href='formLogin.php' class='btn btn-primary'>Tentar novamente</a></div>";
                }
            }

        }
        else{
            header("location:formLogin.php");
            exit();
        }

        // Função para filtrar entrada de dados
        function filtrar_entrada($dado){
            $dado = trim($dado);
            $dado = stripslashes($dado);
            $dado = htmlspecialchars($dado);
            return($dado);
        }
    ?>

<?php include "footer.php" ?>