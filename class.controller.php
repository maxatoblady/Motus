<?php
require_once 'vue.class.php';
require_once 'class.verificateur.php';

class controller {
    
var $tab_mot;
var $vue;

public function controller () {
     $this->vue = new vue();
     
  if(!isset($_SESSION['mot'])){
           session_start();
          //$_SESSION['mot'] = array();
          //$this->vue->tab_mot = array();
  }
}

private function check($mot) {
       $verificateur = new verificateur();
       $verif = $verificateur->verif_lettre($mot);
 
           if($verif == 1) {
              $this->vue->run = 1;
              $message = "Le mot soumis '".$_POST['nom']."' est le bon le mot :\n".$_SESSION['dico']."'";
             
           }
           else {
             return $verif;
                
           }
       
}      
    public function run (){
           
         $motS = $_POST['nom'];
          
            if(isset($motS)) {
                var_dump($motS);
    
     
     
       $_SESSION['mot'][] = $this->check($motS);
        $this->vue->tab_mot[] = $_SESSION['mot'];
       
        }else{ 
           $this->vue->tab_mot = array();
       }
        
     $this->vue->affiche();
       
        //session_destroy();
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
