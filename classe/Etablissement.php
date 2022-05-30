
<?php

class Etablissement {

    // ATTRIBUTS
    private $_code;
    private $_numSiret;
    private $_typeEtab;
    private $_nom;
    private $_sigle;
    private $_statut;
    private $_tutelle;
    private $_universite;
    private $_telephone;
    private $_longitude;
    private $_latitude;
    private $_debutPo;
    private $_finPo;
    private $_commentairePo;
    private $_lien;
    private $_laCommune;
    private $_laRegion;
    private $_laAcademie;
    static $lesEtablissements = array();
    static $lesTypes = array();

    // CONSTRUCTEURS
    public function __construct($arrayAttribut, $arrayValue,$unType, $reg, $commune, $academie) {
        foreach ($arrayAttribut as $key => $value) {
            $this->$value = $arrayValue[$key][$value];
        }
        // on le sort du tableau Attribu car on a besoin d'avoir accé au libelle du type pour la collection lesTypes
        $this->_typeEtab = $unType;
        $this->_laRegion = $reg;
        $this->_laCommune = $commune;
        $this->_laAcademie = $academie;
        self::$lesEtablissements[] = $this; // on rajoute l'Etablissemet dans la liste
        if(!in_array("".$unType,self::$lesTypes)) {
            self::$lesTypes[] = "".$unType;
        }
    }
    public function __get($attribut) {
        switch ($attribut) {
            case '$_code' :
                return $this->_code;
            case '$_numSiret' :
                return $this->_numSiret;
                break;
            case '$_typeEtab' :
                return $this->_typeEtab;
                break;
            case '$_nom' :
                return $this->_nom;
                break;
            case '$_sigle' :
                return $this->_sigle;
                break;
            case '$_statut' :
                return $this->_statut;
                break;
            case '$_tutelle' :
                return $this->_tutelle;
                break;
            case '$_universite' :
                return $this->_universite;
                break;
            case '$_telephone' :
                return $this->_telephone;
                break;
            case '$_longitude' :
                return $this->_longitude;
                break;
            case '$_latitude' :
                return $this->_latitude;
                break;
            case '$_debutPo' :
                return $this->_debutPo;
                break;
            case '$_finPo' :
                return $this->_finPo;
                break;
            case '$_commentairePo' :
                return $this->_commentairePo;
                break;
            case '$_lien' :
                return $this->_lien;
                break;
            case '$laCommune' :
                return $this->_laCommune;
                break;
            case '$laRegion' :
                return $this->_laRegion;
                break;
            case '$laAcademie' :
                return $this->_laAcademie;
                break;
        }
    }

    // METHODES
    public static function getEtablissementByType($untype) {
        $listeEtablissement = array();
        foreach (Etablissement::$lesEtablissements as $unEtablissement) {
            if ($unEtablissement->__get('$_typeEtab') == $untype) {
                $listeEtablissement[] = $unEtablissement;
            }
        }
        return $listeEtablissement;
    }

    public static function getEtablissementById($unId) {
        foreach (Etablissement::$lesEtablissements as $unEtablissement) {
            if ($unEtablissement->__get('$_code') == $unId) {
                return $unEtablissement;
            }
        }
    }

    public static function getEtablissementByCommune($unNomCommune) {
        $listeEtablissement = array();
        foreach (Etablissement::$lesEtablissements as $unEtablissement) {
            if ($unEtablissement->__get('$laCommune')->__get('$_nomCommune') == $unNomCommune) {
                $listeEtablissement[] = $unEtablissement;
            }
        }
        return $listeEtablissement;
    }
    
    public static function getEtablissementByNom($unNom) {
        $listeEtablissement = array();
        foreach (Etablissement::$lesEtablissements as $unEtablissement) {
            if ($unEtablissement->__get('$_nom') == $unNom) {
                $listeEtablissement[] = $unEtablissement;
            }
        }
        return $listeEtablissement;
    }

}
