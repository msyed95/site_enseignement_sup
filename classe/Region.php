<?php

class Region {
    private $_nomRegion;
    private $_regionCog;
    private $_departement;
    static $lesRegions = array (); // contiendra toutes les régions
    
    public function __construct ($unNom, $uneRegionCog, $unDepartement) {
        $this->_nomRegion = $unNom;
        $this->_regionCog = $uneRegionCog;
        $this->_departement = $unDepartement;
        if(!in_array("".$uneRegionCog, self::$lesRegions)) {
            self::$lesRegions[] = "".$uneRegionCog;
            sort(self::$lesRegions);
        }
    }
    
    public function __get($attribut){
        switch ($attribut) {
            case '$_nomRegion' : 
                return $this->_nomRegion;
                break;
            case '$_regionCog' :
                return $this->_regionCog;
                break;
        }
    }
    
    public static function getEtablissementByRegion($unCogRegion) {
        $listeEtablissement = array ();
        foreach (Etablissement::$lesEtablissements as $unEtablissement) {
            if($unEtablissement->__get('$laRegion')->__get('$_regionCog') == $unCogRegion) {
                $listeEtablissement[] = $unEtablissement;
            }
        }
        return $listeEtablissement;
    }
}