<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php include 'part/_menu.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include'part/_side.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                   <div class="col-md-6">
                   <label for="">Nom complet</label>
                 <input class="form-control" type="text" value="<?php echo $_SESSION['user_name'] ?>" disabled>
                   </div>
                   <div class="col-md-6">
                   <label for="">Genre</label>
                 <input class="form-control" type="text" value="<?php echo $_SESSION['user_sexe'] ?>" disabled>
                   </div>
                        
                    </div>
                    
                    <div class="row">
                   <div class="col-md-6">
                   <label for="">Date de naissance</label>
                 <input class="form-control" type="text" value="<?php echo $_SESSION['user_date_naiss'] ?>" disabled>
                   </div>
                   <div class="col-md-6">
                   <label for="">Lieu de naissance</label>
                 <input class="form-control" type="text" value="<?php echo $_SESSION['user_lieu_naiss'] ?>" disabled>
                   </div>
                        
                    </div>
                    
                    <div class="row">
                   <div class="col-md-6">
                   <label for="">Responsable</label>
                 <input class="form-control" type="text" value="<?php echo $_SESSION['user_responsable'] ?>" disabled>
                   </div>
                   <div class="col-md-6">
                   <label for="">Contact responsable</label>
                 <input class="form-control" type="text" value="<?php echo $_SESSION['user_contact'] ?>" disabled>
                   </div>

                        
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                      <a href="../uploads/<?php echo $_SESSION['user_docs'] ?>"><i class="fa fa-eye"></i>Voir mon dossier</a>
                      </div>
                      <div class="col-md-6">
                        <img width="200px;" src="../prof/<?php echo $_SESSION['user_photo'] ?>" alt="">

                      </div>

                    </div>

                   

                    <!-- Content Row -->

                   

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

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>