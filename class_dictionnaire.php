<?php
class dictionnaire
{
	public function get_mot()
	{
		$fichier=file('liste_motus.txt');
		//var_dump($fichier);
		//$count=substr_count($fichier,'\n');
		$count=count($fichier); 
		$rand=rand(0,$count-1);
		$mot=$fichier[$rand];

		return $mot;
	}
}
?>
