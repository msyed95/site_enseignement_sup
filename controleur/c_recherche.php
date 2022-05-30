<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$champ = "";

// si l'utilisateur clique sur refaire la recherche dans l'historique des recherches
if(isset($_GET['champ'],$_GET['texte'])) {
    $champ = $_GET['champ']; // on récup le champ
    $recherche = $_GET['texte']; // on récup la valeur
} else if (isset($_POST['liste'])) { // si on choisis avec la liste
    $recherche = $_POST['liste'];
}
else {
    $recherche = $_POST['field_search']; // si il passe par la recherche
    if($recherche == "") {
        $recherche = "Vous avez rentré un champ vide";
    }
}

// si le bouton rechercher de la region a été cliqué ou que le champ récupère de l'historique
// des recherches est region, idem pour les autres conditions

if(isset($_POST['btnRegion']) || $champ == "region") {
    $champ = "region";
    setcookie ('champ'.$_SESSION['compteur'], "".$champ, time() + 60* 60 *3600); // contenant le champ
    setcookie ('texte'.$_SESSION['compteur'], "".$recherche, time() + 60* 60 *3600); // contenant la saisie
    $_SESSION['compteur'] += 1;
    
    if(in_array("".$recherche,Region::$lesRegions) && $recherche != "") {
        $resultatRegion = array ($recherche);
        include ("vues/vue_region.php");
    } else {
        $_SESSION['error'] = "Aucune région n'a été trouvée";
        header('Location:index.php');
    }
} else if (isset($_POST['btnEtablissement']) || $champ == "etablissement") {
    $champ = "etablissement";
    setcookie ('champ'.$_SESSION['compteur'], "".$champ, time() + 60* 60 *3600); // contenant le champ
    setcookie ('texte'.$_SESSION['compteur'], "".$recherche, time() + 60* 60 *3600); // contenant la saisie
    $_SESSION['compteur'] += 1;

    foreach (Etablissement::$lesEtablissements as $unEtablissement) {
        if($recherche == $unEtablissement->__get('$_nom')) { 
            $resultatEtablissement = Etablissement::getEtablissementByNom($recherche); //on récupère l'objet
            include ("vues/vue_etablissementRecherche.php");
        }
    }
    if(count($resultatEtablissement) == 0) {
        $_SESSION['error'] = "Aucun établissement n'a été trouvé";
        header('Location:index.php');
    }
} else if (isset($_POST['btnCommune']) || $champ == "commune") {
    $champ = "commune";
    setcookie ('champ'.$_SESSION['compteur'], "".$champ, time() + 60* 60 *3600); // contenant le champ
    setcookie ('texte'.$_SESSION['compteur'], "".$recherche, time() + 60* 60 *3600); // contenant la saisie
    $_SESSION['compteur'] += 1;
    
    if(in_array("".$recherche,Commune::$lesCommunes)) {
        $resultatCommune = array ($recherche);
        include("vues/vue_communeRecherche.php");
    }
    else {
        $_SESSION['error'] = "Aucune commune n'a été trouvée";
        header('Location:index.php');
    }
} else if (isset($_POST['btnType']) || $champ == "type") {
    $champ = "type";
    setcookie ('champ'.$_SESSION['compteur'], "".$champ, time() + 60* 60 *3600); // contenant le champ
    setcookie ('texte'.$_SESSION['compteur'], "".$recherche, time() + 60* 60 *3600); // contenant la saisie
    $_SESSION['compteur'] += 1;
    
    if(in_array("".$recherche,Etablissement::$lesTypes)) {
        $listeTypes = array ($recherche);
        include("vues/vue_type.php");
    } else {
        $_SESSION['error'] = "Aucun type n'a été trouvé";
        header('Location:index.php');
    }
    
}
