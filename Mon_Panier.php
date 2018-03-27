<!DOCTYPE html >
<html>
	<header> 
		<title> Mon Panier </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="General.css">
	</header>
	<body>
		<?php 
			include('Common/Connexion.php');
		?>
		
		<table id="form_billet">
		
			<?php 


			echo("<TR>" . "<TD> Billet </TD> " . "<TD> Prénom du possesseur </TD> " ." <TD> montant </TD> ". "</TR>");
			
			$q="SELECT id_billet, prenom_possesseur, montant_tarif FROM Billet B INNER JOIN Tarif T on B.id_tarif=T.id_tarif WHERE id_client IN (SELECT MAX(id_client) FROM Billet) ";
			$billets=$bdd->query($q);
			foreach ($billets as $billet)
			echo("<TR>"."<TD>".$billet['id_billet'] . " </TD>" . " <TD>". $billet['prenom_possesseur'] . " </TD> " . "<TD>" . $billet['montant_tarif'] . "</TD>" . "<TD> " . "€" ."</TD></TR>" );
			?>
	
		</table>
		<?php
		echo(" la somme de vos achats s'élèvent à ");
				
				$q="SELECT SUM(montant_tarif) as total from Billet B INNER JOIN Tarif T on B.id_tarif=T.id_tarif WHERE id_client IN (SELECT MAX(id_client) FROM Billet)";
				$billets=$bdd->query($q);
				foreach($billets as $billet)
				echo($billet["total"]. " €");
		?>
		
		<p> vous pouvez retourner à la page d'accueil en cliquant <a href="accueil.php" > ici </a></p>
	</body>
</html>