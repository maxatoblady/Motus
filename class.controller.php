<?php
session_start();
require_once 'vue.class.php';
//require_once 'class.verificateur.php';   Illisible !
require_once 'verif.class.php';
require_once 'class_dictionnaire.php';

class controller {   

  var $vue;

  public function controller () {   // Constructeur
  
    $this->vue = new vue();

    if(isset($_SESSION['mot'])){       
      if (isset($_POST['mot'])){
        $this->jouer();
      }
    } else {                             // Si pas de session alors on en crée une            
      $_SESSION['tab_mot'] = array();    // Initialisation à vide du tableau
      $dico = new dictionnaire();
      $_SESSION['mot'] = $dico->get_mot();      // On demande un mot au dico parcequ'il est gentil !
    }
    $this->vue->tab_mot = $_SESSION['tab_mot'];

    $this->perdu();  // on verifie si on a perdu 
    
    $this->vue->affiche();

    
  }

  private function jouer(){

    $verif = new Verificateur();

    if ($verif->motvalide($_POST["mot"])) {           // Si le mot est valide 
      if (strtoupper($_POST["mot"])==strtoupper($_SESSION['mot'])) {
        unset($_SESSION['mot']);                     // On detruit le mot en "memoire"
        $this->vue->run=1;
      } else {
        $indice = $verif->indices($_POST["mot"],$_SESSION['mot']);
        $tab = $_SESSION['tab_mot'];
        $tab[] = $indice;
        $_SESSION['tab_mot'] = $tab;   // On enlève les accents et on affiche uniquement les indices
      }    

    }else {                                       
      echo "<font color=red>Mot invalide !! Le mot doit contenir 7 lettres.</font>";
    }  
  }

  private function perdu(){
    if (!$this->vue->run && sizeof($this->vue->tab_mot)>=5) {
      $this->vue->run = 1;
      echo "<p>Le mot &eacute;tait : ".$_SESSION['mot']."</p>";      // faudrais le passer a la vue ...
      unset($_SESSION['mot']); 
    }


  }


  
}
