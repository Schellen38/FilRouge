<!DOTCYPE html >
<html>
	<header> 
		<title> Prise de billets </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="General.css">
	</header>
	<body>
		<?php 
			include('Common/Connexion.php');
			
			
// 	on cherche l'identifiant du dernier client enregistré
			$reponse = $bdd->query('SELECT id_client FROM Client ORDER BY id_client DESC LIMIT 1');
 
			while ($donnees = $reponse->fetch())
			{
			$id_client = $donnees['id_client'] ;
			}
			$reponse->closeCursor();
			
// 			puis on récupère les informations saisies dans le formulaire 
			if (ISSET($_POST['possesseur_billet'])){
			$pb = $_POST['possesseur_billet'];
			}
			if (isset($_POST['tarif'])){
			$tarif = $_POST['tarif'];
			}
			
			if(isset($id_client) && isset($pb) && isset($tarif)){
			$req = $bdd->prepare('INSERT INTO Billet ( id_tarif, id_client, prenom_possesseur) VALUES (:id_tarif,:id_client, :possesseur_billet)');
			
			$req->execute(array(
				'id_tarif'=>$tarif,
				'id_client'=> $id_client,
				'possesseur_billet'=>$pb
			));
			}
			else echo("erreur");
		?>
		
		
		
		<p> vous pouvez prendre un autre billet ou consulter votre panier  </p>
		
<!-- 		on affiche le tableau des tarif -->
	<?php include('Common/tab_tarif.php')?>
	
	
			<form method="post" action="traitement_billet.php" class="form" id="billet" >
		<p><label>Quel est le nom du possesseur du billet? </label> <input type="text" name="possesseur_billet" id="textfield"></p>
				<?php $query = $bdd->prepare("SELECT * FROM Tarif");
			$query->execute();
			$tarif = $query->fetchAll();?>
		<label> sélectionner le tarif </label>
				<select name='tarif'>
				<?php if($tarif): ?>
		 <?php foreach($tarif as $t):?> 
			<option value = "<?= $t['id_tarif'] ?>" name="tarif"><?= $t['libelle_tarif'] ?></option>
		 <?php endforeach; ?>
	 <?endif; ?>
		<p><input type="submit" value ="valider"></p>
		
		<p> <a href="Mon_Panier.php"> Mon Panier </a></p>
	</body>