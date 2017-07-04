<!DOCTYPE html>
<html lang="en">
<head>
    <title>La Maison Du Jardin</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact-form.css">


    <!--[if lt IE 9]>
    <html class="lt-ie9">
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a> 
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
 
    <script src='js/device.min.js'></script> 
</head>
    
<?php
  include('./connection.php');
?>

<body>
<div class="page">
    <!--========================================================
                              HEADER
    =========================================================-->
    <header>

        <div id="stuck_container" class="stuck_container">
            <div class="container">

                <div class="brand">
                    <h1 class="brand_name">
                        <a href="./">La Maison Du Jardin</a>
                    </h1>
                </div>

                <nav class="nav">
                    <ul class="sf-menu">
                        <li>
                            <a href="./">Accueil</a>
                        </li>
                        <li>
                            <a href="./restaurant">Le Restaurant</a>
                        </li>
                        <li>
                            <a href="./equipe">L'Equipe</a>
                        </li>
                        <li>
                            <a href="./menu">Menu</a>
                        </li>
                        <li class="active">
                            <a href="./contact">Reservation</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        
        

    </header>
    <!--========================================================
                              CONTENT
    =========================================================-->
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <h2><em>Reserver</em>Une table</h2>

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10502.091073671263!2d2.331434!3d48.848241!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4122ebe09a444c88!2sLa+Maison+du+Jardin!5e0!3m2!1sfr!2smx!4v1499145725603" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                <div class="menu">
                <?php
                    $query = 'SELECT * FROM conge';
                    $reponse = $bdd->query($query);

                    while ($donnees = $reponse->fetch())
                    {
                        $active = $donnees['activate'];
                        $display = $donnees['display'];                    
                        $start_date = $donnees['start_date'];
                        $end_date = $donnees['end_date'];
                        $single_date = $donnees['single_date'];
                        $description = $donnees['description'];


                    }
                    $reponse->closeCursor(); 
                
                    if($active) {
                    ?>
                    <h2><?php echo $description ?></h2>
                    <?php if($single_date) { ?>
                    <h2 style="margin-top: 50px;"><?php echo date_format(date_create($start_date),"d/m/Y") ?></h2>
                    <?php } 
                        else { ?>
                    <h2 style="margin-top: 50px;"><?php echo date_format(date_create($start_date),"d/m/Y") ?>&rarr;<?php echo date_format(date_create($end_date),"d/m/Y") ?></h2>
                    <?php } } ?>
                    <?php if($display) { ?>
                    <h2>La Maison du Jardin</h2>
                    <h3>27 Rue de Vaugirard Paris 06</h3>
                    <h3>Métro 12 Rennes</h3>
                    <h3>Métro 6 Saint-Placide</h3>
                    <h3>Bus 58 & 89</h3>
                    <br>
                    <h3>
                    Lundi	12:15–14:00, 19:15–22:00<br><br>
                    Mardi	12:15–14:00, 19:15–22:00<br><br>
                    Mercredi	12:15–14:00, 19:15–22:00<br><br>
                    Jeudi	12:15–14:00, 19:15–22:00<br><br>
                    Vendredi	12:15–14:00, 19:15–22:00<br><br>
                    Samedi	19:15–22:00<br><br>
                    Dimanche	Fermé
                    </h3>
                    <?php } ?>
                    <h2 style="
    margin-top: 50px;
">01 45 48 22 31</h2>
                    <h3><a href="mailto:contact@restaurant-lamaisondujardin.fr">contact@restaurant-lamaisondujardin.fr</a></h3>
                                   
            </div>
                
        </section>
    </main>
    <!--========================================================
                              FOOTER
    =========================================================-->
    <footer>
        <div class="container">
            <ul class="socials">
                <li><a href="#" class="fa fa-facebook"></a></li>
            </ul>
            <div class="copyright">
                <p>Copyright &copy; 2016 SARL MARVAN</p>
            </div>
        </div>
    </footer>
</div>

<script src="js/script.js"></script>
</body>
</html>3>