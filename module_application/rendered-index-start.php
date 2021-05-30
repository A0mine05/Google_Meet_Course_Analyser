<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Analyse de Meet</title>
    
    <script src="https://use.typekit.net/kxf0iwn.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

    <link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    <!-- Navigation Menu -->
    <header>
      <a class="site-logo">
          <img src="images/Google_meet.svg.png">
      </a>
        <nav class="site-nav">
            <ul>
				<li><a href="#">Page d'accueil</a></li>
				<li><a href="#">Aller sur le site de l'universite</a></li>
				<li><a href="#">Contactez-nous</a></li>
			</ul>	
        </nav>
    </header>

	<?php
						$servername = 'localhost';
						$username = 'root';
						$password='';
						$database= 'google_meet';
					  	$conn = mysqli_connect($servername,$username,$password,$database);
					  
					  $requete= "Select * from classe";
            $requete_mat = "Select * from matiere";
					  
					  $resultat = mysqli_query($conn,$requete);
            $resultat_mat = mysqli_query($conn,$requete_mat);
					  ?>
    <!-- Main Content -->
    <main>
        <!-- Hero -->
        <section class="hero">
        	<div class="hero-content">
				<img src="images/ " alt="">
                <p>
                  <h2>Apprenons depuis la maison</h2>
                </p>
				<h1>Analyse de Meet</h1>
				<h3>Avril 2020 &#45; Avril 2021</h3>
            </div>
        </section>

        <!-- Intro -->
        <section class="intro">
        <div class="intro-text">
                <p>Bienvenue sur notre plateforme qui vous permettra d'avoir les statistiques des séances faites sur Google Meet</p>
            </div>
        </section>

        <!-- Artwork -->
        <section class="artworks">
            <article class="artwork">
                <div class="artwork-piece">
                    <figure>
                    	<img src="images/goldrush.jpg">
                    </figure>
                </div>
                <div class="artwork-description">
                <h2>Choisir la Matiere</h2>
                		<select class="form-control " >
          <?php
							while($row = mysqli_fetch_assoc($resultat_mat))
					  {?>
						  <option  >
						<?php
					   echo $row['intitule'];
						?>
						</option>
					 <?php } ?>
					</select>
					<h2>Choisir la classe</h2>
                    <select class="form-control " >
          <?php
							while($row = mysqli_fetch_assoc($resultat))
					  {?>
						  <option  >
						<?php
					   echo $row['nomClasse'];
						?>
						</option>
					 <?php } ?>
					</select>
                        <br>
                     
                        <br>
                        <a href ="affichage.php"> Suivant </a>
                </div>
            </article>
        </section>
    </main>

    <!-- Site Footer (hidden for lesson) -->
    <footer>
    <!--<div class="footer-content">
            <ul class="footer-social">
                <li>
                    <a href="#">
                        <img class="social-default" src="images/social-facebook.png">
                        <img class="social-hover" src="images/social-facebook-hover.png">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="social-default" src="images/social-pinterest.png">
                        <img class="social-hover" src="images/social-pinterest-hover.png">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="social-default" 	src="images/social-twitter.png">
                        <img class="social-hover" src="images/social-twitter-hover.png">
                    </a>
                </li>
            </ul>
            <div class="footer-info">
                <p class="footer-credit">Website design by <a href="#">Serge Vasil</a></p>
                <p class="footer-disclaimer">Any reference to associated logos is for demonstration purposes only and is not intended to refer to any actual organization or event.</p>
                <p class="footer-legal">&copy; 2016 Adobe Systems Incorporated. All rights reserved.</p>
            </div>
        </div>-->
    </footer>
    
</body>
</html>
