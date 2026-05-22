<?php

class Agence {
    // Attributes
    private $codeAg;
    private $nomAg;
    private $adresseAg;
    private $telAg;

    // Constructor
    public function __construct($codeAg, $nomAg, $adresseAg, $telAg) {
        $this->codeAg = $codeAg;
        $this->nomAg = $nomAg;
        $this->adresseAg = $adresseAg;
        $this->telAg = $telAg;
    }

    // Getters
    public function getCodeAg() {
        return $this->codeAg;
    }

    public function getNomAg() {
        return $this->nomAg;
    }

    public function getAdresseAg() {
        return $this->adresseAg;
    }

    public function getTelAg() {
        return $this->telAg;
    }

    // Setters
    public function setCodeAg($codeAg) {
        $this->codeAg = $codeAg;
    }

    public function setNomAg($nomAg) {
        $this->nomAg = $nomAg;
    }

    public function setAdresseAg($adresseAg) {
        $this->adresseAg = $adresseAg;
    }

    public function setTelAg($telAg) {
        $this->telAg = $telAg;
    }

    // toString method to display stagiaire information
    public function __toString() {
        return "Code: " . $this->codeAg . " | Nom: " . $this->nomAg . 
               " | Adresse: " . $this->adresseAg . " | Téléphone: " . $this->telAg;
    }
}

?>