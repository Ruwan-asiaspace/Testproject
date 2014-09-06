<?php
require("config.php");
$auth=new Auth();
$auth->isLoggedIn();

//define page title
$page_title="My Metrik | Add User";
//define main side bar tab
$active_nav="session_management";

require("classes/session_class.php");

$userid=$auth->get('id');

$usergroupobj=new Sessionmanager();

$grouplist=$usergroupobj->group_list($userid);

if($req->isGet()){
	$getgroupid=$req->get('groupid','int');
		if(!$req->isNull($getgroupid)){ 
			$selectgroup=$usergroupobj->groupmembers($getgroupid);
			}
	}
	
if($req->isGet()){
	$sessid=$req->get('sessid','int');
		if(!$req->isNull($sessid)){ 
	}
}
			
		if($req->post('save','string')=="Save"){
		    if(isset($_POST['adduser']))
				$adduser=$_POST['adduser'];
			else
				$adduser=array();
			$selectgroup=$usergroupobj->session_adduser($adduser,$sessid);
			header("location:session-manager.php");
		
           }	

require("includes/header.php");
require("includes/sidebar.php");
?>
<script language="javascript">
	function grouppass(){
			window.location="add-user.php?groupid="+document.getElementById('group').value+"&sessid=<?php echo $sessid; ?>";
		} 
</script>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Session Manager</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li>
									<a href="session-manager.php">
										Session Manager
									</a>
								</li>
								<li><span>Add Users</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->					
					<section class="panel">
						<div class="panel-body">
						<!--  <div class="row">
								<div class="col-md-12">
									
								</div>
							</div>-->
							<form name="form1" action="" method="post">
                            <table class="table table-bordered table-striped" id="datatable-default">
								<thead>
									<tr>
									  <td colspan="3"><table width="100%" border="0">
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                          <td width="28%"><select class="form-control mb-md" name="group" id="group" onchange="return grouppass();">
                                          <option value="0" >Select Group</option>
                                          <?php foreach($grouplist as $grouplists): 
										  if($getgroupid==$grouplists['id']){
										  ?>
                                   <option value="<?php echo $grouplists['id']; ?>"  selected="selected"><?php echo $grouplists['group_name'];  ?></option>
                                          <?php } else { ?>
								  <option value="<?php echo $grouplists['id']; ?>"><?php echo $grouplists['group_name'];  ?></option>
                                            <?php } endforeach;  ?>
								   </select></td>
                                          <td width="80%"><div class="mb-md text-right">
										<button type="submit" name="save" id="save" value="Save" class="btn btn-primary">Save</button>
									</div></td>
                                        </tr>
                                      </table></td>
                                  </tr>
									<tr>
										<th>Select</th>
										<th>Name</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
                                <?php 
								if(isset($selectgroup)){
								foreach($selectgroup as $groupmembers): 
										  ?>
									<tr class="gradeX">
										<td><input type="checkbox" name="adduser[]" id="adduser" value="<?php echo $groupmembers['id']; ?>" ></td>
										<td><?php echo $groupmembers['name']; ?></td>
										<td><?php echo $groupmembers['email']; ?></td>
									</tr>
									<?php endforeach;  } ?>
								</tbody>
							</table>
                            </form>
						</div>
					</section>
					<!-- end: page -->
				</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
        

		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables/extras/TableTools/media/js/TableTools.min.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

        
		<!-- Charts -->
		<!-- <script src="assets/javascripts/ui-elements/examples.charts.js"></script> -->
<?php require("includes/footer.php"); ?>