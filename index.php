<?php
session_start();
include_once('include/head.html');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('config.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'accueil';
if(isset($_GET['id'])) {
    $id = str_replace("-"," ",$_GET['id']);
    $id = str_replace("__","-",$id);
}


switch ($action) {
    case 'accueil' :
        include("controleur/c_accueil.php");
        break;
    
    case 'etablissement' : 
        include("controleur/c_etablissement.php");
        break;
    
    case 'info' : 
        include("controleur/c_info.php");
        break;
    
    case 'infoEtablissementCommune' :
        include("controleur/c_infoEtablissementCommune.php");
        break;
    
    case 'type':
        include("controleur/c_type.php");
        break;
    
    case 'infoType' :
        include("controleur/c_infoType.php");
        break;
    
    case 'recherche' :
        include("controleur/c_recherche.php");
        break;
    
    case 'listeEtablissementByRegion' : 
        include("controleur/c_listeEtablissementByRegion.php");
        break;
    
    case 'commune' :
        include("controleur/c_commune.php");
        break;
    
    case 'region' : 
        include("controleur/c_region.php");
        break;
    
    default:
        echo "Aucune page désolé";
        break;
}


