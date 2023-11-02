
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php include 'part/_menu.php' ?>
       <?php $reque=$db->query("SELECT * FROM payement"); ?>
       <?php $rep=$db->query("SELECT * FROM payement"); ?>


       <?php 
if (isset($_POST['submit'])) {
    extract($_POST);
    $nom_complet = htmlspecialchars($_POST['nom_complet']);
	$sexe = htmlspecialchars($_POST['sexe']);
	$lieu_naiss = htmlspecialchars($_POST['lieu_naiss']);
	$date_naiss = htmlspecialchars($_POST['date_naiss']);
    $responsable = htmlspecialchars($_POST['responsable']);
    $contact = htmlspecialchars($_POST['contact']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $ref_annee = htmlspecialchars($_POST['ref_annee']);
    $ref_classe = htmlspecialchars($_POST['ref_classe']);
    $montant = htmlspecialchars($_POST['montant']);
    $ref_option = htmlspecialchars($_POST['ref_option']);
    
    $fileName = $_FILES['file']['name'];
     $fileTmpName = $_FILES['file']['tmp_name'];
       
       $path = "prof/".$fileName;

            $check_query = "SELECT * FROM eleves 
            WHERE nom_complet=:nom_complet
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
           
             ':nom_complet'   =>  $nom_complet            
          );
           if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 1)
             {
                echo "
                <script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Cet eleve existe deja!',
                         footer: ''
                          })
                  </script>
                ";             
            }
        
          else
            {
            if ($statement->rowCount() == 0 ) {

				
  
 

  $req=$db->prepare("INSERT INTO eleves (nom_complet,sexe,lieu_naiss,date_naiss,responsable,contact,photo,adresse,ref_annee,ref_classe,montant,ref_option) VALUES (:nom_complet,:sexe,:lieu_naiss,:date_naiss,:responsable,:contact,:photo,:adresse,:ref_annee,:ref_classe,:montant,:ref_option)");

  $res=$req->execute(array(
    'nom_complet' => $nom_complet,
    'sexe'=> $sexe,
    'lieu_naiss' => $lieu_naiss,
    'date_naiss' => $date_naiss,
    'responsable' => $responsable,
	'adresse' => $adresse,
    'photo' => $fileName,
    'contact' => $contact,
    'ref_annee' => $ref_annee,
    'ref_classe' => $ref_classe,
    'montant' => $montant,
    'ref_option' => $ref_option
    
    
  ));
  if ($res) {
	move_uploaded_file($fileTmpName,$path);
     echo "
     <script>
     Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Eleve inserer avec success',
      showConfirmButton: false,
      timer: 1500
    })
     </script>
     ";
  }else{
      echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Eleve non inserer!',
                         footer: ''
                          })
                  </script>";
  }
  }
  }
  }
}



 ?>


<?php 

if (isset($_POST['modif'])) {
    extract($_POST);
    $nom_complet = htmlspecialchars($_POST['nom_complet']);
	$sexe = htmlspecialchars($_POST['sexe']);
	$lieu_naiss = htmlspecialchars($_POST['lieu_naiss']);
	$date_naiss = htmlspecialchars($_POST['date_naiss']);
    $responsable = htmlspecialchars($_POST['responsable']);
    $contact = htmlspecialchars($_POST['contact']);
    $adresse = htmlspecialchars($_POST['adresse']);
    
    $ref_classe = htmlspecialchars($_POST['ref_classe']);
    $montant = htmlspecialchars($_POST['montant']);
    $ref_option = htmlspecialchars($_POST['ref_option']);
    $id_eleves = htmlspecialchars($_POST['id_eleves']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);


    $mo=$db->prepare("UPDATE eleves SET nom_complet=:nom_complet,sexe=:sexe,lieu_naiss=:lieu_naiss,date_naiss=:date_naiss,responsable=:responsable,contact=:contact,adresse=:adresse,ref_classe=:ref_classe,montant=:montant,ref_option=:ref_option,email=:email,password=:password WHERE id_eleves=:id_eleves");

    $mo->execute(array(
        'nom_complet' => $nom_complet,
    'sexe'=> $sexe,
    'lieu_naiss' => $lieu_naiss,
    'date_naiss' => $date_naiss,
    'responsable' => $responsable,
	'adresse' => $adresse,
    
    'contact' => $contact,
    
    'ref_classe' => $ref_classe,
    'montant' => $montant,
    'ref_option' => $ref_option,
    'id_eleves' => $id_eleves,
    'email' => $email,
    'password' => $password
    ));

    


}


