<?php

	class vue($tab_mot,$mot) {


		public function affiche(){
			if (sizeof($this->tab_mot) <= 5 ){
				$contenu = "Tours n°".(sizeof($this->tab_mot)+1)+"<br>";
				$contenu = "<table>";

				foreach ($this->tab_mot as $mot){
					$contenu .= "<tr>";
					for ($ii=0; $ii < 6; $ii++) { 
						$contenu .= "<td>".$mot[$ii]."</td>";
					}
					$contenu .= "</tr>";
				}

				$contenu = "</table>";
				$contenu .= $this->pied();
			}

			return $contenu;
		}

		private function pied($run){
			if ($run) {
				return "";
			} else {
				return "";
			}
		}


	}		

?>