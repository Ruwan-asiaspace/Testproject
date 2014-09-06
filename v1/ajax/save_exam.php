<?php
require_once '../config.php';
$auth=new Auth();
require_once '../classes/taketest.class.php';
$objUser = new Taketest();
$answers=isset($_POST['answers'])?$_POST['answers']:array();
$result = $objUser->save_answer($auth->get("id"),$answers);
echo json_encode(array("status"=>"success"));
?>