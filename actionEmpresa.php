<?php include "header.php" ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $fotoEmpresa =  $nomeEmpresa = $razaoSocialEmpresaEmpresa = $dataFundacaoEmpresa = $cnpjEmpresa = "";
        $estadoEmpresa = $estadoEmpresa = $cidadeEmpresa = $emailEmpresa = $senhaEmpresa = $confirmarSenhaEmpresa = "";

        $erroPreenchimento = false;

        if (empty($_POST["nomeEmpresa"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>NOME DA EMPRESA</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $nomeEmpresa = filtrar_entrada($_POST["nomeEmpresa"]);
        }

        if (empty($_POST["razaoSocialEmpresa"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>RAZÃO SOCIAL</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $razaoSocialEmpresa = filtrar_entrada($_POST["razaoSocialEmpresa"]);
        }

        if (empty($_POST["dataFundacaoEmpresa"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>DATA DE FUNDAÇÃO</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $dataFundacaoEmpresa = filtrar_entrada($_POST["dataFundacaoEmpresa"]);

            if (strlen($dataFundacaoEmpresa) == 10) {
                $diaFundacaoEmpresa = substr($dataFundacaoEmpresa, 8, 2);
                $mesFundacaoEmpresa = substr($dataFundacaoEmpresa, 5, 2);
                $anoFundacaoEmpresa = substr($dataFundacaoEmpresa, 0, 4);
            } else {
                echo "<div class='alert alert-warning text-center'><strong>DATA DE FUNDAÇÃO</strong> inválida!</div>";
                $erroPreenchimento = true;
            }
        }

        if (empty($_POST["cnpjEmpresa"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>CNPJ</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $cnpjEmpresa = filtrar_entrada($_POST["cnpjEmpresa"]);
            
            $cnpjLimpo = preg_replace('/[^0-9]/', '', $cnpjEmpresa);

            if (strlen($cnpjLimpo) != 14) {
                echo "<div class='alert alert-warning text-center'>O <strong>CNPJ</strong> deve conter exatamente 14 dígitos numéricos!</div>";
                $erroPreenchimento = true;
            }
        }

        if (empty($_POST["estadoEmpresa"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>ESTADO</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $estadoEmpresa = filtrar_entrada($_POST["estadoEmpresa"]);
        }

        if (empty($_POST["cidadeEmpresa"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>CIDADE</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $cidadeEmpresa = filtrar_entrada($_POST["cidadeEmpresa"]);
        }

        if (empty($_POST["emailEmpresa"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>EMAIL DA EMPRESA</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $emailEmpresa = filtrar_entrada($_POST["emailEmpresa"]);

            if (!filter_var($emailEmpresa, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='alert alert-warning text-center'>O formato do <strong>EMAIL</strong> é inválido!</div>";
                $erroPreenchimento = true;
            }
        }

        
        if (empty($_POST["senhaEmpresa"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>SENHA</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $senhaEmpresa = $_POST["senhaEmpresa"];
        }

        if (empty($_POST["confirmarSenhaEmpresa"])) {
            echo "<div class='alert alert-warning text-center'>O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $confirmarSenhaEmpresa = $_POST["confirmarSenhaEmpresa"];

            if ($senhaEmpresa !== $confirmarSenhaEmpresa) {
                echo "<div class='alert alert-warning text-center'>As <strong>SENHAS</strong> informadas não correspondem!</div>";
                $erroPreenchimento = true;
            } else {
                $senhaEmpresa = md5(filtrar_entrada($senhaEmpresa));
            }
        }

        $diretorio    = "assets/img/";
        $fotoEmpresa  = $diretorio . basename($_FILES['fotoEmpresa']['name']);
        $tipoDaImagem = strtolower(pathinfo($fotoEmpresa, PATHINFO_EXTENSION));
        $erroUpload   = false;

        if (isset($_FILES['fotoEmpresa']) && $_FILES['fotoEmpresa']['size'] > 0) {

            if ($_FILES['fotoEmpresa']['size'] > 5000000) {
                echo "<div class='alert alert-warning text-center'>A <strong>LOGO DA EMPRESA</strong> deve ser menor do que 5MB!</div>";
                $erroUpload = true;
            }

            if ($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp") {
                echo "<div class='alert alert-warning text-center'>A <strong>LOGO DA EMPRESA</strong> deve estar nos formatos JPG, JPEG, PNG ou WEBP!</div>";
                $erroUpload = true;
            }

            if (!$erroUpload) {
                if (!move_uploaded_file($_FILES["fotoEmpresa"]["tmp_name"], $fotoEmpresa)) {
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

            $inserirEmpresa = "INSERT INTO Empresa (fotoEmpresa, nomeEmpresa, razaoSocialEmpresaEmpresa, dataFundacaoEmpresa, cnpjEmpresa, estadoEmpresa, cidadeEmpresa, emailEmpresa, senhaEmpresa);

                               VALUES ('$fotoEmpresa', '$nomeEmpresa', '$razaoSocialEmpresaEmpresa', '$dataFundacaoEmpresa', '$cnpjEmpresa', '$estadoEmpresa', '$cidadeEmpresa', '$emailEmpresa', '$senhaEmpresa')";

            if (mysqli_query($conn, $inserirEmpresa)) {

                echo "<div class='alert alert-success text-center'>O cadastro da <strong>EMPRESA</strong> foi efetuado com sucesso!</div>";
                echo "
                    <div class='container mb-3 mt-3'>
                        <div class='container mb-3 mt-3 text-center'>
                            <img src='$fotoEmpresa' title='Logo de $nomeEmpresa' style='width:150px' class='img-thumbnail'>
                        </div>
                        <table class='table'>
                            <tr>
                                <th>NOME DA EMPRESA</th>
                                <td>$nomeEmpresa</td>
                            </tr>
                            <tr>
                                <th>RAZÃO SOCIAL</th>
                                <td>$razaoSocialEmpresa</td>
                            </tr>
                            <tr>
                                <th>CNPJ</th>
                                <td>$cnpjEmpresa</td>
                            </tr>
                            <tr>
                                <th>DATA DE FUNDAÇÃO</th>
                                <td>$diaFundacaoEmpresa/$mesFundacaoEmpresa/$anoFundacaoEmpresa</td>
                            </tr>
                            <tr>
                                <th>EMAIL</th>
                                <td>$emailEmpresa</td>
                            </tr>
                            <tr>
                                <th>ESTADO</th>
                                <td>$estadoEmpresa</td>
                            </tr>
                            <tr>
                                <th>CIDADE</th>
                                <td>$cidadeEmpresa</td>
                            </tr>
                        </table>
                    </div>
                ";
            } else {
                echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar <strong>EMPRESA</strong> no banco de dados!</div>";
            }
        }

    } else {
        header("location:formLoginEmpresa.php");
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