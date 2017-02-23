<?php


include('./connection.php');


if(isset($_GET['table']) && isset($_GET['querry'])) {
    
    switch($_GET['table']) {
            
        case "desserts":
    
    if($_GET['querry']=='delete') {
    
      $req = $bdd->prepare('DELETE FROM desserts WHERE id=:id');
    $req->execute(array(
	'id' => $_GET['id']
	));
    
    header("Location: ./menus.php"); 
    }
    
    elseif($_GET['querry']=='update') {
        
        if(isset($_GET['label'])) {
            
            $req = $bdd->prepare('UPDATE desserts SET Description=:label WHERE id=:id');
            $req->execute(array(
            'label' => $_GET['label'],
	       'id' => $_GET['id']
	       ));
            header("Location: ./menus.php"); 
           
        }
    }
            
    elseif($_GET['querry']=='add') {
        
        if(isset($_GET['new']) && isset($_GET['pos'])) {
            
            $req = $bdd->prepare('INSERT INTO desserts(Description, Position) VALUES (:label, :pos)');
            $req->execute(array(
            'label' => $_GET['new'],
            'pos' => $_GET['pos']+1
	       ));
            header("Location: ./menus.php"); 
           
        }       
        
    }
    elseif($_GET['querry']=='up') {
        
        if(isset($_GET['pos'])) {
            
            $pos = $_GET['pos']-1;
            
            
            $req = $bdd->prepare('UPDATE desserts SET Position=:pos WHERE Position=:oldpos');
            $req->execute(array(
            'pos' => $_GET['pos'],
	       'oldpos' => $pos
	       ));
            
            
            $req = $bdd->prepare('UPDATE desserts SET Position=:pos WHERE id=:id');
            $req->execute(array(
            'pos' => $pos,
	       'id' => $_GET['id']
	       ));
            
            header("Location: ./menus.php"); 
           
        }
        
    }
    elseif($_GET['querry']=='down') {
        
        if(isset($_GET['pos'])) {
            
            $pos = $_GET['pos']+1;
            
            
            $req = $bdd->prepare('UPDATE desserts SET Position=:pos WHERE Position=:oldpos');
            $req->execute(array(
            'pos' => $_GET['pos'],
	       'oldpos' => $pos
	       ));
            
            
            $req = $bdd->prepare('UPDATE desserts SET Position=:pos WHERE id=:id');
            $req->execute(array(
            'pos' => $pos,
	       'id' => $_GET['id']
	       ));
            
            header("Location: ./menus.php"); 
           
        }
        
    }
            
            break;
            
        case "entree":
            
    if($_GET['querry']=='delete') {
    
      $req = $bdd->prepare('DELETE FROM entree WHERE id=:id');
    $req->execute(array(
	'id' => $_GET['id']
	));
    
    header("Location: ./menus.php"); 
    }
    
    elseif($_GET['querry']=='update') {
        
        if(isset($_GET['label'])) {
            
            $req = $bdd->prepare('UPDATE entree SET Description=:label WHERE id=:id');
            $req->execute(array(
            'label' => $_GET['label'],
	       'id' => $_GET['id']
	       ));
            header("Location: ./menus.php"); 
           
        }
    }   
            
    elseif($_GET['querry']=='add') {
        
        if(isset($_GET['new']) && isset($_GET['pos'])) {
            
            $req = $bdd->prepare('INSERT INTO entree(Description, Position) VALUES (:label, :pos)');
            $req->execute(array(
            'label' => $_GET['new'],
            'pos' => $_GET['pos']
	       ));
            header("Location: ./menus.php"); 
           
        }       
        
    } 
    elseif($_GET['querry']=='up') {
        
        if(isset($_GET['pos'])) {
            
            $pos = $_GET['pos']-1;
            
            
            $req = $bdd->prepare('UPDATE entree SET Position=:pos WHERE Position=:oldpos');
            $req->execute(array(
            'pos' => $_GET['pos'],
	       'oldpos' => $pos
	       ));
            
            
            $req = $bdd->prepare('UPDATE entree SET Position=:pos WHERE id=:id');
            $req->execute(array(
            'pos' => $pos,
	       'id' => $_GET['id']
	       ));
            
            header("Location: ./menus.php"); 
           
        }
        
    }
    elseif($_GET['querry']=='down') {
        
        if(isset($_GET['pos'])) {
            
            $pos = $_GET['pos']+1;
            
            
            $req = $bdd->prepare('UPDATE entree SET Position=:pos WHERE Position=:oldpos');
            $req->execute(array(
            'pos' => $_GET['pos'],
	       'oldpos' => $pos
	       ));
            
            
            $req = $bdd->prepare('UPDATE entree SET Position=:pos WHERE id=:id');
            $req->execute(array(
            'pos' => $pos,
	       'id' => $_GET['id']
	       ));
            
            header("Location: ./menus.php"); 
           
        }
        
    }
            break;
            
        case "poissons":
            
    if($_GET['querry']=='delete') {
    
      $req = $bdd->prepare('DELETE FROM poissons WHERE id=:id');
    $req->execute(array(
	'id' => $_GET['id']
	));
    
    header("Location: ./menus.php"); 
    }
    
    elseif($_GET['querry']=='update') {
        
        if(isset($_GET['label'])) {
            
            $req = $bdd->prepare('UPDATE poissons SET Description=:label WHERE id=:id');
            $req->execute(array(
            'label' => $_GET['label'],
	       'id' => $_GET['id']
	       ));
            header("Location: ./menus.php"); 
           
        }
    }  
            
    elseif($_GET['querry']=='add') {
        
        if(isset($_GET['new']) && isset($_GET['pos'])) {
            
            $req = $bdd->prepare('INSERT INTO poissons(Description, Position) VALUES (:label, :pos)');
            $req->execute(array(
            'label' => $_GET['new'],
            'pos' => $_GET['pos']+1
	       ));
            header("Location: ./menus.php"); 
           
        }       
        
    }
    elseif($_GET['querry']=='up') {
        
        if(isset($_GET['pos'])) {
            
            $pos = $_GET['pos']-1;
            
            
            $req = $bdd->prepare('UPDATE poissons SET Position=:pos WHERE Position=:oldpos');
            $req->execute(array(
            'pos' => $_GET['pos'],
	       'oldpos' => $pos
	       ));
            
            
            $req = $bdd->prepare('UPDATE poissons SET Position=:pos WHERE id=:id');
            $req->execute(array(
            'pos' => $pos,
	       'id' => $_GET['id']
	       ));
            
            header("Location: ./menus.php"); 
           
        }
        
    }   
    elseif($_GET['querry']=='down') {
        
        if(isset($_GET['pos'])) {
            
            $pos = $_GET['pos']+1;
            
            
            $req = $bdd->prepare('UPDATE poissons SET Position=:pos WHERE Position=:oldpos');
            $req->execute(array(
            'pos' => $_GET['pos'],
	       'oldpos' => $pos
	       ));
            
            
            $req = $bdd->prepare('UPDATE poissons SET Position=:pos WHERE id=:id');
            $req->execute(array(
            'pos' => $pos,
	       'id' => $_GET['id']
	       ));
            
            header("Location: ./menus.php"); 
           
        }
        
    }
            
            break;
            
    case "viandes":
            
    if($_GET['querry']=='delete') {
    
      $req = $bdd->prepare('DELETE FROM viandes WHERE id=:id');
    $req->execute(array(
	'id' => $_GET['id']
	));
    
    header("Location: ./menus.php"); 
    }
    
    elseif($_GET['querry']=='update') {
        
        if(isset($_GET['label'])) {
            
            $req = $bdd->prepare('UPDATE viandes SET Description=:label WHERE id=:id');
            $req->execute(array(
            'label' => $_GET['label'],
	       'id' => $_GET['id']
	       ));
            header("Location: ./menus.php"); 
           
        }
    }  
            
    elseif($_GET['querry']=='add') {
        
        if(isset($_GET['new']) && isset($_GET['pos'])) {
            
            $req = $bdd->prepare('INSERT INTO viandes(Description, Position) VALUES (:label, :pos)');
            $req->execute(array(
            'label' => $_GET['new'],
            'pos' => $_GET['pos']+1
	       ));
            header("Location: ./menus.php"); 
           
        }       
        
    }
    elseif($_GET['querry']=='up') {
        
        if(isset($_GET['pos'])) {
            
            $pos = $_GET['pos']-1;
            
            
            $req = $bdd->prepare('UPDATE viandes SET Position=:pos WHERE Position=:oldpos');
            $req->execute(array(
            'pos' => $_GET['pos'],
	       'oldpos' => $pos
	       ));
            
            
            $req = $bdd->prepare('UPDATE viandes SET Position=:pos WHERE id=:id');
            $req->execute(array(
            'pos' => $pos,
	       'id' => $_GET['id']
	       ));
            
            header("Location: ./menus.php"); 
           
        }
        
    }   
    elseif($_GET['querry']=='down') {
        
        if(isset($_GET['pos'])) {
            
            $pos = $_GET['pos']+1;
            
            
            $req = $bdd->prepare('UPDATE viandes SET Position=:pos WHERE Position=:oldpos');
            $req->execute(array(
            'pos' => $_GET['pos'],
	       'oldpos' => $pos
	       ));
            
            
            $req = $bdd->prepare('UPDATE viandes SET Position=:pos WHERE id=:id');
            $req->execute(array(
            'pos' => $pos,
	       'id' => $_GET['id']
	       ));
            
            header("Location: ./menus.php"); 
           
        }
        
    }
            
            break;
            
    }

}


?>