<?php

class verficateur {
    
var $motdico;

    public function verificateur () {
        $dico = new dictionnaire;
        
        $this->motdico = $dico->get_mot();
        
        
    }
    
   function verif_lettre($Smot) 
     {
     $motSoumis = str_split($Smot);
     $motdico = str_split("soctadi");
        
    $badletter = array_diff($motdico,$motSoumis);
    $goodletter = array_intersect_assoc($motdico,$motSoumis);
      $notin = array('-','-','-','-','-','-','-');        

		var_dump(array_replace($notin,$badletter,$goodletter));
		
		/*  $array = ($notin = $badletter = $goodletter);
        $array = ($notin += $badletter+= $goodletter);
var_dump($array);*/

       
        
    }
         
        
       
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
