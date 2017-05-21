<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 21/05/2017
 * Time: 10:58
 */

echo <<<LOGIN
    <div>
	<h1>Login</h1>
	<form name="login-form" onsubmit="return checkLogin()" method="post" action="checkLogin.php">
		<p>
			<input type="text" name="loginUsername" id="loginUsername" placeholder="Username" >
		</p>
		<p>
			<input type="password" name="loginPassword" id="loginPassword" placeholder="Password">
		</p>
			<span><input type="checkbox" name="loginkeep" id="loginkeep" value="1"></span>
			<span>Remember Me</span>
		<p>
			<button type="submit">
				accedi
			</button>
		</p>

	</form>
</div>
LOGIN;
