<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!isset($_SESSION['compteur'])) { // servira de compteur pour les cookies
    $_SESSION['compteur'] = 0;
}
include("vues/vue_accueil.php");
