<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Panel Admin</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/main.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <script src="./js/jquery.bootstrap-growl.min.js"></script>


</head>
<body>
    
    
    
    
    <?php
    
    include('./connection.php');
    

    
    if(isset($_POST['password']) && isset($_POST['username'])){
        
        
        $query = 'SELECT password, user FROM users WHERE id=1';
        $reponse = $bdd->query($query);


        while ($donnees = $reponse->fetch())
        {
            $pass = $donnees['password'];
            $user = $donnees['user'];
        }
        
        if(md5($_POST['password'])==$pass && $_POST['username']==$user){
            
            
        session_start();
		$_SESSION['user'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];

		// on redirige notre visiteur vers une page de notre section membre
		echo "<script> window.location.replace('index.php') </script>";
        }
        else {
            ?>
    
     <script type="text/javascript">

            $(function() {
               
                
                setTimeout(function() {
                    $.bootstrapGrowl("Mauvais Mot de Passe ou Identifiant", {
                        type: 'danger',
                        align: 'center',
                        width: '400'
                    });
                });
                
            
            });

        </script>

    
    <?php
        }
        

$reponse->closeCursor(); 
        
        
    }    
    
?>
    
    
    
    
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>Panel Admin</h1></div>
      </div>   
    </div>
    <div class="template-page-wrapper">
      <form class="form-horizontal templatemo-signin-form" role="form" action="#" method="post">
        <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">Identifiant</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
          </div>              
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="password" class="col-sm-2 control-label">Mot de Passe</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" value="Connexion" class="btn btn-default">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>