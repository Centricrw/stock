
            <?php include("topheader.php");?>
			
			<!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                      <div class="user-details">
                        <div class="pull-left">
                            <img src="assets/images/users/<?php echo $thisid;?>.jpg" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $names;?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0"><?php echo $account_type;?></p>
                        </div>
                    </div>
					<!--- Divider -->
                   <div id="sidebar-menu">
                        <ul>
                            <li class="">
                                <a href="index.php" class="waves-effect waves-light "><i class="ion-ios7-gear"></i><span>HOME</span></a>
                            </li>
                            <li class="has_sub">
                                <a href="products.php" class="waves-effect waves-light"><i class="ion-bag"></i><span>Products</span>
                                    <span class="pull-right"><i class="md md-add"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li ><a href="list.php" class="waves-effect waves-light "><i class="ion-ios7-pulse-strong"></i>Product List</a></li>
                                    <li ><a href="products.php" class="waves-effect waves-light "><i class="ion-ios7-pulse-strong"></i>Buy And Sell</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="po.php" class="waves-effect waves-light"><i class="ion-android-contacts"></i><span>People</span>
                                    <span class="pull-right"><i class="md md-add"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li ><a href="po.php" class="waves-effect waves-light "><i class="ion-android-contact"></i>Users</a></li>
                                    <li  class="active"><a href="javascript:void()" class="waves-effect waves-light active"><i class="ion-android-social-user "></i>Clients</a></li>
                                    <li><a href="po.php" class="waves-effect waves-light"><i class="ion-android-social"></i>Supplier</a></li>
                                    
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="" class="waves-effect waves-light"><i class="ion-ios7-albums"></i><span>Documents</span>
                                    <span class="pull-right"><i class="md md-add"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li ><a href="invoices.php" class="waves-effect waves-light "><i class="ion-document"></i>Invoices</a></li>
                                    <li><a href="pinv.php" class="waves-effect waves-light"><i class="ion-clipboard"></i>Proforma Invoice</a></li>
                                    <li><a href="po.php" class="waves-effect waves-light"><i class="ion-document-text"></i>Purchase Order</a></li>
                                </ul>
                                </a>
                            </li>
                            <li class="has_sub">
                                <a href="reports.php" class="waves-effect waves-light"><i class="ion-ios7-pulse-strong"></i><span>KPI Reports</span>
                                    <span class="pull-right"><i class="md md-add"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="reports.php" >General</a></li>
                                    <li ><a href="fmcg.php" class="waves-effect waves-light ">Faster | Slow Items</a></li>
                                    <li><a href="roi.php">Return On Investment</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Client Behavior</h4>
                                
                            </div>
                        </div>
						

						<div class="row">
                            <!-- USER LIST -->
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
										<div class="row">
										    <div class="col-md-4">
												<h4 class="panel-title">CLIENT</h4>
											</div>
											<div class="col-md-8">
												<div class="input-group">
													<input type="text" id="searchUser" onkeyup="search()" name="example-input1-group2" class="form-control input-sm" placeholder="Search">
													<span class="input-group-btn">
														<button type="button" class="btn-sm btn waves-effect waves-light btn-primary"><i class="fa fa-search"></i></button>
													</span>
												</div>
											</div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div id="userResurts" class="inbox-widget nicescroll mx-box">
                                            <?php
											$sqltotalperUser = $db->query("SELECT  customerName, transactionID, sum(trUnityPrice) IGITERANYO
											FROM transactions 
											WHERE operation = 'out' 
											AND customerName!= 'N/A' 
											GROUP BY customerName ORDER BY IGITERANYO DESC
");
												$n = 0;
												while($row = mysqli_fetch_array($sqltotalperUser))
												{
													$n++;
													
												echo'<a href="javascript:void()" onclick="fmcg(itemCode=1); fmcg1(itemid1=1)">
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img">#'.$n.'</div>
                                                    <p class="inbox-item-author">'.$row['customerName'].'</p>
                                                    <p class="inbox-item-date">('.number_format($row['IGITERANYO']).' Rwf)</p>
                                                </div>
                                            </a>';
												}
											
											?>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <!-- RESULT TABLE -->
							<div class="col-lg-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="header1"> 
										<div class="row">
											<div class="col-md-3">
												<h3 class="panel-title">{{CLIENT Name}}</h3>
											</div>
											
											<div class="col-md-4">
												<div class="input-group">
													<input type="date" onchange="between()" id="fromDate" class="form-control input-sm" min="<?PHP
														$sqldate = $db->query("SELECT date(doneOn), `transactionID` FROM `transactions` ORDER BY `transactionID` ASC LIMIT 1")or die (mysql_error());
														WHILE($row = mysqli_fetch_array($sqldate))
														{
															echo $row['date(doneOn)'];
														}
														?>" placeholder="mm/dd/yyyy">
													<span class="input-group-addon">
														<i class="glyphicon glyphicon-calendar"></i>
													</span>
												</div>
											</div>									
											<div class="col-md-1">
												<h3 class="panel-title"> <center><i class="ion-arrow-right-c"></i></center></h3>
											</div>
											<div class="col-md-4">
												<div class="input-group">
													<input type="date" onchange="between()" id="toDate" class="form-control input-sm" placeholder="mm/dd/yyyy">
													<span class="input-group-addon">
														<i class="glyphicon glyphicon-calendar"></i>
													</span>
												</div>
											</div>									
										</div>
									</div> 
									<div class="panel-body">
                                        <div id="fmcgReport" class="inbox-widget nicescroll mx-box">
                                       <h5 class="text-success"><center>Click on the Client Name</center></h5>
										</div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

					   </div>
                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2016 © KGL-INVETO.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
		
		
		<!--  ITEM HISTORY INFO -->
<div class="modal fade bs-example-modal-lg" id="itemHist" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
	<div class="modal-dialog modal-lg">
	   <div class="modal-content p-0 b-0">
		 <div id="itemInfoPop">
			<div class="panel panel-color panel-primary">
				<div class="panel-heading"> 
				Loadding...</div> 
				<div class="panel-body"> 
					
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="loader"></div>
								</div>
							</div>
						</div>
					</div>
					<hr/>
					<div class="row"> 
						<div class="col-md-12"> 
							<div class="pull-right">
								<div id="printInvoice">
									<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>				
			</div>
		 </div>
		</div><!-- /.modal-content -->
	 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	
        <!-- END wrapper -->
    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
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

	     <!-- Datatables-->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>
		
		<script src="assets/plugins/flot-chart/jquery.flot.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.stack.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="assets/pages/jquery.flot.init.js"></script>
        
		
		<script src="js/apicall.js"></script>

		
		<script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();
        </script>
		
<script> <!--5 Load product to Edit-->
// ITEM SEARCH
function search(){
	var searchroi = $("#searchUser").val();	
	//alert(searchUser);
	//var uId=userNam
	$.ajax({
			type : "GET",
			url : "adminscript.php",
			dataType : "html",
			cache : "false",
			data : {
				
				searchroi : searchroi,
			},
			success : function(html, textStatus){
				$("#userResurts").html(html);
			},
			error : function(xht, textStatus, errorThrown){
				alert("Error : " + errorThrown);
			}
	});
}
// NAME ON THE HEADER
function fmcg(itemCode){
	//alert(userNam);
	var itemCode=itemCode
	$.ajax({
			type : "GET",
			url : "adminscript.php",
			dataType : "html",
			cache : "false",
			data : {
				
				itemCode : itemCode,
			},
			success : function(html, textStatus){
				$("#header1").html(html);
			},
			error : function(xht, textStatus, errorThrown){
				alert("Error : " + errorThrown);
			}
	});
}
// FILTER BY TIME INTERVAL
function between(){
	var fromDate = $("#fromDate").val();	
	var toDate = $("#toDate").val();
		
	//alert(fromDate);
	//alert(toDate);
	$.ajax({
			type : "GET",
			url : "adminscript.php",
			dataType : "html",
			cache : "false",
			data : {
				
				fmcgfromDate : fromDate,
				fmcgtoDate : toDate,
			},
			success : function(html, textStatus){
				$("#fmcgReport").html(html);
			},
			error : function(xht, textStatus, errorThrown){
				alert("Error : " + errorThrown);
			}
	});
}
// GET ITEM FMCG FULL REPORT
function fmcg1(itemid1){
	var itemid1=itemid1
	$.ajax({
			type : "GET",
			url : "adminscript.php",
			dataType : "html",
			cache : "false",
			data : {
				
				itemid1 : itemid1,
			},
			success : function(html, textStatus){
				$("#fmcgReport").html(html);
			},
			error : function(xht, textStatus, errorThrown){
				alert("Error : " + errorThrown);
			}
	});
}
</script>
	
</body>
</html>