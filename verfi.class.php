<?php

class Verificateur
{
	/*
	* 	Fonction qui vérifie si le mot donnée est valide 
	*	[En partant du principe que si l'utilisateur ecrit autre chose qu'un mot de 7 lettres minimum, c'est qu'il a pas envis de jouer.]
	*/

	function motvalide($mot)
	{
		$mot = htmlentities($mot);
		if (sizeof($mot)>7) {
			return false;
		} else {
			return true;
		}

	}
	/*
	*	Fonction qui supprime les accents
	*	Pompée sur le premier site google : http://www.commentcamarche.net/faq/8063-supprimer-les-accents-avec-php
	*	
	*/
	function suppr_accents($string)
	{
		return strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
	}
	/*
	* Fonction qui retourne les Indices du genre : P i - - - - S
	*
	*/

	function indices($motpost,$bonmot)
	{
		$motpost = strtoupper($this->suppr_accents($mot));
		$bonmot = strtoupper($bonmot);
		$mot = "-------";

		for ($ii=0; $ii < 8 ; $ii++) { 			// On parcourt les deux mot le bon et celui proposé
			if ($motpost[$ii]==$bonmot[$ii]){	// Si la lettre n° ii des deux mot sont identique  
				$mot[$ii]=$motpost[$ii];		// la lettre ii du mot retourné est donc remplacé (MAJUSCULE)
			} else {
				for ($jj=0; $jj < 8; $jj++) { 	// Sinon on reboucle sur tout le mot a trouver pour voir si n'est pas quelquepart 
					if ($motpost[$ii]==$bonmot[$jj]){
						$mot[$ii]=strtolower($motpost[$ii]);  // Oh bah il est là ... aller je t'ajoute mais en minuscule :3
					} // sinon bah on fait rien car j'ai initialiser mon string a -------
				}								  
			}
		}

		return $mot;
	}
}

?>