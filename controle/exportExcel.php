<?php
    require_once ("../modele/testBD.php");
    session_start();
    exportBilanBD();
    header ("Location: ../index.php?controle=utilisateur&action=accueil" );
?>