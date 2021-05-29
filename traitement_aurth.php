<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>
	
<body>
<?php
	
	$servername = 'localhost';
	$username = 'root';
	$password='';
	$database= 'google_meet';

	$email = $_GET['email'];
	$mdp = $_GET['mdp'];
	$conn = mysqli_connect($servername,$username,$password,$database); 
	
	$query = "SELECT * FROM USER WHERE email ='$email' and mdp='$mdp' ";
	$result = mysqli_query($conn,$query);
	$row = mysqli_num_rows($result);
	//echo $row;

	if(!empty($_REQUEST['email']) && !empty($_REQUEST['mdp']) )
		{
			if($row)
			{
				header( 'Location: Selection_classe_Mat.html' ) ;
				if ($conn -> connect_error)
				{
					die('Erreur : ' .$conn->connect_error);
				}
			}
			else
			{
				echo "Les identifiants ne son pas corrects";
			}
		}

		else
		{
			echo'Veuillez Renseigner les donnees';
		}
	
		

		
	// $email = $_GET['email'];
	//   $email = mysqli_connect($conn, $email);
	//   $_SESSION['exampleInputEmail'] = $email;
    // $mdp = $_GET['mdp'];
	//   $mdp = mysqli_connect($conn, $mdp);
	//	$query = "SELECT * FROM USER WHERE email ='$email' and mdp='$mdp' ";
	 // 	
		//  echo $row;
		
		  
		//if(mysql_num_rows($result))
		  
		//	echo"OK" ;
		  
		  
		//   or die(mysql_error());
	//  ".hash('sha256', $mdp)."'
	  	// header( 'Location: C:\wamp64\www\Projet_Google\index.html' ) ;
		// echo"Le nom d'utilisateur ou le mot de passe est incorrect" ;
	//}
	//}

	
?>
	
</body>
</html>