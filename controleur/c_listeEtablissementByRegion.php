<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$unCogRegion = $id;

$resultatEtablissement = Region:: getEtablissementByRegion($unCogRegion);
include("vues/vue_listeEtablissementByRegion.php");
