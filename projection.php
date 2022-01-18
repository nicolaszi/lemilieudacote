<!doctype html>

<?php include 'tri_projections.php';?>
                                 
<html>
	<head>
		<title>Les Projections | Le milieu d'à coté</title>
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
        
        <div class="container-green">
            <div class="middle-width">
                    <h3 class="projections-header">
                        PROJECTIONS A VENIR
                    
                        <ul class="nav nav-pills projections-tab">
                            <li class="active"><a data-toggle="pill" href="#date">PAR DATE</a></li>
                            <li><a data-toggle="pill" href="#region">PAR RÉGION</a></li>
                        </ul>  
                    </h3>  
                
                <div class="tab-content">
                    <div id="date" class="tab-pane fade in active white-text">
                        <?php 
                        foreach ($projectionsNext as $k => $v) { ?>
                        <div class="row">
                            <div class="col-md-4 text-center"> <?php echo $k; ?> </div>
                            <div class="col-md-8">
                                <?php foreach($v as $projection){ ?>
                                    <p class="date-projection"> <?php echo $projection->projection ?> </p>
                                    <p class="info-projection">
                                        <strong><?php echo $projection->nom ?></strong> <br>
                                        <?php echo $projection->adresse . ', ' . $projection->zipcode . ' ' . $projection->ville ?> <br>
                                        <a class="white-link" href="<?php echo $projection->lien ?>">en savoir plus</a>
                                    </p>
                                <?php } ?>
                                
                            </div>    
                        </div>
                        <?php } ?>        
                    </div>
                        
                           
                
                    <div id="region" class="tab-pane fade white-text">
                        <?php 
                        foreach ($projectionsRegion as $k => $v) { ?>
                        <div class="row">
                            <div class="col-md-4 text-center"> <?php echo $k; ?> </div>
                            <div class="col-md-8">
                                <?php foreach($v as $projection){ ?>
                                    <p class="date-projection"> <?php echo $projection->projection ?> </p>
                                    <p class="info-projection">
                                        <?php echo $projection->nom ?> <br>
                                        <?php echo $projection->adresse . ', ' . $projection->zipcode . ' ' . $projection->ville ?> <br>
                                        <a class="white-link" href="<?php echo $projection->lien ?>">en savoir plus</a>
                                    </p>
                                <?php } ?>
                                
                            </div>    
                        </div>
                        <?php } ?>      
                    </div>
                
                </div>
                

                <p class="contact-text text-center">SOYEZ DIRECTEMENT INFORMÉ DES PROCHAINES PROJECTIONS</p>
                <div class="text-center">
                    <form action="projection.php" method="POST">
                        <input  id="main" name="email" type="email" placeholder="email" class="my-input" required>
                        <input  id="submit" type="submit" name="valider" value="ENVOYER">
                   </form>
                    
                    <?php
                    if(isset($_POST['valider'])){
                            
                        $data= [
                            'email_address' => $_POST['email'],
                            'status'        => 'subscribed'
                        ];
                        
                        //$ch = curl_init('https://us15.api.mailchimp.com/3.0/lists/08c6cbd60b/members');
 
                        
                        $curl = curl_init();
                        
                        curl_setopt_array(
                            $curl,
                            [
                                CURLOPT_URL => 'http://us15.api.mailchimp.com/3.0/lists/08c6cbd60b/members',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_HTTPHEADER => [
                                    'Content-Type: application/json', 
                                    'Authorization: apikey 48e6dc070d72925c254ce82ec2e3d26a-us15'
                                ],
                                CURLOPT_POST => true,
                                CURLOPT_POSTFIELDS => json_encode($data)
                            ]
                        );
                        
                        $response = curl_exec($curl);
                        
                        curl_close($curl);
                        
                        $newUser = json_decode($response);
                        
                        if(isset($newUser->email_address)){
                            echo "<p class='text-success msg-erreur'> Votre adresse email a bien été enregistrée.</p>";
                            
                            $mail = 'cyril@holiprod.com';
				            $passage_ligne = "\r\n";
				            $boundary = "-----=".md5(rand());
						
                            $sujet = "Nouvel utilisateur sur la mailing liste";
						
                            $header = "From: " . $nom . $passage_ligne;
                            $header.= "Reply-to: \"RETOUR\" <" . $email . ">".$passage_ligne;
                            $header.= "MIME-Version: 1.0".$passage_ligne; 
                            $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne . "boundary=\"$boundary\"".$passage_ligne;
						
				            $message_html = '
										 <html>
										  <head>
										   <title>Nouvelle Demande</title>
										  </head>
										  <body>
										   <p>Une nouvelle personne vient de s\'inscrire sur la mailing liste</p>
										  </body>
										 </html>
										 ';
						
                            $message = $passage_ligne."--".$boundary.$passage_ligne;
                            $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
                            $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                            $message.= $passage_ligne.$message_html.$passage_ligne;
                            $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
                            
                            mail($mail,$sujet,$message,$header);
                            
                        } else if ($newUser->title == "Member Exists") {
                            echo "<p class='text-danger msg-erreur'>Cette adresse email est déjà éxistante</p>";
                        } else if ($newUser->title == "Invalid Resource") {
                            echo "<p class='text-danger msg-erreur'>L'email saisie semble fausse ou invalide. Merci de saisir une vraie adresse email</p>";
                        }
                        
                    }
                    ?>
                </div>
            </div>
        </div>
        
        
        
        <div class="container projections text-center">
           <p class="text-center">PROJECTIONS PASSÉES</p>
            <ul class="middle-width projections-old">
            <?php for($i=0 ; $i < count($projectionsOld) ; $i++) { ?>
                <li class="content-projection">
                    <strong><?php echo $projectionsOld[$i]->nom ?></strong> <br>
                    <?php echo $projectionsOld[$i]->ville . ' ' . $projectionsOld[$i]->zipcode ?> <br>
                    <a href="<?php echo $projectionsOld[$i]->lien ?>">en savoir plus</a>
                </li> 
            <?php } ?>
            </ul>           
        </div>
              
    </body>
</html>

