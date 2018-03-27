<table id="tab_tarif">
			<tr>
				<td> tarif Adulte </td>
				<td> tarif Enfant </td>
			</tr>
			<tr>
				<td> <?php  
				$q="SELECT montant_tarif FROM Tarif WHERE id_tarif = 1";
				$tarifs=$bdd->query($q);
				foreach ($tarifs as $tarif)
				echo($tarif['montant_tarif'] . " €");
							
				
			?>  </td>
				<td> <?php
				$q="SELECT montant_tarif FROM Tarif WHERE id_tarif = 2";
				$tarifs=$bdd->query($q);
				foreach ($tarifs as $tarif)
				echo($tarif['montant_tarif'] . " €");?> </td>
			</tr>
</table>