<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 21/05/2017
 * Time: 10:56
 */

echo <<<REGISTRATION
    <div>
	<h1>Registration</h1>
	<form name="register-form" onsubmit="return checkReg()" method="post" action="checkReg.php">
		<p>
			<input type="text" name="regUsername" id="regUsername" placeholder="Username" >
		</p>
		<p>
			<input type="mail" name="mail1" id="mail1" placeholder="Mail" >
		</p>
		<p>
			<input type="mail" name="mail2" id="mail2" placeholder="Repeat Mail" >
		</p>
		<p>
			<input type="password" name="password1" id="password1" placeholder="Password" >
		</p>
		<p>
			<input type="password" name="password2" id="password2" placeholder="Repeat Password">
		</p>
		<p>
			<button type="submit">
				Register
			</button>
		</p>
	</form>
</div>
REGISTRATION;
?>
