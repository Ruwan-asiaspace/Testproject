<?php
require_once '../config.php';
require_once '../classes/users.class.php';
$auth=new Auth();
$objUser = new User();
$result = array();
$result = $objUser->get_user_by_name($_REQUEST['typed_val'],$auth->get("id"));
    

?>

<?php
foreach ($result as $user):
    ?>
	<div id="user<?php echo $user['id']; ?>">
        <section class="panel  border">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="">
                        <img src="<?php echo $user['profile_pic']; ?>" style="width:90px; height:90px;">				
                    </div>
                </div>
                <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <table class="">
                        <tr>
							<td><?php echo $user['name']; ?></td>
			            </tr>
			            <tr>
		                    <td><?php echo $user['email']; ?></td>
						</tr>
				        <tr>
				            <td align="left">
								<a class="btn btn-primary btn-xs" onclick="add('<?php echo $user['id']; ?>');return false;" name="add" id="add"  href="?friend_id=<?php echo $user['id']; ?>">&nbsp;&nbsp;Add&nbsp;&nbsp;</a>
							</td>
						</tr>
				    </table>
                </div>
            </div>
        </section>
    </div>
    <?php
endforeach;
?>
