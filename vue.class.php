<?php

	class vue {

		var $tab_mot;   // Array de mot de 7 lettres
		var $run;		// Boolen 0 : jeu en cours , 1 : jeu gagné	

		public function affiche(){
			
			$contenu = "";
			if (is_array($this->tab_mot) && sizeof($this->tab_mot) <= 5 ){

				$contenu = "<center>";
				$contenu .= $this->statut()."<table>";

				foreach ($this->tab_mot as $mot){
					$contenu .= "<tr>";					
					
					for ($ii=0; $ii < 6; $ii++) { 
						$contenu .= "<td>".$mot[$ii]."</td>";
					}
					$contenu .= "</tr>";
				}

				$contenu .= "</table></center>";
				$contenu .= $this->pied();

			}

			echo $contenu;
		}

		private function pied(){
			
			if ($this->run) {
				$html = '<form action="#" method="post"><p><input type="submit" value="Rejouer"></p>';				
			} else {
				$html = '<form action="#" method="post"><p><input type="text" name="nom" /><input type="submit" value="Jouer"></p>';
			}		

			return $html;
		}

		private function statut(){
			if (!$this->run && sizeof($this->tab_mot)==5) {
				return "<h1>Perdu !</h1>";
			}
			if ($this->run) {
				return "<h1>Tu veux une medaille ?</h1>";
			}
			return "<h3>Tours ".(sizeof($this->tab_mot)+1)."<br></h3>";
		}
	}		
?>
