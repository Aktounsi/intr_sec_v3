<?php //session_start();
defined('_DEFVARADMIN') or exit('Restricted Access');
if(!isset($verified)) require('../DBconnection.php');

$requsername = $bdd->query('SELECT membre_ID from membres
    where membres.pseudo=\'' . $_SESSION['username'] . '\' ');
    $rowusername = $requsername->fetch();

$membre_ID = $rowusername['membre_ID'];

$reqInfo = $bdd->query('SELECT nom AS nom,prenom AS prenom,matricule AS matricule,pseudo AS pseudo FROM membres
where membre_ID=' . $membre_ID );
$rowInfo = $reqInfo->fetch();

$name = $rowInfo['nom'];
$prenom = $rowInfo['prenom'];
$matricule = $rowInfo['matricule'];
$pseudo = $rowInfo['pseudo'];