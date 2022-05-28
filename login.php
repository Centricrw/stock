<?php 
    $error = "";
    $CompanyId ="";
    session_start();
    if (isset($_SESSION["username"])) {
    header("location: index.php"); 
    exit();
}
error_reporting(0);
?>
<?php
    $error = "";
    if (isset($_POST['companyemail'])) {
        $signcompanyname = $_POST['signcompanyname'];
        $signcompanyemail = $_POST['companyemail']; 
        include ("db.php");
        $sql = $db->query("SELECT * FROM clients WHERE companyname='$signcompanyname' AND companyemail='$signcompanyemail'");
        $count = mysqli_num_rows($sql);
        if ($count == 0) {
            echo "string";
            $_SESSION['companyname'] = $signcompanyname;
            $_SESSION['companyemail'] = $signcompanyemail;
            include("db.php");
            $insertclient = $db->query("INSERT INTO `clients`(`companyname`, `companyemail`, `regis_date`) 
            VALUES ('$signcompanyname', '$signcompanyemail', now())")or die(mysqli_error());
                header("location: usersign.php");
        }
        else{
            $error='<p style="color: green">you are try to add already exit Enterprise. try to use another name or email</p><br/>';
        }
    }
        

?>
<?php
if (isset($_POST['username'])){
	$companyname = $_POST['companyname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	require 'db.php';
	$help ="";
	$sql_check_user = $db->query("SELECT * FROM users WHERE companyname = '$companyname' AND username = '$username' AND pwd = '$password' limit 1")or die ($db->error);
	$existCount= mysqli_num_rows($sql_check_user);
	if ($existCount == 1) { // evaluate the count
        while($row = mysqli_fetch_array($sql_check_user)){ 
            $id = $row["id"];
            $account_type = $row["account_type"];
            $CompanyId = $row['companyId]'];
            $_SESSION["CompanyId"] = $CompanyId;
    	}
		
        $_SESSION["id"] = $id;
	    $_SESSION["companyname"] = $companyname;
	    $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
		if($account_type =='administrator')
		{
			header("location: index.php");
			exit();
		}
			elseif ($account_type =='user')
		{
			header("location: index.php");
		exit();
		}
    }
    else {
        $help="This user doesn't exit";
    }
}
else{
	 //
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
        <title>Stock Sign In/Sign Up</title>

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
                        <h3 class="text-center m-t-10 text-white"> Register to <strong>STOCK</strong> </h3>
                    </div> 


                    <div class="panel-body">
                        <form class="form-horizontal m-t-20" method="post" action="login.php" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control input-lg" type="text" required="Plz Provide company name"  name="signcompanyname" placeholder="Enterprise name">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control input-lg" type="email" required="Plz Provide company Email"  name="companyemail" placeholder="Company Email">
                                </div>
                            </div>
                            

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
                                <?php echo $error; ?>
                            <div class="form-group text-center m-t-40">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Continue</button>
                                </div>
                            </div>
                        </form> 
                    </div>                                 
                </div>
            </div>
            <div class="col-xs-2"></div>
            <div class="col-xs-4">
                <div class="panel panel-color panel-primary panel-pages">
                    <div class="panel-heading bg-img"> 
                        <div class="bg-overlay"></div>
                        <h3 class="text-center m-t-10 text-white"> Sign In to <strong>STOCK</strong> </h3>
                    </div> 

                    <div class="panel-body">
        				<form class="form-horizontal m-t-20" method="post" action="login.php">
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control input-lg" type="text" required="Plz Provide company name"  name="companyname" placeholder="company name">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control input-lg" type="text" required="Plz Provide your username"  name="username" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control input-lg" type="password"  name="password" required="your password plz" placeholder="Password">
                                </div>
                            </div>
                                <?php echo $help; ?>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox-signup" type="checkbox">
                                        <label for="checkbox-signup">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="new.zip">...</a>
                                </div>
                            </div>
                            
                            <div class="form-group text-center m-t-40">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
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