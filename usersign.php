<?php
    session_start();
    $error="";
    $signcompanyid = "";
    if (isset($_SESSION['companyname']) AND isset($_SESSION['companyemail'])) {
        $companyname = $_SESSION['companyname'];
        $companyemail = $_SESSION['companyemail'];
        include 'db.php';
        $sql = $db ->query("SELECT * FROM clients WHERE companyname='$companyname' AND companyemail='$companyemail'");
        while($row = mysqli_fetch_array($sql)){
            $signcompanyid = $row['companyid'];
            $signcompanyname = $row['companyname'];
        }
        if (isset($_POST['adminusername'])) {
            $signadminname = $_POST['adminusername'];
            $signadminemail = $_POST['adminemail'];
            $signadminphone = $_POST['adminphone'];
            $signadminpassword = $_POST['adminpassword'];
            include("db.php");
            $check = $db ->query("SELECT * FROM users WHERE companyId ='$signcompanyid' AND username ='$signadminname' AND pwd='$signadminpassword'");
            $countCHeck = mysqli_num_rows($check);
            if($countCHeck == 0){
                echo $signcompanyid;
                include("db.php");
                $insertuser = $db ->query("INSERT INTO `users`(`username`, `companyId`, `companyname`, `pwd`, `phone`, `email`, `account_type`) 
                VALUES ('$signadminname', '$signcompanyid', '$signcompanyname', '$signadminpassword', '$signadminphone', '$signadminemail', 'administrator')") or die(mysqli_error());
                header("location: index.php");
            }
            else{
                $error.='this user had registered. try to use another username or password';
            }
        }
    }
    else{
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="A fully Inventory MS">
    <meta name="author" content="Isaac">
    <link rel="shortcut icon" href="assets/images/favicon_1.ico">
    <title>User Sign-Up</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">

    <script src="assets/js/modernizr.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-65046120-1', 'auto');
      ga('send', 'pageview');

    </script>
    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-4">
                <div class="panel panel-color panel-primary panel-pages">
                    <div class="panel-heading bg-img"> 
                        <div class="bg-overlay"></div>
                        <h3 class="text-center m-t-10 text-white">Configure User to <strong>STOCK</strong> </h3>
                    </div> 


                    <div class="panel-body">
                        <form class="form-horizontal m-t-20" method="post" action="usersign.php" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control input-lg" type="text" required="Plz Provide admin Username"  name="adminusername" placeholder="Admin Username">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control input-lg" type="telephone" required="Plz Provide company name"  name="adminphone" placeholder="Admin's Phone">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control input-lg" type="email" required="Plz Provide company name"  name="adminemail" placeholder="Admin's Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control input-lg" type="text"  name="adminpassword" required="your password plz" placeholder="Password">
                                </div>
                            </div>
                            <?php echo $error; ?>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox-signup" type="checkbox" required>
                                        <label for="checkbox-signup">
                                            accept our terms
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group text-center m-t-40">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Sign Up</button>
                                </div>
                            </div>
                        </form> 
                    </div>                                 
                </div>
            </div>
        </div>
    </div>
        
    	<script>
            var resizefunc = [];
        </script>

        <!-- Main  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/jquery.app.js"></script>
	
	</body>
</html>