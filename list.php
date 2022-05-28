
            <?PHP include("topheader.php");?>
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
                                    <li class="active"><a href="javascript:void()" class="waves-effect waves-light active"><i class="ion-ios7-pulse-strong"></i>Product List</a></li>
                                    <li><a href="products.php" class="waves-effect waves-light"><i class="ion-ios7-pulse-strong"></i>Buy And Sell</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="po.php" class="waves-effect waves-light"><i class="ion-android-contacts"></i><span>People</span>
                                    <span class="pull-right"><i class="md md-add"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="po.php" class="waves-effect waves-light"><i class="ion-android-contact"></i>Users</a></li>
                                    <li><a href="po.php" class="waves-effect waves-light"><i class="ion-android-social-user"></i>Clients</a></li>
                                    <li><a href="po.php" class="waves-effect waves-light"><i class="ion-android-social"></i>Supplier</a></li>
                                    
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="" class="waves-effect waves-light"><i class="ion-ios7-albums"></i><span>Documents</span>
                                    <span class="pull-right"><i class="md md-add"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="invoices.php" class="waves-effect waves-light"><i class="ion-document"></i>Invoices</a></li>
                                    <li><a href="pinv.php.php" class="waves-effect waves-light"><i class="ion-clipboard"></i>Proforma Invoice</a></li>
                                    <li><a href="invoices1.php" class="waves-effect waves-light"><i class="ion-document-text"></i>Purchase Order</a></li>
                                </ul>
                                </a>
                            </li>
                            <li class="has_sub">
                                <a href="reports.php" class="waves-effect waves-light"><i class="ion-ios7-pulse-strong"></i><span>KPI Reports</span>
                                    <span class="pull-right"><i class="md md-add"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="reports.php">General</a></li>
                                    <li><a href="fmcg.php">Faster | Slow Items</a></li>
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
                                <h4 class="pull-left page-title">PREPARE STOCK <i class="ion-ios7-cog-outline"></i></h4>
                                
                            </div>
                        </div>


                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">PRODUCT</h3>
                                    </div>
                                    <div class="panel-body">
										<div id="itamePlace">
                                        <div class="row">
											<div class="col-sm-6">
												<div class="m-b-30">
													<button id="addToTable" onclick="initItem()" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></button>
												</div>
											</div>
										</div>
										<table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
													<th>N/O</th>
													<th>Name</th>
													<th>Code</th>
													<th>Unit</th>
													<th>Price Per Unit</th>
													<th class="hidden-print">Actions</th>
												</tr>
                                            </thead>


                                            <tbody>
                                                 <?php 
										$sql = $db->query("SELECT * FROM items WHERE companyId='$SessioncompanyId' ORDER BY itemId DESC");
										$n=0;
										WHILE($row= mysqli_fetch_array($sql))
										{
											$n++;
										echo'<tr class="gradeX">
                                            <td>'.$n.'</td>
                                            <td>'.$row['itemName'].'</td>
                                            <td>'.$row['kode'].'</td>
                                            <td>'.$row['unit'].'</td>
                                            <td>'.number_format($row['unityPrice']).' Rwf</td>
                                            <td class="actions">
                                                &nbsp;&nbsp;&nbsp;
												<a href="javascript:void()" onclick="editItem(itemId='.$row['itemId'].')"><i class="fa fa-pencil text-primary"></i></a>
												&nbsp;&nbsp;&nbsp;
                                                <a href="javascript:void()" onclick="vanamo(itemId='.$row['itemId'].')"><i class="fa fa-trash-o text-danger"></i></a>
                                            </td>
                                        </tr>';
										}
										
										?>

                                             </tbody>
                                        </table>
										</div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- End Row --
						<div class="row">
							<div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
										<div class="row">
											<div class="col-md-8">
												<input disabled class="form-control" value="0"/>
											</div>
											<div class="col-md-4">
												<button class="btn btn-default btn-round waves-effect waves-light"> C </button>
											</div>
										</div>
									</div>
									<div class="panel-body">
												<table class="table">
														<tr>
															<td><button class="btn btn-default waves-effect waves-light"> 7 </button></td>
															<td><button class="btn btn-default waves-effect waves-light"> 8 </button></td>
															<td><button class="btn btn-default waves-effect waves-light"> 9 </button></td>
															<td><button class="btn btn-default waves-effect waves-light"> / </button></td>
														</tr>
														<tr>
															<td><button class="btn btn-default waves-effect waves-light"> 4 </button></td>
															<td><button class="btn btn-default waves-effect waves-light"> 5 </button></td>
															<td><button class="btn btn-default waves-effect waves-light"> 6 </button></td>
															<td><button class="btn btn-default waves-effect waves-light"> * </button></td>
														</tr><tr>
															<td><button class="btn btn-default waves-effect waves-light"> 1 </button></td>
															<td><button class="btn btn-default waves-effect waves-light"> 2 </button></td>
															<td><button class="btn btn-default waves-effect waves-light"> 3 </button></td>
															<td><button class="btn btn-default waves-effect waves-light"> - </button></td>
														</tr><tr>
															<td><button class="btn btn-default waves-effect waves-light"> 0 </button></td>
															<td><button class="btn btn-default waves-effect waves-light"> 8 </button></td>
															<td><button class="btn btn-default waves-effect waves-light"> 9 </button></td>
															<td><button class="btn btn-default waves-effect waves-light"> + </button></td>
														</tr>
														
													</table>
									</div>
									<div class="panel-footer">
									</div>
								</div>
							</div>
						</div>
					    <!-- End Row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
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
function initItem(){
	var initItem = '1';
	$.ajax({
			type : "GET",
			url : "adminscript.php",
			dataType : "html",
			cache : "false",
			data : {
				
				initItem : initItem,
			},
			success : function(html, textStatus){
				$("#itamePlace").html(html);
			},
			error : function(xht, textStatus, errorThrown){
				alert("Error : " + errorThrown);
			}
	});
}

