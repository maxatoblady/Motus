<?php
class dictionnaire
{
	public function get_mot()
	{
		$fichier=file('liste_motus.txt');
		$count=substr_count($fichier, '\n');
		$rand=rand(1,$count);
		$mot=$fichier[$rand];
	}
}
?>
