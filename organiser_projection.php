<!doctype html>

<html>
	<head>
		<title>Organiser une projection</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
        <script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
	</head>

	<body>

        <?php 
        $page = 'projection'; 
        include 'menu.php'; 
        ?>
        
        <div class="container main">
            <div class="row text-center">
                <p class="col-md-12"><img src="assets/img/organiser-projo_img-1.jpg" alt="img_projection"></p>
                
            </div>
            <div class="container-main-text">
                <div class="main-text">
                    <h2>ORGANISER UNE PROJECTION</h2>
                    <p class="first">
                        <strong>Le milieu d'à coté, documentaire (56minutes)</strong><br>
                        Un film sur l'insertion par le travail de personnes en situation de handicap mental
                    </p>
                    <p>
                        Chacun connaît l'existence du handicap. Certains le vivent de près ou de loin, tandis que d'autres traversent leur vie sans y être confronté. Aujourd'hui en France, des milliers de personnes en situation de handicap travaillent tous les jours. Pour ce faire, une grande partie des travailleurs ayant des handicaps mentaux ou psychiques, est accueillie dans des ESAT, lieux de travail protégés. En questionnant notre rapport à l'insertion par le travail, ce film nous donne l'opportunité de nous plonger dans le quotidien de personnes handicapées, de partager un moment de leur vie, sur leurs lieux de travail ou de loisir. Loin des évènements et du sensationnel, des personnes se racontent et se donnent à voir, faisant tomber les préjugés.
                    </p>
                </div>
                
            </div>
        </div>
        
        <div class="container-green">
            <div class="middle-width">
                <p class="contact-text">PRENDRE CONTACT POUR L'ORGANISATION DE VOTRE PROJECTION</p>
                <div class="text-center">
                    <form action="projection.php" method="POST">
                        <input  id="main" name="email" type="email" placeholder="email" class="my-input" required>
                        <input  id="submit" type="submit" name="valider" value="ENVOYER">
                   </form>
                </div>
            </div>
              
        </div>
    </body>
</html>