function newItem(){
	var newItemName = document.getElementById('newItemName').value;
	if (newItemName == null || newItemName == "") {
        alert("newItemName must be filled out");
        return false;
    }
	var newItemCode = document.getElementById('newItemCode').value;
	if (newItemCode == null || newItemCode == "") {
        alert("newItemCode must be filled out");
        return false;
    }
	var newItemUnit = document.getElementById('newItemUnit').value;
	if (newItemUnit == null || newItemUnit == "") {
        alert("newItemUnit must be filled out");
        return false;
    }
	var newItemPrice = document.getElementById('newItemPrice').value;
	if (newItemPrice == null || newItemPrice == "") {
        alert("newItemPrice must be filled out");
        return false;
    }
	$.ajax({
			type : "GET",
			url : "adminscript.php",
			dataType : "html",
			cache : "false",
			data : {
				
				newItemName : newItemName,
				newItemCode : newItemCode,
				newItemUnit : newItemUnit,
				newItemPrice : newItemPrice,
			},
			success : function(html, textStatus){
				$("#itamePlace").html(html);
			},
			error : function(xht, textStatus, errorThrown){
				alert("Error : " + errorThrown);
			}
	});
}
function changeItem(){
	var updateItemName = document.getElementById('updateItemName').value;
	if (updateItemName == null || updateItemName == "") {
        alert("updateItemName must be filled out");
        return false;
    }
	var updateItemCode = document.getElementById('updateItemCode').value;
	if (updateItemCode == null || updateItemCode == "") {
        alert("updateItemCode must be filled out");
        return false;
    }
	var updateItemUnit = document.getElementById('updateItemUnit').value;
	if (updateItemUnit == null || updateItemUnit == "") {
        alert("updateItemUnit must be filled out");
        return false;
    }
	var updateItemPrice = document.getElementById('updateItemPrice').value;
	if (updateItemPrice == null || updateItemPrice == "") {
        alert("updateItemPrice must be filled out");
        return false;
    }
	var updateItemId = document.getElementById('updateItemId').value;
	if (updateItemId == null || updateItemId == "") {
        alert("updateItemId must be filled out");
        return false;
    }
	$.ajax({
			type : "GET",
			url : "adminscript.php",
			dataType : "html",
			cache : "false",
			data : {
				
				updateItemName : updateItemName,
				updateItemCode : updateItemCode,
				updateItemUnit : updateItemUnit,
				updateItemPrice : updateItemPrice,
				updateItemId : updateItemId,
			},
			success : function(html, textStatus){
				$("#itamePlace").html(html);
			},
			error : function(xht, textStatus, errorThrown){
				alert("Error : " + errorThrown);
			}
	});
}
</script>
<script> <!--5 Load product to Edit-->
function editItem(itemId){
	var editItem = itemId
	$.ajax({
			type : "GET",
			url : "adminscript.php",
			dataType : "html",
			cache : "false",
			data : {
				
				editItem : editItem,
			},
			success : function(html, textStatus){
				$("#itamePlace").html(html);
			},
			error : function(xht, textStatus, errorThrown){
				alert("Error : " + errorThrown);
			}
	});
}
function vanamo(itemId){
	var removeItem = itemId;
	//alert(removeItem);
	var r = confirm("Are you sure you want to remove this item from the list");
    if (r == true)
		{
     
	$.ajax({
			type : "GET",
			url : "adminscript.php",
			dataType : "html",
			cache : "false",
			data : {
				
				removeItem : removeItem,
			},
			success : function(html, textStatus){
				$("#itamePlace").html(html);
			},
			error : function(xht, textStatus, errorThrown){
				alert("Error : " + errorThrown);
			}
	});

	}
}
function setuptable(){
	var setuptable = '1';
	$.ajax({
			type : "GET",
			url : "adminscript.php",
			dataType : "html",
			cache : "false",
			data : {
				
				setuptable : setuptable,
			},
			success : function(html, textStatus){
				$("#itamePlace").html(html);
			},
			error : function(xht, textStatus, errorThrown){
				alert("Error : " + errorThrown);
			}
	});
}
</script>
	
	</body>
</html>