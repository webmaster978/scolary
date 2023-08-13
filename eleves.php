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

				
  
 

  $req=$db->prepare("INSERT INTO eleves (nom_complet,sexe,lieu_naiss,date_naiss,responsable,contact,photo,adresse) VALUES (:nom_complet,:sexe,:lieu_naiss,:date_naiss,:responsable,:contact,:photo,:adresse)");

  $res=$req->execute(array(
    'nom_complet' => $nom_complet,
    'sexe'=> $sexe,
    'lieu_naiss' => $lieu_naiss,
    'date_naiss' => $date_naiss,
    'responsable' => $responsable,
	'adresse' => $adresse,
    'photo' => $fileName,
    'contact' => $contact
    
    
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
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php include 'part/_side.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                           
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
                                    <tfoot>
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
                                    </tfoot>
                                    <tbody>
                                    <?php $requete=$db->query("SELECT * FROM eleves"); ?>
                                    <?php while ($g = $requete->fetch()) { ?>
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
                                            <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-pen"></i></button>
                                            <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-trash"></i></button>
                                            <button type="button" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-image"></i></button>

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
                            
                              <div class="col-md-12">
                                <label for="">Adresse</label>
                                <textarea class="form-control" name="adresse" id="" cols="30" rows="5">

                                </textarea>
                            
                               
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