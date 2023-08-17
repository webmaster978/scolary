<?php 
require "config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<?php

   
if(isset($_SESSION['PROFILE']['id_utilisateur'])) {
    switch ($_SESSION['PROFILE']['designation']) {
        
        
        case 'admin':
            header('location: dashboard');
        break;
        case 'utilisateur':
            header('location: users/');
             break;
        
        
        default:
            header('location: ./');
            die('aucune service');
        break;
    }
}

if(isset($_POST['btn_sub'])) {
    extract($_POST);
    $sql = "SELECT * FROM authentification  WHERE (username=:username OR email=:email) AND password=:password";
    $req = $db->prepare($sql);
    $req->execute([
        'username' => htmlspecialchars(trim($username)),
        'email' => $username,
        'password' => sha1($password)
    ]);
    
    if($informations = $req->fetch()) { /*Si l'adresse et le mot de passe sont vrai*/
        $_SESSION['TMP_PROFILE'] = $informations;
        //echo $_SESSION['TMP_PROFILE']['ref_utilisateur'];
        
        $recup_informations = $db->prepare("SELECT * FROM fonction INNER JOIN tbl_agent ON fonction.id_fonction=tbl_agent.ref_fonction WHERE id_utilisateur=:id_utilisateur");
        $recup_informations->execute([
        'id_utilisateur' => $_SESSION['TMP_PROFILE']['ref_utilisateur']
        ]);

        while($session = $recup_informations->fetch()) {
            $_SESSION['PROFILE'] = $session;
        }
        
        switch ($_SESSION['PROFILE']['designation']) {
             
           
             case 'admin':
            header('location: dashboard');
             break;
             case 'utilisateur':
                header('location: users/');
                 break;
             
            default:
                header('location: ./');
                die('aucune service');
            break;
        }
    }
    else{
        $error = '';
    }
}

?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>

                                        <div id="errorConnection" style="margin-top: 30px; margin-bottom: 30px">
                                    <?php if(isset($error)) : ?>
                                    <div class="alert alert-danger" onclick="document.querySelector('#errorConnection').style.display = 'none';">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="color: red"><b>Informations incorrectes !</b></span>
                                    </div>
                                    <?php endif; ?>
                                </div> 
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" value="<?= (isset($username)) ? $username : ''; ?>" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Nom d'utilisateur ou mail">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" value="<?= (isset($password)) ? $password : ''; ?>" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Mot de passe">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="btn_sub" class="btn btn-primary btn-user btn-block">
                                            Se connecter
                                        </button>
                                        <hr>
                                      
                                    </form>
                                    <hr>
                                    <a href="authentification" class="btn btn-primary btn-user btn-block">Se connecter en tant que eleve</a>
                                   
                                    
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>