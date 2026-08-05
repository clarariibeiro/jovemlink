<?php

    include "conexaoBD.php"; 
    session_start(); 

    $emailEmpresa = mysqli_real_escape_string($conn, $_POST['emailEmpresa ']); 
    $senhaEmpresa = mysqli_real_escape_string($conn, $_POST['senhaEmpresa ']);

    $buscarLogin = "SELECT * 
                    FROM Empresa 
                    WHERE emailEmpresa = '$emailEmpresa' 
                    AND senhaEmpresa = md5('$senhaEmpresa')

    $efetuarLogin = mysqli_query($conn, $buscarLogin); 

    if ($registro = mysqli_fetch_assoc($efetuarLogin)) {
        $_SESSION['idEmpresa']    = $registro['idEmpresa'];
        $_SESSION['nomeEmpresa']  = $registro['nomeEmpresa'];
        $_SESSION['emailEmpresa'] = $registro['emailEmpresa'];
        $_SESSION['logado']       = true;

        header("Location: index.php");
        exit();
    } else {
        header("Location: formLoginEmpresa.php?erroLogin=dadosInvalidos"); 
        exit();
    }

?>