<?php include "header.php"; ?>

<main class="container-fluid px-3 px-md-5 mt-5 pt-3 mb-5 jl-font-body">
    <!-- Cabeçalho Principal -->
    <div class="row align-items-center mb-4 g-3 bg-white p-4 rounded-3 shadow-sm border-0">
        <div class="col-md-8">
            <h1 class="jl-font-title fw-bold mb-1 jl-color-heading">Editar Perfil</h1>
            <p class="text-muted mb-0">Atualize seus dados pessoais e de contato para que as empresas te encontrem.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="curriculo.php" class="btn btn-outline-secondary jl-font-title">
                <i class="fa-solid fa-arrow-left me-1"></i> Voltar ao Currículo
            </a>
        </div>
    </div>

    <!-- Formulário de Edição -->
    <form action="salvar-perfil.php" method="POST" enctype="multipart/form-data">
        <div class="row g-4">
            
            <!-- Coluna Esquerda: Foto e Dicas -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4 rounded-3 text-center mb-4">
                    <h5 class="jl-font-title fw-bold mb-3 jl-color-heading">Foto do Perfil</h5>
                    
                    <div class="mb-3">
                        <img src="assets/img/ana.webp" alt="Ana Silva" class="rounded-circle img-thumbnail shadow-sm" style="width: 140px; height: 140px; object-fit: cover;">
                    </div>
                    
                    <div class="mb-2 text-start">
                        <label for="foto" class="form-label fw-semibold text-secondary small">Alterar Imagem</label>
                        <input type="file" id="foto" name="foto" class="form-control form-control-sm" accept="image/*">
                    </div>
                    
                    <small class="text-muted d-block mt-2">Formatos aceitos: JPG ou PNG.</small>
                </div>

                <div class="card border-0 shadow-sm p-4 rounded-3 bg-jl-gradient text-white">
                    <h5 class="jl-font-title fw-bold mb-2"><i class="fa-solid fa-lightbulb me-2"></i> Dica de Foto</h5>
                    <p class="small mb-0 opacity-90">Escolha um ambiente bem iluminado, neutro e evite usar óculos escuros ou chapéus na foto do perfil.</p>
                </div>
            </div>

            <!-- Coluna Direita: Dados Pessoais e de Contato -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-4 rounded-3">
                    <h5 class="jl-font-title fw-bold mb-4 pb-2 border-bottom jl-color-heading">
                        <i class="fa-regular fa-id-card text-jl me-2"></i> Dados Pessoais
                    </h5>

                    <div class="row g-3">
                        <!-- Nome Completo -->
                        <div class="col-md-6">
                            <label for="nome" class="form-label fw-semibold text-secondary">Nome Completo</label>
                            <input type="text" class="form-control form-control-lg fs-6" id="nome" name="nome" value="Ana Silva" required>
                        </div>

                        <!-- Data de Nascimento -->
                        <div class="col-md-6">
                            <label for="nascimento" class="form-label fw-semibold text-secondary">Data de Nascimento</label>
                            <input type="date" class="form-control form-control-lg fs-6" id="nascimento" name="nascimento" value="2009-05-14" required>
                        </div>

                        <!-- E-mail -->
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold text-secondary">E-mail</label>
                            <input type="email" class="form-control form-control-lg fs-6" id="email" name="email" value="ana.silva@email.com" required>
                        </div>

                        <!-- Telefone / WhatsApp -->
                        <div class="col-md-6">
                            <label for="telefone" class="form-label fw-semibold text-secondary">Telefone / WhatsApp</label>
                            <input type="tel" class="form-control form-control-lg fs-6" id="telefone" name="telefone" value="(11) 99999-9999" required>
                        </div>

                        <h5 class="jl-font-title fw-bold mt-4 mb-3 pb-2 border-bottom jl-color-heading">
                            <i class="fa-solid fa-location-dot text-jl me-2"></i> Endereço
                        </h5>

                        <!-- Cidade -->
                        <div class="col-md-8">
                            <label for="cidade" class="form-label fw-semibold text-secondary">Cidade</label>
                            <input type="text" class="form-control form-control-lg fs-6" id="cidade" name="cidade" value="São Paulo" required>
                        </div>

                        <!-- Estado -->
                        <div class="col-md-4">
                            <label for="estado" class="form-label fw-semibold text-secondary">Estado (UF)</label>
                            <select class="form-select form-select-lg fs-6" id="estado" name="estado" required>
                                <option value="SP" selected>São Paulo (SP)</option>
                                <option value="RJ">Rio de Janeiro (RJ)</option>
                                <option value="MG">Minas Gerais (MG)</option>
                                <option value="PR">Paraná (PR)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Botões de Ação -->
                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                        <a href="curriculo.php" class="btn btn-light px-4 jl-font-title">Cancelar</a>
                        <button type="submit" class="btn btn-jl-primary px-4 jl-font-title">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Salvar Alterações
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </form>
</main>

<?php include "footer.php"; ?>