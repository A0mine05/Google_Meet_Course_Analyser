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
					  
					  $requete= "Select * from formulaire";
            
					  
					  $resultat = mysqli_query($conn,$requete);
          
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
                <p>Voici les statistiques pour la matiere que vous avez choisi</p>
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
                <h3>Voici Les notes de seances :
                		
          <?php
							while($row = mysqli_fetch_assoc($resultat))
					  {?>
						
						<?php
					   echo $row['score'];
						?>
					
					 <?php } ?>
					
                     </h3>	
               
                </div>
            </article>
        </section>
    </main>

   
    
</body>
</html>
