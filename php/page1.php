<?php
/**
* Script Name: PHP Form Login Remember Functionality with Cookies
* We will create a form with username & password fields. User can fill details & click on login/submit button. After login/submission, form data will be passed/redirected to another page (page2.php).  This form will show recent username/password automatically, if user has clicked remember me before.
* Website: www.TutorialsClass.com
* Tutorial Link: https://tutorialsclass.com/code/php-login-remember-cookies-script/
**/
?>
<form action="page2.php" method="post" style="border: 2px dotted blue; text-align:center; width: 400px;">
	<p>
		Username: <input name="username" type="text" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
	</p>
	<p>Password: <input name="password" type="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
	</p>
	<p><input type="checkbox" name="remember" /> Remember me
	</p>
	<p><input type="submit" value="Login"></span></p>       
</form>