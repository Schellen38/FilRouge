	<?php try
		{
		$bdd= new pdo('mysql:host=localhost;dbname=filrouge_essai;charset=utf8','root','root');
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	?>