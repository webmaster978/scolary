<?php require "config/database.php" ?>
<?php 
if (isset($_POST['submit'])) {
    extract($_POST);
    $ref_inscription = htmlspecialchars($_POST['ref_inscription']);
    $filename = $_POST['filename'];
	
    $fileName = $_FILES['file']['name'];
     $fileTmpName = $_FILES['file']['tmp_name'];
       
       $path = "docs/".$fileName;

            $check_query = "SELECT * FROM dossiers 
            WHERE filename=:filename
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
           
             ':filename'   =>  $filename            
          );
           if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 1)
             {
                echo "
               err
                ";             
            }
        
          else
            {
            if ($statement->rowCount() == 0 ) {

				
  
 

  $req=$db->prepare("INSERT INTO dossiers (filename,ref_inscription,ref_agent) VALUES (:filename,:ref_inscription,:ref_agent)");

  $res=$req->execute(array(
    'ref_inscription' => $ref_inscription,    
    'filename' => $fileName,
    'ref_agent' => $_SESSION['PROFILE']['id_utilisateur']
    
    
    
  ));
  if ($res) {
	move_uploaded_file($fileTmpName,$path);
     echo "
    validate
     ";
  }else{
      echo "non inserer";
  }
  }
  }
  }
}



 ?>