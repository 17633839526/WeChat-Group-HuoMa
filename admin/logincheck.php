<?php
// 里客云科技开发
// www.likeyun.cn
// 作者：TANKING
// 请保留版权信息
// 仅用于学习用途
// 基于php5.6开发
// 前端使用Bootstrap4.0
header("Content-type:application/json");
// 数据库配置
require_once("../MySql.php");
$adminuser = $_POST["user"];
$adminpsw = $_POST["pwd"];
if($adminuser == "" && $adminpsw == ""){
	$result = array(
		"result" => "101",
		"msg" => "账号和密码不得为空"
	);
}else if($adminuser == ""){
	$result = array(
		"result" => "102",
		"msg" => "账号不得为空"
	);
}else if ($adminpsw == "") {
	$result = array(
		"result" => "103",
		"msg" => "密码不得为空"
	);
}else if ($adminuser == $adminusername && $adminpsw == $adminpassword){
	$result = array(
		"result" => "100",
		"msg" => "登录成功"
	);
	session_start();
	$_SESSION["huoma.admin"] = $adminuser;
}else{
	$result = array(
		"result" => "104",
		"msg" => "账号或密码错误，登录失败"
	);
}
echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>