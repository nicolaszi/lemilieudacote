<div id="navigation" class="top-nav">
    <div class="top-list">
        <p class="logo-left"><img src="assets/img/menu_pict-1.png" alt="menu_pict-1"></p>
        <p class="logo-left"><img src="assets/img/menu_pict-2.png" alt="menu_pict-2"></p>
        <p class="text-center"><a class="ancre-intro" href="#intro">-- Le milieu d'à côté --</a></p>
        <p class="logo-right"><img src="assets/img/menu_pict-3.png" alt="menu_pict-3"></p>
        <p class="logo-right"><img src="assets/img/menu_pict-4.png" alt="menu_pict_4"></p>
   </div>  
</div>

<nav class="navbar navbar-default container-grey">
    <div class="container"> 
        
            <ul class="nav navbar-nav">
                <li <?php echo($page == 'accueil') ? "class='active'" : ""; ?>><a href="index.php#navigation">Accueil <span class="sr-only">(current)</span></a></li>
                <li <?php echo($page == 'projection') ? "class='active dropdown'" : "dropdown"; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Voir le film <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="projection.php">Les projections</a></li>
                        <!--<li><a href="organiser_projection.php">Organiser une projection</a></li>-->
                        <li><a href="dvd.php">Le DVD</a></li>
                    </ul>
                </li>
                <li <?php echo ($page == 'film') ? "class='active'" : ""; ?>><a href="film.php">Aller plus loin</a></li>
                <li <?php echo ($page == 'contact') ? "class='active'" : ""; ?> ><a href="contact.php">Contacts</a></li>
            </ul>
        
    </div>
</nav>