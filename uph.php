<?php 
require'config/database.php';
if (isset($_POST['picture'])) {
    extract($_POST);
$id_eleves = htmlspecialchars($_POST['id_eleves']);
    
    $fileName = $_FILES['file']['name'];
     $fileTmpName = $_FILES['file']['tmp_name'];
       
       $path = "prof/".$fileName;

  $req=$db->prepare("UPDATE eleves SET photo=:photo WHERE id_eleves=:id_eleves ");

  $res=$req->execute(array(

	'id_eleves' => $id_eleves,
    'photo' => $fileName,

    
  ));
  if ($res) {
	move_uploaded_file($fileTmpName,$path);
    header("location:eleves.php");
  }else{
    header("location:eleves.php");
  }
  }





 ?>
