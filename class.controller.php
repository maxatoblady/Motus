<?php
require_once 'vue.class.php';
require_once 'class.verificateur.php';

class controller {
    
var $tab_mot = array();
var $vue;

public function controller () {
     $this->vue = new vue();
     
    if(isset($_SESSION['mot'])){
         $this->tab_mot.=$_SESSION['mot'];
     }
}

private function check($mot) {
       $verificateur = new verificateur();
       $verif = $verificateur->verif_lettre($mot);
 
           if($verif === 0) {
               //$this->vue->run = 1;
              // session_destroy();
           }
           else {
             $this->tab_mot[] = $verif;
                
           }
       
}      
    public function run (){
            session_start();
         $motS = $_POST['nom'];
         
            if(isset($motS)) {
                
         $verifMot = $this->check($motS);
        //var_dump($this->check($motS));
         $_SESSION['mot'] .= $verifMot; 
      
         $this->vue->tab_mot[] = $this->tab_mot;
       

       // var_dump($_SESSION['mot']);
        }else{ 
           $this->vue->tab_mot = array();
       }
        
      $this->vue->affiche();
        
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
