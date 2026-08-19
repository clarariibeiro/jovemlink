<?php include "header.php"; ?>

<main class="container-fluid px-3 px-md-5 mt-5 pt-3 mb-5 jl-font-body">
    <!-- Cabeçalho Principal -->
    <div class="row align-items-center mb-4 g-3 bg-white p-4 rounded-3 shadow-sm border-0">
        <div class="col-md-7">
            <h1 class="jl-font-title fw-bold mb-1 jl-color-heading">Meu Currículo</h1>
            <p class="text-muted mb-0">Complete suas informações para se destacar para as empresas no JovemLink.</p>
        </div>
        <div class="col-md-5">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="jl-font-title fw-semibold text-secondary">Progresso do Currículo</span>
                <span class="badge bg-jl-blue jl-font-title fs-6 px-3 py-2">80%</span>
            </div>
            <div class="progress" style="height: 12px; background-color: #e9ecef;">
                <div class="progress-bar bg-jl-gradient progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>

    <!-- Grid Conteúdo -->
    <div class="row g-4">
        
        <!-- Coluna Esquerda -->
        <div class="col-lg-8">
            
            <!-- Card de Perfil Resumido -->
            <div class="card border-0 shadow-sm p-4 mb-4 rounded-3">
                <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start gap-4">
                    <div class="text-center">
                        <img src="assets/img/ana.webp" alt="Ana Silva" class="rounded-circle img-thumbnail mb-2 shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                        <button class="btn btn-sm btn-outline-secondary w-100 jl-font-title"><i class="fa-solid fa-pencil me-1"></i> Foto</button>
                    </div>
                    <div class="user-details flex-grow-1 text-center text-sm-start">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h2 class="jl-font-title fw-bold mb-0 jl-color-heading">Ana Silva</h2>
                            <button class="btn btn-jl-primary btn-sm px-3 d-none d-sm-inline-block jl-font-title"><i class="fa-solid fa-pencil me-1"></i> Editar Perfil</button>
                        </div>
                        
                        <div class="row g-2 mt-2 text-muted">
                            <div class="col-sm-6"><i class="fa-regular fa-calendar text-jl me-2"></i> 16 anos</div>
                            <div class="col-sm-6"><i class="fa-solid fa-location-dot text-jl me-2"></i> São Paulo - SP</div>
                            <div class="col-sm-6"><i class="fa-regular fa-envelope text-jl me-2"></i> ana.silva@email.com</div>
                            <div class="col-sm-6"><i class="fa-solid fa-phone text-jl me-2"></i> (11) 99999-9999</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informações do Currículo -->
            <div class="card border-0 shadow-sm p-4 rounded-3">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <h4 class="jl-font-title fw-bold mb-0 jl-color-heading">Informações do Currículo</h4>
                    <span class="text-muted small">Última atualização hoje</span>
                </div>
                
                <div class="row g-3">
                    <!-- Escolaridade -->
                    <div class="col-12">
                        <div class="p-3 rounded-3 bg-light d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="bg-white p-3 rounded-circle shadow-sm me-3 text-jl">
                                    <i class="fa-solid fa-graduation-cap fs-5"></i>
                                </div>
                                <div>
                                    <span class="text-uppercase text-muted fw-bold style-label">Escolaridade</span>
                                    <h6 class="mb-0 fw-bold text-dark jl-font-title fs-5">Ensino Médio – Cursando 1º ano</h6>
                                </div>
                            </div>
                            <a href="#" class="text-decoration-none text-jl jl-font-title fw-semibold pe-2">Alterar</a>
                        </div>
                    </div>

                    <!-- Cursos -->
                    <div class="col-12">
                        <div class="p-3 rounded-3 bg-light d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="bg-white p-3 rounded-circle shadow-sm me-3 text-jl">
                                    <i class="fa-solid fa-book-open fs-5"></i>
                                </div>
                                <div>
                                    <span class="text-uppercase text-muted fw-bold style-label">Cursos Adicionais</span>
                                    <h6 class="mb-0 fw-bold text-dark jl-font-title fs-5">Informática Básica, Excel Básico</h6>
                                </div>
                            </div>
                            <a href="#" class="text-decoration-none text-jl jl-font-title fw-semibold pe-2">Alterar</a>
                        </div>
                    </div>

                    <!-- Habilidades -->
                    <div class="col-12">
                        <div class="p-3 rounded-3 bg-light d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="bg-white p-3 rounded-circle shadow-sm me-3 text-jl">
                                    <i class="fa-regular fa-star fs-5"></i>
                                </div>
                                <div>
                                    <span class="text-uppercase text-muted fw-bold style-label">Habilidades Principais</span>
                                    <h6 class="mb-0 fw-bold text-dark jl-font-title fs-5">Comunicação, Organização, Aprendizado rápido</h6>
                                </div>
                            </div>
                            <a href="#" class="text-decoration-none text-jl jl-font-title fw-semibold pe-2">Alterar</a>
                        </div>
                    </div>

                    <!-- Área de Interesse -->
                    <div class="col-12">
                        <div class="p-3 rounded-3 bg-light d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="bg-white p-3 rounded-circle shadow-sm me-3 text-jl">
                                    <i class="fa-solid fa-bullseye fs-5"></i>
                                </div>
                                <div>
                                    <span class="text-uppercase text-muted fw-bold style-label">Área de Interesse</span>
                                    <h6 class="mb-0 fw-bold text-dark jl-font-title fs-5">Administrativo, Informática, Atendimento</h6>
                                </div>
                            </div>
                            <a href="#" class="text-decoration-none text-jl jl-font-title fw-semibold pe-2">Alterar</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Coluna Direita -->
        <div class="col-lg-4">
            
            <!-- Card PDF -->
            <div class="card border-0 shadow-sm p-4 mb-4 text-center rounded-3">
                <h5 class="jl-font-title fw-bold mb-3 jl-color-heading">Currículo em PDF</h5>
                <i class="fa-solid fa-file-pdf text-danger display-3 mb-2"></i>
                <p class="small text-muted mb-3">Ana_Silva_Curriculo.pdf</p>
                <button class="btn btn-outline-danger w-100 py-2 jl-font-title"><i class="fa-solid fa-download me-2"></i> Baixar PDF</button>
            </div>

            <!-- Checklist -->
            <div class="card border-0 shadow-sm p-4 mb-4 rounded-3">
                <h5 class="jl-font-title fw-bold mb-3 jl-color-heading">Status do Preenchimento</h5>
                <ul class="list-unstyled mb-0">
                    <li class="py-2 border-bottom text-success"><i class="fa-solid fa-circle-check me-2"></i> Foto adicionada</li>
                    <li class="py-2 border-bottom text-success"><i class="fa-solid fa-circle-check me-2"></i> Informações pessoais</li>
                    <li class="py-2 border-bottom text-success"><i class="fa-solid fa-circle-check me-2"></i> Escolaridade</li>
                    <li class="py-2 border-bottom text-success"><i class="fa-solid fa-circle-check me-2"></i> Habilidades</li>
                    <li class="py-2 border-bottom text-muted"><i class="fa-regular fa-circle me-2"></i> Experiências</li>
                    <li class="py-2 text-success"><i class="fa-solid fa-circle-check me-2"></i> Cursos</li>
                </ul>
            </div>

            <!-- Dica JovemLink -->
            <div class="card border-0 shadow-sm bg-jl-gradient text-white p-4 rounded-3">
                <h5 class="jl-font-title fw-bold mb-2"><i class="fa-solid fa-star me-2"></i> Dica Rápida</h5>
                <p class="small mb-0 opacity-90">Quanto mais completo seu currículo, maiores são as chances de você aparecer em destaque nas buscas das empresas!</p>
            </div>

        </div>

    </div>
</main>

<?php include "footer.php"; ?>