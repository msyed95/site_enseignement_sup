<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$id = $_GET['id'];

$unEtablissement = Etablissement::getEtablissementById($id);
include ("vues/vue_info.php");
