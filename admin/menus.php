<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Panel Admin</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script src="js/modernizr.custom.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>
    
    
    <?php 
    
    session_start();
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        ?>
    
    <?php

  include('./connection.php');

$query = 'SELECT * FROM entree ORDER BY Position ASC';
$reponse = $bdd->query($query);
$entree = array();
$entree_id = array();
$entree_pos = array();

while ($donnees = $reponse->fetch())
{
    $entree[] = $donnees['Description'];
    $entree_id[] = $donnees['id'];
    $entree_pos[] = $donnees['Position'];

}

$reponse->closeCursor(); 
    
$query = 'SELECT * FROM viandes ORDER BY Position ASC';
$reponse = $bdd->query($query);
$viandes = array();
$viandes_id = array();
$viandes_pos = array();

while ($donnees = $reponse->fetch())
{
    $viandes[] = $donnees['Description'];
    $viandes_id[] = $donnees['id'];
    $viandes_pos[] = $donnees['Position'];

}

$reponse->closeCursor(); 
        
$query = 'SELECT * FROM poissons ORDER BY Position ASC';
$reponse = $bdd->query($query);
$poissons = array();
$poissons_id = array();
$poissons_pos = array();

while ($donnees = $reponse->fetch())
{
    $poissons[] = $donnees['Description'];
    $poissons_id[] = $donnees['id'];
    $poissons_pos[] = $donnees['Position'];

}

$reponse->closeCursor(); 
    
$query = 'SELECT * FROM desserts ORDER BY Position ASC';
$reponse = $bdd->query($query);
$desserts = array();
$desserts_id = array();
$dessert_pos = array();

while ($donnees = $reponse->fetch())
{
    $desserts[] = $donnees['Description'];
    $desserts_id[] = $donnees['id'];
    $desserts_pos[] = $donnees['Position'];

}

$reponse->closeCursor(); 

    
    
?>
    
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>Panel Admin</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>
    <div class="template-page-wrapper">