?>



<?php 

if (isset($_POST['del'])) {
    extract($_POST);

    $id_eleves = htmlspecialchars($_POST['id_eleves']);



    $det=$db->prepare("DELETE FROM eleves WHERE id_eleves=:id_eleves");

    $det->execute(array(

    'id_eleves' => $id_eleves

    ));

    


}


?>






        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php include 'part/_side.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Liste des eleves</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Eleves</h6>
                           
                        <div class="col" align="right">
                          <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i></button>
                                    
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                            <th>num</th>
                                            <th>nom_complet</th>
                                            <th>Sexe</th>
                                            <th>Lieu naissance</th>
                                            <th>Date naissance</th>
                                            <th>Responsable</th>
                                            <th>Adresse</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php $requete=$db->query("SELECT * FROM eleves INNER JOIN classe ON eleves.ref_classe=classe.id_classe INNER JOIN options ON eleves.ref_option=options.id_option"); ?>
                                    <?php while ($g = $requete->fetch()) { ?>
                                           
                                        <div class="modal fade bs-ex<?= $g['id_eleves']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modifier l'eleve <?= $g['nom_complet'];?> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">

                        <input type="hidden" name="id_eleves" value="<?= $g['id_eleves'];?>">
                          
                          <div class="row">
                            <div class="col-md-12">                            
                               <input class="form-control" name="nom_complet" type="text" value="<?= $g['nom_complet'];?>" placeholder="Nomcomplet">
                              </div>
                        </div>
                          <br>
                        <div class="row">
                              <div class="col-md-6">
                            <label for="">Sexe</label>
                               <select class="form-control" name="sexe">
                               
                                <option value="<?= $g['sexe'];?>"><?= $g['sexe'];?></option>
                                <option value="masculin">Masculin</option>
                                <option value="Feminin">Feminin</option>
                               </select>
                              </div>
                              <div class="col-md-6">
                                <label for="">Lieu de naissance</label>
                                 <input class="form-control" type="text" name="lieu_naiss" value="<?= $g['lieu_naiss'];?>">
                              </div>
                              
                          </div>
                          <br>
                          <div class="row">
                            
                              <div class="col-md-6">
                                <label for="">Date de naissance</label>
                               <input class="form-control" name="date_naiss" type="date" value="<?= $g['date_naiss'];?>" placeholder="Date naissance">
                              </div>
                              <div class="col-md-6"> 
                                <label for="">Montant d'inscription</label>    
                                <select class="form-control" name="montant" id="">
                                    <option value="<?= $g['montant'];?>"><?= $g['montant'];?> $</option>
                                    
                                    <?php while ($gg = $reque->fetch()) {
                                         $ss= $gg['id_classe'];
                                         $te = "";
                                         if($ss == '1'){ 
                                            $te="<span>ere</span>";
                                         } else {
                                             $te="<span>eme</span>";
                                         }
                                        
                                        ?>
                                <option value="<?= $gg['montant'];?>"><?= $gg['id_classe'];?> <?php echo $te; ?> - <?= $gg['montant'];?> $</option>
                                <?php } ?>
                                </select>                       
                               
                              </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-6">   
                                <label for="">Responsable</label>                         
                               <input class="form-control" name="responsable"  type="text" value="<?= $g['responsable'];?>" placeholder="Responsable">
                              </div>
                              <div class="col-md-6">
                              <label for="">Contact responsable</label>
                               <input class="form-control" name="contact" type="number" value="<?= $g['contact'];?>" placeholder="Contact responsable">
                              </div>
                          </div>
                          <br>
                          <div class="row">
                            
                          <div class="col-md-6">
                            <label for="">Options</label>
                          <select class="form-control" name="ref_option" id="">
                          <option value="<?= $g['id_option'];?>"><?= $g['nom_option'];?></option>


                          <?php $reo=$db->query("SELECT * FROM options"); ?>
                             
                               
                               
                                    <?php while ($goo = $reo->fetch()) { ?>
                                <option value="<?= $goo['id_option'];?>"><?= $goo['nom_option'];?></option>
                                <?php } ?>
                               </select>
                          
                              
                               
                              
                              </div>
                              <div class="col-md-6">
                                <label for="">Classe</label>
                                <select class="form-control" name="ref_classe" id="">
                                <option value="<?= $g['id_classe'];?>"><?= $g['nom_classe'];?></option>
                                <?php $recla=$db->query("SELECT * FROM classe"); ?>
                               
                                    <?php while ($gc = $recla->fetch()) { ?>
                                <option value="<?= $gc['id_classe'];?>"><?= $gc['nom_classe'];?></option>
                                <?php } ?>
                               </select>

                              
                           </div>
                              
                          <br>
                          <br>
                          <div class="row">
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input class="form-control" name="email" type="email" value="<?= $g['email'];?>">

                            </div>
                            <div class="col-md-6">
                                <label for="">Mot de pase</label>
                            <input class="form-control" name="password" type="text" value="<?= $g['password'];?>">
                            </div>

                          </div>
                          <br>
                          

                              <div class="col-md -12">
                                <label for="">Adresse</label>
                          <input class="form-control" name="adresse" type="text" value="<?= $g['adresse'];?>" placeholder="Adresse">
                          </div>
                            
                          </div>
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="modif" class="btn btn-warning">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>




                                           <!-- <h1>Modal fichier</h1> -->

                                           <div class="modal fade bs-example<?= $g['id_eleves']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Ajouter un dossier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        
                    </div>
                    <div class="modal-body">
                        <form action="docs.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_eleves" value="<?= $g['id_eleves'];?>">
                          
                          <div class="row">
                            <div class="col-md-6">                            
                               <input class="form-control" name="nom_complet" type="text" value="<?= $g['nom_complet']; ?>" disabled>
                              </div>
                              <div class="col-md-6">
                                <input class="form-control" type="file" name="myfile">
                              </div>
                        </div>
                          <br>
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="save" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>





        <div class="modal fade bs<?= $g['id_eleves']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Suppression de <?= $g['nom_complet'];?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id_eleves" value="<?= $g['id_eleves'];?>">
                          
                          <div class="row">
                            <div class="col-md-6"> 
                                <label for="">Etes vous sur de vouloir supprimer <?= $g['nom_complet']; ?> ??</label>                           
                              
                              </div>
                              
                        </div>
                          <br>
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="del" class="btn btn-success">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>





        <div class="modal fade bs-pict<?= $g['id_eleves']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modifier la photo de <?= $g['nom_complet'];?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        
                    </div>
                    <div class="modal-body">
                        <form action="uph.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_eleves" value="<?= $g['id_eleves'];?>">
                          
                          <div class="row">
                            <div class="col-md-6">                            
                               <input class="form-control" name="nom_complet" type="text" value="<?= $g['nom_complet']; ?>" disabled>
                              </div>
                              <div class="col-md-6">
                                <input class="form-control" type="file" name="file">
                              </div>
                        </div>
                          <br>
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="picture" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>




                                           <!-- <h1>Fin modal fichier</h1> -->

                                        <tr>
                                            
                                            <td><?= $g['id_eleves']; ?></td>
                                            <td><?= $g['nom_complet']; ?></td>
                                            <td><?= $g['sexe']; ?></td>
                                            <td><?= $g['lieu_naiss']; ?></td>
                                            <td><?= $g['date_naiss']; ?></td>
                                            <td><?= $g['responsable']; ?></td>
                                            <td><?= $g['adresse']; ?></td>
                                            <td>
                                                <img width="50px;" src="prof/<?= $g['photo']; ?>" alt="">
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target=".bs-ex<?= $g['id_eleves']; ?>"><i class="fa fa-pen"></i></button>
                                            <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target=".bs<?= $g['id_eleves']; ?>"><i class="fa fa-trash"></i></button>
                                            <button type="button" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target=".bs-example<?= $g['id_eleves']; ?>"><i class="fa fa-file"></i></button>
                                            <button type="button" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target=".bs-pict<?= $g['id_eleves']; ?>"><i class="fa fa-image"></i></button>
                                            <a class="btn btn-success btn-circle btn-sm" href="pcard.php?idp=<?= $g['id_eleves']; ?>"> <i class="fa fa-print"></i> </a>

                                            </td>
                                            
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'part/_footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
   <?php include 'part/_log.php' ?>


   <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Nouvel eleve</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                          
                          <div class="row">
                            <div class="col-md-12">                            
                               <input class="form-control" name="nom_complet" type="text" placeholder="Nomcomplet">
                              </div>
                        </div>
                          <br>
                        <div class="row">
                              <div class="col-md-6">
                            <label for="">Sexe</label>
                               <select class="form-control" name="sexe">
                                <option>--Sexe--</option>
                                <option value="masculin">Masculin</option>
                                <option value="Feminin">Feminin</option>
                               </select>
                              </div>
                              <div class="col-md-6">   
                                <label for="">Photo</label>                         
                               <input class="form-control" name="file" type="file" placeholder="">
                              </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-6">                            
                               <input class="form-control" name="lieu_naiss" type="text" placeholder="Lieu de naissance">
                              </div>
                              <div class="col-md-6">
                            
                               <input class="form-control" name="date_naiss" type="date" placeholder="Date naissance">
                              </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-6">                            
                               <input class="form-control" name="responsable" type="text" placeholder="Responsable">
                              </div>
                              <div class="col-md-6">
                            
                               <input class="form-control" name="contact" type="number" placeholder="Contact responsable">
                              </div>
                          </div>
                          <br>
                          <div class="row">
                            
                          <div class="col-md-6">

                               <select class="form-control" name="montant" id="">
                               
                               <option value="">--montant inscription--</option>
                                    <?php while ($gp = $rep->fetch()) {
                                         $ss= $gp['id_classe'];
                                         $te = "";
                                         if($ss == '1'){ 
                                            $te="<span>ere</span>";
                                         } else {
                                             $te="<span>eme</span>";
                                         }
                                        
                                        ?>
                                <option value="<?= $gp['montant'];?>"><?= $gp['id_classe'];?> <?php echo $te; ?> - <?= $gp['montant'];?> $</option>
                                <?php } ?>
                               </select>
                              </div>
                              <div class="col-md-6">
                              <?php $reqo=$db->query("SELECT * FROM options"); ?>
                              <select class="form-control" name="ref_option" id="">
                               
                               <option>--Options--</option>
                                    <?php while ($go = $reqo->fetch()) { ?>
                                <option value="<?= $go['id_option'];?>"><?= $go['nom_option'];?></option>
                                <?php } ?>
                               </select>
                           </div>
                              
                          <br>
                          <br>
                          <div class="col-md-6">
                              <?php $reqa=$db->query("SELECT * FROM annee"); ?>
                              <select class="form-control" name="ref_annee" id="">
                               
                               <option value="">--Annee scolaire--</option>
                                    <?php while ($ga = $reqa->fetch()) { ?>
                                <option value="<?= $ga['id_annee'];?>"><?= $ga['anne'];?></option>
                                <?php } ?>
                               </select>
                           </div>

                           <div class="col-md-6">
                          <?php $reqcl=$db->query("SELECT * FROM classe"); ?>
                          <select class="form-control" name="ref_classe" id="">
                               
                               <option>--Classe--</option>
                                    <?php while ($gl = $reqcl->fetch()) { ?>
                                <option value="<?= $gl['id_classe'];?>"><?= $gl['nom_classe'];?></option>
                                <?php } ?>
                               </select>
                              </div>
                              <br>
                              <br>
                              <div class="col-md -12">
                          <input class="form-control" name="adresse" type="text" placeholder="Adresse">
                          </div>
                            
                          </div>
                         
                          
                          
                          
                          
                           
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>