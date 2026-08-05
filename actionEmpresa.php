<?php include "header.php" ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $fotoUsuario = $dataNascimentoUsuario = $nomeUsuario = $razaoSocial = $cpfUsuario = "";
        $emailUsuario = $estadoUsuario = $cidadeUsuario = $senhaUsuario = $confirmarSenhaUsuario = "";

        $erroPreenchimento = false;

        if (empty($_POST["nomeUsuario"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>NOME DA EMPRESA</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $nomeUsuario = filtrar_entrada($_POST["nomeUsuario"]);
        }

        if (empty($_POST["razaoSocial"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>RAZÃO SOCIAL</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $razaoSocial = filtrar_entrada($_POST["razaoSocial"]);
        }

        if (empty($_POST["dataNascimentoUsuario"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>DATA DE FUNDAÇÃO</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $dataNascimentoUsuario = filtrar_entrada($_POST["dataNascimentoUsuario"]);

            if (strlen($dataNascimentoUsuario) == 10) {
                $diaNascimentoUsuario = substr($dataNascimentoUsuario, 8, 2);
                $mesNascimentoUsuario = substr($dataNascimentoUsuario, 5, 2);
                $anoNascimentoUsuario = substr($dataNascimentoUsuario, 0, 4);
            } else {
                echo "<div class='alert alert-warning text-center'><strong>DATA DE FUNDAÇÃO</strong> inválida!</div>";
                $erroPreenchimento = true;
            }
        }

        if (empty($_POST["cpfUsuario"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>CNPJ</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $cpfUsuario = filtrar_entrada($_POST["cpfUsuario"]);
            
            $cnpjLimpo = preg_replace('/[^0-9]/', '', $cpfUsuario);

            if (strlen($cnpjLimpo) != 14) {
                echo "<div class='alert alert-warning text-center'>O <strong>CNPJ</strong> deve conter exatamente 14 dígitos numéricos!</div>";
                $erroPreenchimento = true;
            }
        }

        if (empty($_POST["emailUsuario"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>EMAIL DA EMPRESA</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $emailUsuario = filtrar_entrada($_POST["emailUsuario"]);

            if (!filter_var($emailUsuario, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='alert alert-warning text-center'>O formato do <strong>EMAIL</strong> é inválido!</div>";
                $erroPreenchimento = true;
            }
        }

        if (empty($_POST["estadoUsuario"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>ESTADO</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $estadoUsuario = filtrar_entrada($_POST["estadoUsuario"]);
        }

        if (empty($_POST["cidadeUsuario"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>CIDADE</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $cidadeUsuario = filtrar_entrada($_POST["cidadeUsuario"]);
        }

        $senhaOriginal = "";
        if (empty($_POST["senhaUsuario"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>SENHA</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $senhaOriginal = $_POST["senhaUsuario"];
        }

        if (empty($_POST["confirmarSenhaUsuario"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $confirmarSenhaOriginal = $_POST["confirmarSenhaUsuario"];

            if ($senhaOriginal !== $confirmarSenhaOriginal) {
                echo "<div class='alert alert-warning text-center'>As <strong>SENHAS</strong> informadas não correspondem!</div>";
                $erroPreenchimento = true;
            } else {
                $senhaUsuario = md5(filtrar_entrada($senhaOriginal));
            }
        }

        $diretorio    = "assets/img/";
        $fotoUsuario  = $diretorio . basename($_FILES['fotoUsuario']['name']);
        $tipoDaImagem = strtolower(pathinfo($fotoUsuario, PATHINFO_EXTENSION));
        $erroUpload   = false;

        if (isset($_FILES['fotoUsuario']) && $_FILES['fotoUsuario']['size'] > 0) {

            if ($_FILES['fotoUsuario']['size'] > 5000000) {
                echo "<div class='alert alert-warning text-center'>A <strong>LOGO DA EMPRESA</strong> deve ser menor do que 5MB!</div>";
                $erroUpload = true;
            }

            if ($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp") {
                echo "<div class='alert alert-warning text-center'>A <strong>LOGO DA EMPRESA</strong> deve estar nos formatos JPG, JPEG, PNG ou WEBP!</div>";
                $erroUpload = true;
            }

            if (!$erroUpload) {
                if (!move_uploaded_file($_FILES["fotoUsuario"]["tmp_name"], $fotoUsuario)) {
                    echo "<div class='alert alert-danger text-center'>Erro ao tentar mover a imagem para o diretório <strong>$diretorio</strong>!</div>";
                    $erroUpload = true;
                }
            }
        } else {
            echo "<div class='alert alert-warning text-center'>A <strong>LOGO DA EMPRESA</strong> é obrigatória!</div>";
            $erroUpload = true;
        }

        if (!$erroPreenchimento && !$erroUpload) {

            include "conexaoBD.php";

            $inserirUsuario = "INSERT INTO Usuarios (fotoUsuario, dataNascimentoUsuario, nomeUsuario, cpfUsuario, emailUsuario, estadoUsuario, cidadeUsuario, senhaUsuario, nivelUsuario) 
                               VALUES ('$fotoUsuario', '$dataNascimentoUsuario', '$nomeUsuario', '$cpfUsuario', '$emailUsuario', '$estadoUsuario', '$cidadeUsuario', '$senhaUsuario', 'empresa')";

            if (mysqli_query($conn, $inserirUsuario)) {

                echo "<div class='alert alert-success text-center'>O cadastro da <strong>EMPRESA</strong> foi efetuado com sucesso!</div>";
                echo "
                    <div class='container mb-3 mt-3'>
                        <div class='container mb-3 mt-3 text-center'>
                            <img src='$fotoUsuario' title='Logo de $nomeUsuario' style='width:150px' class='img-thumbnail'>
                        </div>
                        <table class='table'>
                            <tr>
                                <th>NOME DA EMPRESA</th>
                                <td>$nomeUsuario</td>
                            </tr>
                            <tr>
                                <th>RAZÃO SOCIAL</th>
                                <td>$razaoSocial</td>
                            </tr>
                            <tr>
                                <th>CNPJ</th>
                                <td>$cpfUsuario</td>
                            </tr>
                            <tr>
                                <th>DATA DE FUNDAÇÃO</th>
                                <td>$diaNascimentoUsuario/$mesNascimentoUsuario/$anoNascimentoUsuario</td>
                            </tr>
                            <tr>
                                <th>EMAIL</th>
                                <td>$emailUsuario</td>
                            </tr>
                            <tr>
                                <th>ESTADO</th>
                                <td>$estadoUsuario</td>
                            </tr>
                            <tr>
                                <th>CIDADE</th>
                                <td>$cidadeUsuario</td>
                            </tr>
                        </table>
                    </div>
                ";
            } else {
                echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar <strong>EMPRESA</strong> no banco de dados!</div>";
            }
        }

    } else {
        header("location:formEmpresa.php");
        exit();
    }

    function filtrar_entrada($dado) {
        $dado = trim($dado);
        $dado = stripslashes($dado);
        $dado = htmlspecialchars($dado);
        return $dado;
    }
?>

<?php include "footer.php" ?>