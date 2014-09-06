<?php
include_once 'config.php';

//check whether the user logged in
$auth = new Auth();
$auth->isLoggedIn();
//define page title
$page_title="My Metrik | Add Users";
//define main side bar tab
$active_nav="user_management";

include_once 'classes/users.class.php';
$user = new User();
if (!$req->isNull($req->get('friend_id', 'int'))) {
    $user_id = $req->get('friend_id', 'int');
    $friend_id = $user->add_user($auth->get("id"), $user_id);
}

$users = $user->get_all_user($auth->get("id"), 0, 20);
include_once "includes/header.php";
?>

<!-- start: sidebar -->
<?php include("includes/sidebar.php"); ?>
<!-- end: sidebar -->

<section role="main" class="content-body">
    <header class="page-header">
        <h2>User</h2>
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li>
                    <a href="user.php">User</a>
                </li>
                dsdsd
                <li><span>Add User</span></li>
            sdsds
            </ol>
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-6 col-lg-12 col-xl-6">
            <section class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <section class="panel form-wizard" id="w1">
                                    <div class="panel-body panel-body-nopadding">
                                        <div class="wizard-tabs">
                                            <ul class="wizard-steps">
                                                <li class="active">
                                                    <a href="#w1-search" data-toggle="tab" class="text-center">
																		Search
                                                    </a>
                                                </li>
                                                dsd
                                                <li>
                                                    <a href="#w1-inviteuser" data-toggle="tab" class="text-center">
																		Invite User
                                                    </a>
                                                </li>
                                            sdsdsd
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div id="w1-search" class="tab-pane active">
                                                <div class="col-md-9">
                                                    <div class="input-group input-search">
                                                        <input type="text" class="form-control" name="q" id="q" placeholder="or search for users">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default" id="search" type="submit"><i class="fa fa-search"></i></button>
                                                        </span>
                                                    </div>
                                                </div>	
                                                <br /><br /><br />
                                                <div id="users">
												</div>
                                            </div>
                                            <div id="w1-inviteuser" class="tab-pane">
															Invite users that are not in your list.sdsd<br />
                                                <form class="form-horizontal form-bordered" method="post">
                                                    <div class="form-group">
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="3" id="textareaDefault"></textarea>
																		User will be added once they accept the request.<br />
                                                        </div>
                                                    </div>

                                                    <button class="btn btn-primary btn-xs" name="invite" id="invite">&nbsp;&nbsp;Invite&nbsp;&nbsp;</button>
                                                </form>
                                            </div>
                                        </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>
<!-- END: PAGE -->





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


<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>


<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>


<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>

<script>
    $(function(){
        $('#q').on('change', function(e){
            var typed_val = $('#q').val();
            e.preventDefault();
            $.ajax({
                url: 'ajax/getUsers.php',
                type: 'post',
                data: {'typed_val':typed_val},
                success: function(data, status) {
                    $('#users').html(data);
                }
            }); // end ajax call
        });
    });
	function add(id)
	{
            $.ajax({
                url: 'ajax/add_friend.php',
                type: 'get',
                data: {'friend_id':id},
                success: function(data, status) {
                    alert("Friend added successfully");
					$("#user"+id).remove();
                }
            }); // end ajax call
	}
</script>


<?php require 'includes/footer.php'; ?>