<div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">

          <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
          <li class="active"><a href="menus.php"><i class="fa fa-users"></i>Menu</a></li>
          <li><a href="preferences.php"><i class="fa fa-cog"></i>Preferences</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Deconnexion</a></li>
        </ul>
      </div>

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">

          <h1>Gérer le Menu</h1>


          <div class="row">
            <div class="col-md-12">

             
              <div class="table-responsive">
                <h4 class="margin-bottom-15">Entrées</h4>
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Libéllé</th>
               
                      <th>Edit</th>
                      <th>Position</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                      <?php 
                      
                      for($i=0; $i<sizeof($entree); $i++) { ?>
                      
                      <tr>
                      <td><?php echo $i+1; ?></td>
                      <td><?php echo $entree[$i]; ?></td>

                      <td><a href="#" onclick="supr('<?php echo str_replace("'", "\'", $entree[$i]); ?>', '<?php echo $entree_id[$i]; ?>', 'entree')" data-modal="popup" class="btn btn-default popup-button">Edit</a></td>     
                                         
                          
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Position</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <?php if($i+1!=1) {  ?><li><a href="./fonction.php?table=entree&querry=up&id=<?php echo $entree_id[$i] ?>&pos=<?php echo $entree_pos[$i] ?>">Monter</a></li><?php } ?>
                            <?php if($i+1!= sizeof($entree)) {  ?><li><a href="./fonction.php?table=entree&querry=down&id=<?php echo $entree_id[$i] ?>&pos=<?php echo $entree_pos[$i] ?>">Descendre</a></li><?php } ?>
                          </ul>
                        </div>
                      </td>
                      <td><a href="./fonction.php?table=entree&querry=delete&id=<?php echo $entree_id[$i] ?>" class="btn btn-link">Supprimer</a></td>
                    </tr>
                      
                      <?php } ?>
                      <tr>
                          <td>+</td>
                          <td>
                            <form action="./fonction.php" method="get">
                                <input type="text" name="new" size=100%/> 
                                <input name="querry" value="add" hidden/>
                                <input name="pos" value="<?php echo sizeof($entree_pos)+1; ?>" hidden/>
                                <input name="table" value="entree" hidden/>
                                
                              
                          </td>
                          <td>
                              <input type="submit" value="Ajouter" class="btn btn-default" />
                          </td>
                          </form>
                    <td></td>
                    <td></td>
                      </tr>
        
                  </tbody>
                </table>
              </div>  
                
                
                              <div class="table-responsive">
                <h4 class="margin-bottom-15">Poissons</h4>
               <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Libéllé</th>
               
                      <th>Edit</th>
                      <th>Position</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                      <?php 
                      
                      for($i=0; $i<sizeof($poissons); $i++) { ?>
                      
                      <tr>
                      <td><?php echo $i+1; ?></td>
                      <td><?php echo $poissons[$i]; ?></td>

                      <td><a href="#" onclick="supr('<?php echo str_replace("'", "\'", $poissons[$i]); ?>', '<?php echo $poissons_id[$i]; ?>', 'poissons')" data-modal="popup" class="btn btn-default popup-button">Edit</a></td>     
                                         
                          
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Position</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <?php if($i+1!=1) {  ?><li><a href="./fonction.php?table=poissons&querry=up&id=<?php echo $poissons_id[$i] ?>&pos=<?php echo $poissons_pos[$i] ?>">Monter</a></li><?php } ?>
                            <?php if($i+1!= sizeof($poissons)) {  ?><li><a href="./fonction.php?table=poissons&querry=down&id=<?php echo $poissons_id[$i] ?>&pos=<?php echo $poissons_pos[$i] ?>">Descendre</a></li><?php } ?>
                          </ul>
                        </div>
                      </td>
                      <td><a href="./fonction.php?table=poissons&querry=delete&id=<?php echo $poissons_id[$i] ?>" class="btn btn-link">Supprimer</a></td>
                    </tr>
                      
                      <?php } ?>
                      <tr>
                          <td>+</td>
                          <td>
                            <form action="./fonction.php" method="get">
                                <input type="text" name="new" size=100%/> 
                                <input name="querry" value="add" hidden/>
                                <input name="pos" value="<?php echo sizeof($poissons_pos)+1; ?>" hidden/>
                                <input name="table" value="poissons" hidden/>
                                
                              
                          </td>
                          <td>
                              <input type="submit" value="Ajouter" class="btn btn-default" />
                          </td>
                          </form>
                    <td></td>
                    <td></td>
                      </tr>
        
                  </tbody>
                </table>
              </div> 
        
        
        
        
        <div class="table-responsive">
                <h4 class="margin-bottom-15">Viandes</h4>
               <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Libéllé</th>
               
                      <th>Edit</th>
                      <th>Position</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                      <?php 
                      
                      for($i=0; $i<sizeof($viandes); $i++) { ?>
                      
                      <tr>
                      <td><?php echo $i+1; ?></td>
                      <td><?php echo $viandes[$i]; ?></td>

                      <td><a href="#" onclick="supr('<?php echo str_replace("'", "\'", $viandes[$i]); ?>', '<?php echo $viandes_id[$i]; ?>', 'viandes')" data-modal="popup" class="btn btn-default popup-button">Edit</a></td>     
                                         
                          
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Position</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <?php if($i+1!=1) {  ?><li><a href="./fonction.php?table=viandes&querry=up&id=<?php echo $viandes_id[$i] ?>&pos=<?php echo $viandes_pos[$i] ?>">Monter</a></li><?php } ?>
                            <?php if($i+1!= sizeof($viandes)) {  ?><li><a href="./fonction.php?table=viandes&querry=down&id=<?php echo $viandes_id[$i] ?>&pos=<?php echo $viandes_pos[$i] ?>">Descendre</a></li><?php } ?>
                          </ul>
                        </div>
                      </td>
                      <td><a href="./fonction.php?table=viandes&querry=delete&id=<?php echo $viandes_id[$i] ?>" class="btn btn-link">Supprimer</a></td>
                    </tr>
                      
                      <?php } ?>
                      <tr>
                          <td>+</td>
                          <td>
                            <form action="./fonction.php" method="get">
                                <input type="text" name="new" size=100%/> 
                                <input name="querry" value="add" hidden/>
                                <input name="pos" value="<?php echo sizeof($viandes_pos)+1; ?>" hidden/>
                                <input name="table" value="viandes" hidden/>
                                
                              
                          </td>
                          <td>
                              <input type="submit" value="Ajouter" class="btn btn-default" />
                          </td>
                          </form>
                    <td></td>
                    <td></td>
                      </tr>
        
                  </tbody>
                </table>
              </div> 
                
                
                
                
                              <div class="table-responsive">
                <h4 class="margin-bottom-15">Desserts</h4>
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Libéllé</th>
               
                      <th>Edit</th>
                      <th>Position</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                      <?php 
                      
                      for($i=0; $i<sizeof($desserts); $i++) { ?>
                      
                      <tr>
                      <td><?php echo $i+1; ?></td>
                      <td><?php echo $desserts[$i]; ?></td>

                      <td><a href="#" onclick="supr('<?php echo str_replace("'", "\'", $desserts[$i]); ?>', '<?php echo $desserts_id[$i]; ?>', 'desserts')" data-modal="popup" class="btn btn-default popup-button">Edit</a></td>     
                                         
                          
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Position</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <?php if($i+1!=1) {  ?><li><a href="./fonction.php?table=desserts&querry=up&id=<?php echo $desserts_id[$i] ?>&pos=<?php echo $desserts_pos[$i] ?>">Monter</a></li><?php } ?>
                            <?php if($i+1!= sizeof($desserts)) {  ?><li><a href="./fonction.php?table=desserts&querry=down&id=<?php echo $desserts_id[$i] ?>&pos=<?php echo $desserts_pos[$i] ?>">Descendre</a></li><?php } ?>
                          </ul>
                        </div>
                      </td>
                      <td><a href="./fonction.php?table=desserts&querry=delete&id=<?php echo $desserts_id[$i] ?>" class="btn btn-link">Supprimer</a></td>
                    </tr>
                      
                      <?php } ?>
                      <tr>
                          <td>+</td>
                          <td>
                            <form action="./fonction.php" method="get">
                                <input type="text" name="new" size=100%/> 
                                <input name="querry" value="add" hidden/>
                                <input name="pos" value="<?php echo sizeof($desserts_pos)+1; ?>" hidden/>
                                <input name="table" value="desserts" hidden/>
                                
                              
                          </td>
                          <td>
                              <input type="submit" value="Ajouter" class="btn btn-default" />
                          </td>
                          </form>
                    <td></td>
                    <td></td>
                      </tr>
        
                  </tbody>
                </table>
              </div>               
            </div>
          </div>
        </div>
      </div>
        
        
                    
            <div class="modal-popup blur-effect" id="popup">
                <div class="popup-content">
                    <div>
                        <form action="./fonction.php" method="get" > 
                        <input class="input" type="text" name="label" value=""/>
                        <input name="querry" value="update" hidden/>
                        <input name="id" value="" hidden/>
                        <input name="table" value="" hidden/>
                        <input type="submit" class="btn-info input" value="Valider" />
                        </form>
                        <div class="popup close"></div>
                    </div>
                </div>
            </div> 
        <div class="overlay"></div>
        
        
        

      <!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Êtes vous sur de vouloir vous deconnecter ?</h4>
            </div>
            <div class="modal-footer">
              <a href="logout.php" class="btn btn-primary">Oui</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
            </div>
          </div>
        </div>
      </div>

      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>Copyright &copy; 2016 SARL MARVAN</p>
        </div>
      </footer>
    </div>
</div>
    

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    

    <!-- Le script qui crée la popup -->
		<script src="js/popup.js"></script>

		<!-- Pour l'effet blur -->
		<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="js/cssParser.js"></script>
		<script src="js/css-filters-polyfill.js"></script>
    
    
    
      <?php } 
    else {
        
        header ('location: sign-in.php');
    }
    ?>
 
  </body>
</html>