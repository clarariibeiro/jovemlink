<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagas Disponíveis</title>
    <!-- CSS do Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ícones do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            background-color: #ffffff;
            border-right: 1px solid #e2e8f0;
            min-height: 100vh;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #4a5568;
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background-color: #e2eefd;
            color: #0d6efd;
            font-weight: 600;
        }
        .card-profile {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 20px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar Lateral -->
        <div class="col-md-2 sidebar">
            <nav class="nav flex-column px-2">
                <a class="nav-link" href="#"><i class="bi bi-house"></i> Início</a>
                <a class="nav-link" href="#"><i class="bi bi-file-earmark-person"></i> Meu currículo</a>
                <a class="nav-link active" href="#"><i class="bi bi-briefcase"></i> Oportunidades</a>
                <a class="nav-link" href="#"><i class="bi bi-bell"></i> Notificações</a>
                <a class="nav-link" href="#"><i class="bi bi-lightbulb"></i> Dicas</a>
                <a class="nav-link" href="perfil.php"><i class="bi bi-person"></i> Perfil</a>
                <a class="nav-link text-danger mt-4" href="#"><i class="bi bi-box-arrow-right"></i> Sair</a>
            </nav>
        </div>

        <!-- Conteúdo Principal -->
        <div class="col-md-10 p-4">

            <!-- Card do Perfil sem o botão (Apenas foto e informações) -->
            <div class="card-profile d-flex align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <img src="img_avatar1.png" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid #0d6efd;">
                    <div>
                        <h4 class="fw-bold mb-0">Meu Perfil</h4>
                        <small class="text-muted">Candidato • São Paulo - SP</small>
                    </div>
                </div>
            </div>

            <!-- Título da Página -->
            <h1 class="text-center mb-4 fw-bold">Vagas Disponíveis</h1>

            <!-- Grid Responsivo com os 4 Cards -->
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="height: 160px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold">Título da Vaga</h5>
                                <p class="card-text text-secondary">Descrição da Vaga.</p>
                            </div>
                            <a href="#" class="btn btn-primary mt-3" style="background-color: #0d6efd; border: none;">Ver Detalhes</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="height: 160px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold">Título da Vaga</h5>
                                <p class="card-text text-secondary">Descrição da Vaga.</p>
                            </div>
                            <a href="#" class="btn btn-primary mt-3" style="background-color: #0d6efd; border: none;">Ver Detalhes</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="height: 160px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold">Título da Vaga</h5>
                                <p class="card-text text-secondary">Descrição da Vaga.</p>
                            </div>
                            <a href="#" class="btn btn-primary mt-3" style="background-color: #0d6efd; border: none;">Ver Detalhes</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="height: 160px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold">Título da Vaga</h5>
                                <p class="card-text text-secondary">Descrição da Vaga.</p>
                            </div>
                            <a href="#" class="btn btn-primary mt-3" style="background-color: #0d6efd; border: none;">Ver Detalhes</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include "footer.php" ?>
</body>
</html>