<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include("include/header.html");
?>
<section class="principal">
    <h4><?php
        echo $unEtablissement->__get('$_nom');
        ?>
    </h4>
    <div class="graph">
        <!-- graph !-->
    </div>

    <ul class="liste-recherche">
        <li style='box-shadow: 8px 8px 12px #aaa;width:100%'>
            <h4> Informations </h4>
            <div class='block-full-sans-ombre'>
                <p> Code :<?php echo!empty($unEtablissement->__get('$_code')) ? $unEtablissement->__get('$_code') : ""; ?>
                <p> N° Siret : <?php echo!empty($unEtablissement->__get('$_numSiret')) ? $unEtablissement->__get('$_numSiret') : "Aucune information"; ?>
                <p> Type établissement : <?php echo!empty($unEtablissement->__get('$_typeEtab')) ? $unEtablissement->__get('$_typeEtab') : "Aucune information"; ?>
                <p> Académie : <?php echo!empty($unEtablissement->__get('$_laAcademie')) ? $unEtablissement->__get('$_laAcademie') : "Aucune information"; ?>
                <p> Sigle : <?php echo!empty($unEtablissement->__get('$_sigle')) ? $unEtablissement->__get('$_sigle') : "Aucune information"; ?>
                <p> Statut : <?php echo!empty($unEtablissement->__get('$_statut')) ? $unEtablissement->__get('$_statut') : "Aucune information"; ?>
                <p> Tutelle : <?php echo!empty($unEtablissement->__get('$_tutelle')) ? $unEtablissement->__get('$_tutelle') : "Aucune information"; ?>
                <p> Universite : <?php echo!empty($unEtablissement->__get('$_universite')) ? $unEtablissement->__get('$_universite') : "Aucune information"; ?>
                <p> Téléphone : <?php echo!empty($unEtablissement->__get('$_telephone')) ? $unEtablissement->__get('$_telephone') : "Aucune information"; ?>
                <p> Longitude : <?php echo!empty($unEtablissement->__get('$_longitude')) ? $unEtablissement->__get('$_longitude') : "Aucune information"; ?>
                <p> Latitude : <?php echo!empty($unEtablissement->__get('$_latitude')) ? $unEtablissement->__get('$_latitude') : "Aucune information"; ?>
                <p><a href="<?php echo $unEtablissement->__get('$_lien'); ?>"> Visiter le site </a></p>
            </div>
        </li>
    </ul>

    <!-- Block des portes ouvertes !-->
    <?php if (!empty($unEtablissement->__get('$_debutPo'))) { ?>
        <button class="button" style= "width:99%;margin:20px 0;" onclick="changeEtatBlock('porteOuverte', true)">
            + Découvrer nos portes ouvertes
        </button>
    <?php } ?>

    <!-- Block a afficher !-->
    <div class="cacher" id="porteOuverte">
        <ul class="liste-recherche" style="margin-bottom: 25px;">
            <li class='block-full'>
                <h4> Info </h4>
                Debut : <?php echo $unEtablissement->__get('$_debutPo'); ?> <br>
                Fin : <?php echo $unEtablissement->__get('$_finPo'); ?> <br>
                <p> Commentaire : <?php echo!empty($unEtablissement->__get('$_commentairePo')) ? $unEtablissement->__get('$_commentairePo') : "Aucune information"; ?>
            </li>
        </ul>
    </div>
</section>
<?php include("include/menu_lat.php"); ?>
</body>
