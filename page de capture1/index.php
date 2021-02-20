<?php

    $serveur = "localhost";
    $dbname = "pagedecapture";
    $user = "root";
    $pass = "";
    $email = 'null';
    if(isset($_POST['email'])) {
    	$email = $_POST['email']; 
    }
    
    
    

	try{
		$db = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			  
	    //On insère les données reçues
	    $sth = $db->prepare("INSERT INTO user (email) VALUES(:email)");
		$sth->bindParam(':email',$email);
		$sth->execute(); 
		//On renvoie l'utilisateur vers la page de remerciement
		        
	}catch(PDOException $e){
	    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
	}
    
?>

  
<!-- <?php
	// include "database.php";
	// if (isset($_POST['formsend'])) {
	// 	$mail = htmlspecialchars($_POST['mail']);
	// 	if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
	//		
	// 		$reqmail = $bdd->prepare("SELECT * FROM user WHERE Email =?");
	// 		$reqmail ->execute(array($mail));
	// 		$mailexist =$reqmail->rowCount();
	// 		//if ($mailexist == 0) {
	// 		//	$insertmbr = $bdd->prepare("INSERT INTO user email VALUES ?");
	// 			$insertmbr->execute(array($mail));
	// 			$$_SESSION['comptecree'] = "Votre livre sera envoyé par email";
	// 		}else{
	// 			$erreur = "Adresse mail déjà utilisé!";
	// 		}
	// 	}
	// }
?> -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>10 recettes minceurs</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">
</head>
<body>
	<div id="arriereplan">

		<div class="entete" id="banner1"> 
			<h1>Livre Gratuit</h1>
		</div>

		<div class="">
			<p></p>		
		</div>

		<div id = "title">
			<h4>10 recettes minceurs</h4>	
		</div>

		<div class="image" id="img" alt = "livre">
			<img src="image.png">
		</div>

		<div class="texte descriptif" id="description">
			<p>Je vous offre un ebook contenant 10 recettes minceur testées et approuvées par tous les spécialistes. Simples et super consistants, ces plats permettent aux gourmand(es)  de perdre du poids tout en se régalant !</p>
			<p></p>
			<p></p>
		</div>

		<div class="popup" id="popup-1">
		    <div class="overlay"></div>
		    <div class="content">
		    	<form method="post" action="">
			    	<br/>
			        <button name="formsend" id="formsend" onclick="togglePopup()">envoyer</button>
			       	<div id="question">
				        <h1>Vous y ête presque</h1>
				    
				       	<input type="email" name="email" required = "email" placeholder="Votre email">
				    </div>
				    <br/>
				    <label style="width : 200px"><input type="checkbox" name="condictions" value="J'accepte de recevoir des mails" checked="J'accepte de recevoir des mails" onclick="event.preventDefault()">J'accepte de recevoir des mails</label>
			    </form >
			    <?php 
					if (isset($erreur)) {
						echo '<font color = "white">'.$erreur."</font>";
					}
				?>	
		    </div>
	    </div>
	    <button onclick="togglePopup()">Je veux bénificier du livre</button>
	    <script type="text/javascript" charset="utf-8" src="Code.js"></script>
	</div>
</body>
</html>

