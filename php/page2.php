<?php
/**
* This page will save username/password data in cookies if remember box is checked
* If remember box is not checked, cookies will be cleared/deleted.
* Website: www.TutorialsClass.com
* Tutorial Link: https://tutorialsclass.com/code/php-login-remember-cookies-script/
**/

if(!empty($_POST["username"])) {
	setcookie ("username",$_POST["username"],time()+ 3600);
	//setcookie ("password",$_POST["password"],time()+ 3600);
	echo "Cookies Set Successfuly";
	echo $_POST["username"];
} else {
	setcookie("username","");
//	setcookie("password","");
	echo "Cookies Not Set";
}

?>

<p><a href="page1.php"> Go to Login Page </a> </p>
