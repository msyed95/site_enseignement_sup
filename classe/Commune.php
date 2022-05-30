<?php

class Commune {

    private $_nomCommune;
    private $_cp;
    private $_bp;
    private $_adresse;
    private $_cedex;
    private $_arrondissement;
    static $lesCommunes = array();

    public function __construct($unNom, $unCp, $unBp, $uneAdresse, $unCedex = null, $unArrondissement = null) {
        $this->_nomCommune = $unNom;
        $this->_cp = $unCp;
        $this->_bp = $unBp;
        $this->_adresse = $uneAdresse;
        $this->_cedex = $unCedex;
        $this->_arrondissement = $unArrondissement;
        if (!in_array("".$unNom, self::$lesCommunes)) {
            self::$lesCommunes[] = "".$unNom;
            sort(self::$lesCommunes);
        }
    }

    public function __get($attribut) {
        switch ($attribut) {
            case '$_nomCommune' :
                return $this->_nomCommune;
            case '$_cp' :
                return $this->_cp;
                break;
            case '$_bp' :
                return $this->_bp;
                break;
            case '$_adresse' :
                return $this->_adresse;
                break;
            case '$_cedex' :
                return $this->_cedex;
                break;
            case '$_arrondissement' :
                return $this->_statut;
                break;
            case '$laRegion' :
                return $this->laRegion;
                break;
        }
    }
    
    public static function getEtablissementByCommune($unNomCommune) {
        $listeEtablissement = array ();
        foreach (Etablissement::$lesEtablissements as $unEtablissement) {
            if($unEtablissement->__get('$laCommune')->__get('$_nomCommune') == $unNomCommune) {
                $listeEtablissement[] = $unEtablissement;
            }
        }
        return $listeEtablissement;
    }

}

?>