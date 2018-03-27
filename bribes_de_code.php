	<tr>
				<td>
					<?php 
						echo("<TR>" . "<TD> identifiant </TD> " . "<TD> libellé </TD> " ." <TD> montant </TD> ". "</TR>");	
						$q= "SELECT * FROM Tarif";
						$res = $bdd->query($q);
						foreach ($res as $l)
						echo("<TR> <TD>". $l['id_tarif'] . "</TD>" . "<TD>" . $l['libelle_tarif'] . "</TD>" . "<TD>" . $l['montant_tarif'] . "</TD> </TR>");
					?>
				</td>
			</table>
			
			<form method="post" action="Traitement.php" id="form_billet">
				<label> selectionner le tarif </label>
				<select name='tarif'>
				<?php if($tarif): ?>
		 <?php foreach($tarif as $t):?> 
			<option value = "<?= $t['id_tarif'] ?>"><?= $t['libelle_tarif'] ?></option>
		 <?php endforeach; ?>
	 <?endif; ?>
				</select>