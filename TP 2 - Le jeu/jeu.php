<?php

class Jeu {
    private $aDeviner = -1; // -1 = valeur par défaut
    private $message = -1;
    private $value = null;
    public function __construct() {
        //print_r(Session::get("checkbox_select")); //print_r("  Generated = ". Session::get("generated"));
        
        if((Session::get("checkbox_select") == "first") && (Session::get("generated") == 1)) { // On doit deviner une valeur hardcodée (ex : 30)
            $this->aDeviner = 30;
            Session::set("value", $this->aDeviner);
            Session::set("generated", 0);
            //print_r("Valeur hardcodée !");
        }
        else if((Session::get("checkbox_select") == "second") && (Session::get("generated") == 1)) {
            $this->aDeviner = $this->generer_hasard();
            Session::set("value", $this->aDeviner);
            Session::set("generated", 0);
            //print_r("Valeur aléatoire !");
        }
        else if((Session::get("checkbox_select") == "third") && (Session::get("generated") == 1)) {
            $this->aDeviner = $this->generer_hasard();
            Session::set("value", $this->aDeviner);
            Session::set("generated", 0);
            //print_r("Valeur bouré !");
        }
        else if(Session::get("checkbox_select") == "none") {
            $this->aDeviner = 30;
            Session::set("value", $this->aDeviner);
            Session::set("generated", 0);
            //print_r("Valeur hardcodée & option auto !");
        }
        else if(Session::get("generated") == 0) {
            $this->aDeviner = Session::get("value");
        }
    }

    public function deviner($chiffre = null) {
        if (isset($chiffre)) {
            $tries = Session::get("usertries");
            $tries = $tries + 1;
            Session::set("usertries", $tries);
            $this->value = (int)$_GET['chiffre'];
            if ($this->value > $this->aDeviner) {
                $this->message = 1;
            } elseif ($this->value < $this->aDeviner) {
                $this->message = 2;
            } else {
                $this->message = 0;
            }
            $this->value = $_GET['chiffre'];
        }
    }

    public function getMessage() {
        return $this->message;
    }
    public function getValue() {
        return $this->value;
    }
    public function getADeviner() {
        return $this->aDeviner;
    }
    
    public function generer_hasard() {
        $value = rand(0, 100);
        return $value;
    }
}
