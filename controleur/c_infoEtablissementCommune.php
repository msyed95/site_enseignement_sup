<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$nomCommune = $_GET['id'];
$listeEtablissement = Etablissement::getEtablissementByCommune($nomCommune);
include("vues/vue_listEtablissementCommune.php");