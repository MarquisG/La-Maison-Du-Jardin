<!DOCTYPE html>
<html lang="en">
<head>
    <title>La Maison Du Jardin</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>

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
                        <li class="active">
                            <a href="./menu">Menu</a>
                        </li>
                        <li>
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
                <h2><em>Notre</em>Menu</h2>

                <div class="menu">
                    
                    <h3>Entrée, plat et dessert 35,00 €</h3>
                    <h3>Entrée, plat ou plat, dessert 29,20 € </h3><br>
                    <h3>Nos formules déjeuner : </h3>
                    <h3>Plat et un verre de vin 25,50 € </h3>
                    <h3>Entrée-plat ou plat-dessert 22,00 € </h3>
                    <h3> + verre de vin ou bouteille d’eau (33 cl) et café 26,00 €</h3>
                    <h3>(plats à choisir sur la petite ardoise pour l’ensemble de la table) </h3>
                        
                    <div class="bloc">
                    <h3>Entrées</h3>
                        <ul>
                            <?php
                            $query = 'SELECT * FROM entree ORDER BY Position ASC';
                            $reponse = $bdd->query($query);

                            while ($donnees = $reponse->fetch())
                            {
                                echo '<li>'.$donnees['Description'].'</li>';
                            }

                            $reponse->closeCursor(); 
                            ?>
                        </ul>
                    </div>
                        
                    <div class="bloc">
                    <h3>Poissons</h3>
                        <ul>
                            <?php
                            $query = 'SELECT * FROM poissons ORDER BY Position ASC';
                            $reponse = $bdd->query($query);
                            
                            while ($donnees = $reponse->fetch())
                            {
                                echo '<li>'.$donnees['Description'].'</li>';

                            }
                            
                            $reponse->closeCursor(); 
                            ?>
                        </ul>
                    </div>
                    
                    <div class="bloc">
                    <h3>Viandes</h3>
                        <ul>
                            <?php
                            $query = 'SELECT * FROM viandes ORDER BY Position ASC';
                            $reponse = $bdd->query($query);
                            
                            while ($donnees = $reponse->fetch())
                            {
                                echo '<li>'.$donnees['Description'].'</li>';

                            }
                            
                            $reponse->closeCursor(); 
                            ?>
                        </ul>
                    </div>
                        
                    <div class="bloc">
                    <h3>Desserts</h3>
                        <ul>
                            <?php
                            $query = 'SELECT * FROM desserts ORDER BY Position ASC';
                            $reponse = $bdd->query($query);

                            while ($donnees = $reponse->fetch())
                            {
                                echo '<li>'.$donnees['Description'].'</li>';

                            }

                            $reponse->closeCursor();
                            ?>
                        </ul>
                    </div>     
                </div>
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
</html>