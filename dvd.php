<!doctype html>

<html>
	<head>
		<title>Le DVD | Le milieu d'à coté</title>
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
        
        <div class="container">
            <div class="main text-center">
                <img src="assets/img/dvd_jacquette.png" alt="jacquette_dvd">
                <div class="first text-center">
                    <strong>Vous pouvez commander le DVD <br> du film Le milieu d'à côté au prix de 14.00€ <br> (frais de port compris)</strong>
                   
                    <ul class="liste-paiement">
                        <li>
                            - Par Carte Bleue (via paypal) <br>
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="4ZV6958XV9QAQ">
                                <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                                <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                            </form>

                        </li>
                        <li>
                            - Par Chèque <br>
                            Merci de bien vouloir remplir <a href="assets/file/form_DVD.pdf">ce formulaire</a>
                        </li>
                    </ul>
                   
                </div>
            </div>
            <div>
                <p class="text-center">Attention : L'achat du DVD ne vous permet pas d'organiser une projection. <!--Dans ce cas, <a href="organiser_projection.php">cliquer ici</a>--></p>
            </div>
        </div>
    </body>
</html>