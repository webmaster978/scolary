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
    <link rel="stylesheet" href="files/bower_components/select2/dist/css/select2.min.css" />
    


<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" />
<link rel="stylesheet" type="text/css" href="files/bower_components/multiselect/css/multi-select.css" />



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php include 'part/_menu.php' ?>


       <?php 

if (isset($_POST['submit'])) {
    extract($_POST);
    $ref_annee = htmlspecialchars($_POST['ref_annee']);
    $ref_classe = htmlspecialchars($_POST['ref_classe']);
    $ref_eleve = htmlspecialchars($_POST['ref_eleve']);
    $ref_option = htmlspecialchars($_POST['ref_option']);
    
    $check_query = "SELECT * FROM inscription 
    WHERE ref_eleve=:ref_eleve
   ";
  $statement = $db->prepare($check_query);
  $check_data = array(
     ':ref_eleve' =>  $ref_eleve    
  );
  if($statement->execute($check_data))  
 {
    if($statement->rowCount() > 0)
     {
        echo "<script>
                 Swal.fire({
                  icon: 'error',
                   title: 'Oops...',
              text: 'Cet eleve existe deja!',
                 footer: ''
                  })
          </script>";
     }

  else
  {
    if ($statement->rowCount() == 0 ) {
        $rre=$db->prepare("INSERT INTO inscription (ref_eleve,ref_annee,ref_option,ref_classe) VALUES (:ref_eleve,:ref_annee,:ref_option,:ref_classe)");

        $resul=$rre->execute(array(
            'ref_eleve' => $ref_eleve,
            'ref_annee' => $ref_annee,
            'ref_option' => $ref_option,
            'ref_classe' => $ref_classe            
        ));
        if ($resul) {
            echo "<script>
                Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Eleve inserer avec success',
                    showConfirmButton: false,
                     timer: 1500
                   })

            </script>";
        }else{
             echo "<script>
                     Swal.fire({
                      icon: 'error',
                       title: 'Oops...',
                  text: 'eleve non inserer!',
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
                    <h1 class="h3 mb-2 text-gray-800">Liste des eleves inscripts</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Inscription</h6>
                           
                        <div class="col" align="right">
                          <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i></button>
                                    
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                            <th>Nom de l'eleve</th>
                                            <th>Classe </th>
                                            <th>Options</th>
                                            <th>Annee scolaire</th>
                                            <th>Date inscription</th>
                                            <th>Action</th>

                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <!-- <tr>
                                        
                                            <th>Annee scolaire</th>
                                            <th>Date creation</th>
                                        </tr> -->
                                    </tfoot>
                                    <tbody>
                                    <?php $requete=$db->query("SELECT * FROM inscription INNER JOIN eleves ON inscription.ref_eleve=eleves.id_eleves INNER JOIN annee ON inscription.ref_annee=annee.id_annee INNER JOIN classe ON inscription.ref_classe=classe.id_classe INNER JOIN options ON inscription.ref_option=options.id_option"); ?>
                                    <?php while ($g = $requete->fetch()) {
                                        
                                        $ss= $g['nom_classe'];
                                        $te = "";
                                        if($ss == '1'){ 
                                           $te="<span>ere</span>";
                                        } else {
                                            $te="<span>eme</span>";
                                        }

                                        
                                        ?>
                                        <tr>
                                            
                                            
                                            <td><?= $g['nom_complet']; ?></td>
                                            <td><?= $g['nom_classe']; ?> <?php echo $te; ?></td>
                                            <td><?= $g['nom_option']; ?></td>
                                            <td><?= $g['anne']; ?></td>
                                            <td><?= $g['created_inscri']; ?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-pen"></i></button>
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
                    <h5 class="modal-title" id="myModalLabel">Nouvelle inscription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                          
                          <div class="row">
                          <div class="col-md-6">

                         


                          <?php $reque=$db->query("SELECT * FROM eleves ORDER BY nom_complet ASC"); ?>

                          <select class="js-example-disabled-results" name="ref_eleve">
                          <?php while ($gg = $reque->fetch()) { ?>
                                <option value="<?= $gg['id_eleves'];?>"><?= $gg['nom_complet'];?> </option>
                                <?php } ?>

                           </select>



                               
                              </div>
                              <div class="col-md-6">
                              <?php $reqa=$db->query("SELECT * FROM annee"); ?>
                              <select class="form-control" name="ref_annee" id="">
                               
                               <option value="">--Annee scolaire--</option>
                                    <?php while ($ga = $reqa->fetch()) { ?>
                                <option value="<?= $ga['id_annee'];?>"><?= $ga['anne'];?></option>
                                <?php } ?>
                               </select>
                           </div>
                          </div>
                          <br>
                          <div class="row">
                          <div class="col-md-6">
                          <?php $reqcl=$db->query("SELECT * FROM classe"); ?>
                          <select class="form-control" name="ref_classe" id="">
                               
                               <option>--Classe--</option>
                                    <?php while ($gl = $reqcl->fetch()) { ?>
                                <option value="<?= $gl['id_classe'];?>"><?= $gl['nom_classe'];?></option>
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
    <script type="text/javascript" src="files/assets/pages/advance-elements/select2-custom.js"></script>
   


    <script type="text/javascript" src="files/bower_components/select2/dist/js/select2.full.min.js"></script>

<script type="text/javascript" src="files/bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js">


            </script>
<script type="text/javascript" src="files/bower_components/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="files/assets/js/jquery.quicksearch.js"></script>





</body>

</html>