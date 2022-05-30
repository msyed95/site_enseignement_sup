<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$typeEtablissement =$id;//recupere un type d'etablissement
$listeEtablissement = Etablissement::getEtablissementByType($typeEtablissement);
include("vues/vue_infoType.php");