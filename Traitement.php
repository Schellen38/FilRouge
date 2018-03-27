<!DOCTYPE html>
<html>
<header>
	<meta charset="UTF-8">
	<Title> Traitement </Title>
	<link rel="stylesheet" href="General.css">
	
</header>
<body>
		<?php		
	// connexion à la bdd
		include('Common/Connexion.php');
	
			
	
			
	// 		traitement des données du formulaire
	// 		on commence par préparer la base de données à reçevoir les données du form 
		if (null !==($_POST['nom'])){
		$nom=$_POST["nom"];
		}

		if (null !==($_POST['prenom'] )){
		$prenom=$_POST["prenom"];
		}
		
		if (null !==($_POST['datenaiss'] )){
		$datenaiss=$_POST["datenaiss"];
		}
		
		if (null !==($_POST['codepostal'] )){
		$codepostal=$_POST["codepostal"];
		}
		
		if (null !==($_POST['ville'] )){
		$ville=$_POST["ville"];
		}
		
		if (null !==($_POST['numtel'] )){
		$tel=$_POST["numtel"];
		}
	
		if (null !==($_POST['sexe'] )){
		$sexe=$_POST["sexe"];
		}
		
		if (null !==($_POST['mail'] )){
		$email=$_POST["mail"];
		}
	
		
		if(isset($nom)&& isset($prenom)	&& isset($datenaiss) && isset($codepostal) && isset($ville) && isset($tel) && isset($sexe) && isset($email))
	{	
		$req = $bdd->prepare('INSERT INTO Client ( nom_client, prenom_client, date_naiss_client, cp_client, ville_client, telephone_client, type_client, email )
		VALUES(:nom,:prenom,:datenaiss,:codepostal,:ville,:numtel,:sexe, :mail)');
		
	// 	puis on les intègres à la bdd
		$req->execute(array(
			'nom'=>$nom,
			'prenom'=>$prenom,
			'datenaiss'=>$datenaiss,
			'codepostal'=>$codepostal,
			'ville'=>$ville,
			'numtel'=>$tel,
			'sexe'=>$sexe,
			'mail'=>$email
			
		));	
		}
	?>
	
<!-- 	on affiche le tableau avec les tarifs dont la valeur est indéxée directement sur la base de donée grâce aux requêtes sql suivantes -->
<?php include('Common/tab_tarif.php') ?>

<p> Vous pouvez maintenant prendre un billet </p>
	
	<form method="post" action="traitement_billet.php" class="form" id="billet">
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
		
		</form>

	
</body>