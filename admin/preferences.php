<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Panel Admin</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/main.css">

</head>
<body>
        <?php 
    
    session_start();
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        ?> 
    
     <?php
    
    include('./connection.php');
    
    if(isset($_POST['mail'])){
        
        $req = $bdd->prepare('UPDATE users SET mail=:mail WHERE id=:id');
            $req->execute(array(
            'mail' => $_POST['mail'],
	       'id' => 1
	       ));   
    }
    
    if(isset($_POST['currentPassword']) && isset($_POST['password_1']) && isset($_POST['password_2']) && $_POST['password_1']==$_POST['password_2']){
        
        $query = 'SELECT password FROM users WHERE id=1';
        $reponse = $bdd->query($query);


        while ($donnees = $reponse->fetch())
        {
            $pass = $donnees['password'];
        }
        
        if(md5($_POST['currentPassword'])==$pass){
            
            $req = $bdd->prepare('UPDATE users SET password=:pass WHERE id=:id');
            $req->execute(array(
            'pass' => md5($_POST['currentPassword']),
	       'id' => 1
	       ));
            
        }

$reponse->closeCursor(); 
        
        
    }
    

$query = 'SELECT * FROM users WHERE id=1';
$reponse = $bdd->query($query);


while ($donnees = $reponse->fetch())
{
    $user = $donnees['user'];
    $pass = $donnees['password'];
    $mail = $donnees['mail'];

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
          <li><a href="menus.php"><i class="fa fa-users"></i>Menu</a></li>
          <li  class="active"><a href="preferences.php"><i class="fa fa-cog"></i>Preferences</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Deconnexion</a></li>
        </ul>
      </div>

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">

          <h1>Preferences</h1>
          <p class="margin-bottom-15">Préférence Utilisateur</p>
          <div class="row">
            <div class="col-md-12">
              <form role="form" id="templatemo-preferences-form" action="#" method="get">

                <div class="row">
                    <h3>Changer de mot de passe</h3>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="currentPassword">Mot de passe actuel</label>
                    <input type="password" class="form-control" name="currentPassword" placeholder="Mot de passe actuel" >  
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="password_1">Nouveau Mot de Passe</label>
                    <input type="password" class="form-control" name="password_1" placeholder="Nouveau Mot de Passe">  
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="password_2">Confirmer le Nouveau Mot de Passe</label>
                    <input type="password" class="form-control" name="password_2" placeholder="Confirmer le Nouveau Mot de Passe">  
                  </div>
                </div>
                  
                  <hr>
                  <div class="row">
                    <h3>Changer d'adresse mail</h3>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="currentPassword">Adresse mail</label>
                    <input type="text" class="form-control" name="mail" value="<?php echo $mail; ?>" >  
                  </div>
                </div>
                  <br>
                  <hr>
                  <br>
                  <input type="submit" value="Envoyer" class="btn btn-default"/>
                  <input type="reset" value="Reset" class="btn btn-default"/>
                  
            </form>
          </div>
        </div>
      </div>
    </div>

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
      <?php } 
    else {
        
        header ('location: sign-in.php');
    }
    ?>
</body>
</html>