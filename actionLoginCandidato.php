<?php

    include "conexaoBD.php"; 
    session_start(); 

    $emailCandidato = mysqli_real_escape_string($conn, $_POST['emailCandidato']); 
    $senhaCandidato = mysqli_real_escape_string($conn, $_POST['senhaCandidato']);

    $buscarLogin = "SELECT * 
                    FROM Candidato 
                    WHERE emailCandidato = '$emailCandidato' 
                    AND senhaCandidato = md5('$senhaCandidato')";

    $efetuarLogin = mysqli_query($conn, $buscarLogin); 

    if ($registro = mysqli_fetch_assoc($efetuarLogin)) {
        $_SESSION['idCandidato']    = $registro['idCandidato'];
        $_SESSION['nomeCandidato']  = $registro['nomeCandidato'];
        $_SESSION['emailCandidato'] = $registro['emailCandidato'];
        $_SESSION['nivelCandidato'] = $registro['nivelCandidato'];
        $_SESSION['logado']       = true;

        header("Location: index.php");
        exit();
    } else {
        header("Location: formLogin.php?erroLogin=dadosInvalidos"); 
        exit();
    }

?>