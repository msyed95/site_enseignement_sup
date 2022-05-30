<?php

class Academie {
    private $_nomAcademie;
    static $lesAcademies = array (); // Contiendra les établissement qui font parti de l'académie
    
    public function __construct($unNom) {
        $this->_nomAcademie = $unNom;
        if(!in_array(''.$unNom, self::$lesAcademies)) {
            self::$lesAcademies[] = ''.$unNom;
            sort(self::$lesAcademies);
        }
    }
    
    public function __get($attribut) {
        switch ($attribut) {
            case '$_nomAcademie' :
            return $this->_nomAcademie;
            break;
        }
    }
    
    public static function getEtablissementByAcademie($unNomAcademie) {
        $listeEtablissement = array ();
        foreach (Etablissement::$lesEtablissements as $unEtablissement) {
            if($unEtablissement->__get('$laAcademie')->__get('$_nomAcademie') == $unNomAcademie) {
                $listeEtablissement[] = $unEtablissement;
            }
        }
        return $listeEtablissement;
    }
}