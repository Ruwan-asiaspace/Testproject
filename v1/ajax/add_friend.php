<?php
require_once '../config.php';
$auth=new Auth();
require_once '../classes/users.class.php';
$objUser = new User();
$result = $objUser->add_user($auth->get("id"),$req->get("friend_id"));
echo json_encode(array("status"=>"success"));
?>