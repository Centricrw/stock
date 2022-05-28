<?php // Destry session if it hasn't been used for 15 minute.
    session_start();
    if (!isset($_SESSION["username"])) {
     header("location: login.php"); 
        exit();
    }
    ?>
    <?php 
    $session_id = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
    $username = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["username"]); // filter everything but numbers and letters
    $companyname = $_SESSION["companyname"]; // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); // filter everything but numbers and letters
    include "db.php"; 
    $sql = $db->query("SELECT * FROM users WHERE companyname='$companyname' AND username='$username' AND pwd='$password' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysqli_num_rows($sql); // count the row nums
    if ($existCount > 0) { 
    	while($row = mysqli_fetch_array($sql)){ 
		$thisid = $row["id"];
        $names = $row["username"];
		$companyname = $row["companyname"];
        $SessioncompanyId = $row["companyId"]; 
		$account_type = $row["account_type"];
		}
	} 
	else{
    	echo "
    	<br/><br/><br/><h3>Your account has been temporally deactivated</h3>
    	<p>Please contact: <br/><em>(+25) 078 4956178</em><br/><b>irasaac@gmail.com</b></p>		
    	Or<p><a href='logout.php'>Click Here to login again</a></p>
    	
    	";
        exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title><?php echo $companyname ?> stock</title>
        
        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>

<!-- Plugins css -->
        <link href="assets/plugins/modal-effect/css/component.css" rel="stylesheet">
		
		<script src="assets/js/modernizr.min.js"></script>

<!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/morris.js/morris.css">

		
        <link href="assets/plugins/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

		<style>
            .loader {
              border: 8px solid #f3f3f3;
              border-radius: 50%;
              border-top: 8px solid #000000;
              width: 50px;
              height: 50px;
              -webkit-animation: spin 1s linear infinite;
              animation: spin 1s linear infinite;
            }

            @-webkit-keyframes spin {
              0% { -webkit-transform: rotate(0deg); }
              100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }
        </style>

        <script src="js/jquery.js"></script>

    </head>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
             <!-- Top Bar Start --><div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.php" class="logo"><i class="md md-terrain"></i> <span>STOCK </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="bar">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Search Here...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>
                            <div class="pull-right" style="margin-right: 25px; margin-top: 10px;">
                                <?php
                                    echo '<b style="font-size: 150%;">'.$companyname.'</b>'
                                ?>
                            </div>

                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            