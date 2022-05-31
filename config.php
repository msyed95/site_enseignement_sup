<?php
//session_start();

//Appel des classes avec l'autoload
function chargerClasse($classe) {
    require './classe/' . $classe . '.php';
}

spl_autoload_register('chargerClasse');

$arrayAttributEtablissement = array(
    '_code', '_numSiret', '_nom', '_sigle', '_statut',
    '_tutelle', '_universite', '_telephone', '_longitude', '_latitude', '_debutPo',
    '_finPo', '_commentairePo', '_lien'
);

$arrayAttributEtablissementAGarder = array(
    'code_uai', 'n_siret', 'nom', 'sigle', 'statut', 'tutelle',
    'universite', 'telephone', 'longitude_x', 'latitude_y', 'debut_portes_ouvertes', 'fin_portes_ouvertes',
    'commentaires_portes_ouvertes', 'lien_site_onisepfr'
);

// test si le fichier existe
if (file_exists("csv.xml")) {
    $array = array();
    $arrayReg = array();
    $indiceObjetEtablissement = 0;
    // on charge le fichier xml
    $xml = simplexml_load_file("csv.xml");

    // on parcourt le fichier et unEtablissement sera donc l'équivalent de <item> dans le XML
    foreach ($xml as $unEtablissement) {
        // on parcourt l'etablissement pour avoir accés au valeur à l'intérieur de la balise <item> en utilisant une key
        foreach ($unEtablissement as $key => $attribut) {
            // si la key est dans le tableau pour construire l'objet Etablissement
            if (in_array($key, $arrayAttributEtablissementAGarder)) {
                // on recupere le numero de l'index de la key dans le tableau, ex : pour $key = statut alors renverra 5
                $key = array_search($key, $arrayAttributEtablissementAGarder);
                $array[] = array(
                    $arrayAttributEtablissement[$key] => $attribut
                );
            } else {
                // créera les variables : $boite_postale, $adresse, $cp, $commune,
                // $commune_cog, $cedex, $arrondissement, $departement, $academie, $region, $region_cog, $type_detablissement
                ${'' . $key} = $attribut;
            }
        }

        // Affichera toutes les informations d'un etablissement sous forme de tableau : print_r($array);die;
        // on créer un objet de type Etablissement,
        // on appelle donc la fonction __construct indirectement dans la classe Etablissement
        // ${'etablissement'.$indiceObjetEtablissement} créera une variable dynamique a chaque passage dans la boucle :
        // $etablissement0, $etablissement1, $etablissement2....

        $reg = new Region($region, $region_cog, $departement);
        $acad = new Academie($academie);
        $commune = new Commune($commune, $cp, $boite_postale, $adresse, $cedex, $arrondissement);
        ${'etablissement' . $indiceObjetEtablissement} = new Etablissement($arrayAttributEtablissement, $array,$type_detablissement, $reg, $commune, $acad);


        $indiceObjetEtablissement++;
        $array = array(); // on réinitialise le tableau a vide pour un nouvel Etablissement
    }
} else {
    echo "Désolé le fichier n'existe pas";
    exit;
}
?>

