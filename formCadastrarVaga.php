<?php
// 1. Inicia a sessão e valida a empresa no topo do arquivo
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true || !isset($_SESSION['idEmpresa'])) {
    echo "<script>alert('Sessão expirada. Faça o login novamente.'); window.location.href = 'formLoginEmpresa.php';</script>";
    exit();
}

include "conexaoBD.php";

$mensagemStatus = "";

// 2. Processa o envio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tituloVaga    = mysqli_real_escape_string($conn, trim($_POST['tituloVaga'] ?? ''));
    $descricaoVaga = mysqli_real_escape_string($conn, trim($_POST['descricaoVaga'] ?? ''));
    $idEmpresa     = $_SESSION['idEmpresa'];

    $diretorio = "assets/img/";
    if (!file_exists($diretorio)) {
        mkdir($diretorio, 0777, true);
    }

    $fotoName = $_FILES['fotoVaga']['name'] ?? '';
    if (isset($_FILES['fotoVaga']) && $_FILES['fotoVaga']['size'] > 0) {
        $fotoVaga = $diretorio . time() . "_" . basename($fotoName);
        move_uploaded_file($_FILES["fotoVaga"]["tmp_name"], $fotoVaga);
    } else {
        $fotoVaga = $diretorio . "img_avatar1.png";
    }

    if (!empty($tituloVaga) && !empty($descricaoVaga)) {
        $sql = "INSERT INTO vagas (fotoVaga, tituloVaga, descricaoVaga, idEmpresa) 
                VALUES ('$fotoVaga', '$tituloVaga', '$descricaoVaga', '$idEmpresa')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Vaga cadastrada com sucesso!'); window.location.href = 'painelEmpresa.php';</script>";
            exit();
        } else {
            $mensagemStatus = "<div class='alert alert-danger text-center rounded-3'>Erro ao salvar: " . mysqli_error($conn) . "</div>";
        }
    } else {
        $mensagemStatus = "<div class='alert alert-warning text-center rounded-3'>Preencha todos os campos obrigatórios.</div>";
    }
}

include "header.php";
?>

<!-- Estilos inspirados no layout "Meu Futuro" -->
<style>
    body {
        background-color: #f4f7fb;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card-custom {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 86, 179, 0.05);
    }
    .header-tag {
        background-color: #0056b3;
        color: #ffffff;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 12px;
    }
    .btn-primary-custom {
        background-color: #0d6efd;
        color: #ffffff;
        border: none;
        border-radius: 10px;
        padding: 10px 24px;
        font-weight: 600;
        transition: all 0.2s ease;
    }
    .btn-primary-custom:hover {
        background-color: #0b5ed7;
        color: #ffffff;
    }
    .btn-outline-custom {
        background-color: transparent;
        color: #0d6efd;
        border: 1.5px solid #0d6efd;
        border-radius: 10px;
        padding: 10px 24px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .btn-outline-custom:hover {
        background-color: #0d6efd;
        color: #ffffff;
    }
    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        padding: 12px 16px;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
    }
</style>

<div class="container my-5 pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            
            <?= $mensagemStatus ?>

            <div class="card card-custom p-4 p-md-5">
                <div class="text-center mb-4">
                    <span class="header-tag">Área da Empresa</span>
                    <h2 class="fw-bold text-dark">Cadastrar Nova Vaga</h2>
                    <p class="text-muted">Anuncie uma oportunidade para conectar-se com novos talentos.</p>
                </div>

                <form action="formCadastrarVaga.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="mb-4">
                        <label for="tituloVaga" class="form-label fw-semibold text-secondary">Título da Vaga *</label>
                        <input type="text" class="form-control" name="tituloVaga" id="tituloVaga" placeholder="Ex: Estágio em Administração / Jovem Aprendiz" required>
                    </div>

                    <div class="mb-4">
                        <label for="fotoVaga" class="form-label fw-semibold text-secondary">Imagem ou Banner da Vaga</label>
                        <input type="file" class="form-control" name="fotoVaga" id="fotoVaga">
                        <small class="text-muted">Formatos permitidos: JPG, PNG. Opcional.</small>
                    </div>

                    <div class="mb-4">
                        <label for="descricaoVaga" class="form-label fw-semibold text-secondary">Descrição da Vaga *</label>
                        <textarea class="form-control" name="descricaoVaga" id="descricaoVaga" rows="5" placeholder="Descreva os requisitos, responsabilidades, horário e benefícios..." required></textarea>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4 pt-2">
                        <a href="painelEmpresa.php" class="btn-outline-custom">Voltar ao Painel</a>
                        <button type="submit" class="btn-primary-custom">Publicar Oportunidade</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>