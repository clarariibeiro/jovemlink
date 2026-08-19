<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "conexaoBD.php";

$emailEmpresa = mysqli_real_escape_string($conn, trim($_POST['emailEmpresa'] ?? '')); 
$senhaEmpresa = mysqli_real_escape_string($conn, trim($_POST['senhaEmpresa'] ?? ''));

$senhaMD5 = md5($senhaEmpresa);

// Busca no banco
$sql = "SELECT * FROM Empresa WHERE emailEmpresa = '$emailEmpresa' AND senhaEmpresa = '$senhaMD5'";
$res = mysqli_query($conn, $sql);

echo "<h2>Diagnóstico de Login</h2>";
echo "<strong>Email digitado:</strong> " . $emailEmpresa . "<br>";
echo "<strong>Senha em MD5:</strong> " . $senhaMD5 . "<br>";
echo "<strong>Linhas encontradas no Banco:</strong> " . mysqli_num_rows($res) . "<br><br>";

if ($registro = mysqli_fetch_assoc($res)) {
    echo "<span style='color:green; font-weight:bold;'>PASSO 1 OK: Empresa encontrada no banco!</span><br>";
    
    $_SESSION['idEmpresa'] = $registro['idEmpresa'];
    $_SESSION['logado']    = true;
    
    echo "<strong>Conteúdo salvo na Sessão:</strong><br>";
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    
    echo "<a href='formCadastrarVaga.php'>Clique aqui para testar o clique manual para a página de Vagas</a>";
} else {
    echo "<span style='color:red; font-weight:bold;'>ERRO: E-mail ou senha não batem com o banco de dados.</span><br>";
    echo "Verifique se no cadastro a senha foi salva com <code>md5()</code> ou se o nome da tabela/coluna no phpMyAdmin é exatamente 'Empresa' e 'emailEmpresa'.";
}
?>