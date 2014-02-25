<?php
require_once 'vue.class.php';
require_once 'class.verificateur.php';

class controller {
    
var $tab_mot = array();
var $vue;

public function controller () {
     $this->vue = new vue();
     if(isset($_SESSION['mot'])){
         $this->tab_mot=$_SESSION['mot'];
     }
}

private function check ($mot) {
       $verificateur = new verificateur();
       
           if($verificateur->verif_lettre($mot)) {
               $this->vue->run = 1;
               session_destroy();
           }
           else {
            $verif =  $verificateur->verif_lettre($mot);
               $this->tab_mot = $verif;
           }
       
}      
    public function run (){
            session_start();
        
            if(isset($_POST['nom'])) {
             
         $this->check($_POST['nom']);
         $_SESSION['mot'] = $this->check($_POST['nom']);
         $this->vue->tab_mot = $this->tab_mot;
         $this->vue->affiche();
        }else{
            
           $this->vue->tab_mot = array();
            $this->vue->affiche();
          
          
       }
        
      
        
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
