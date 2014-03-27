
<?php if (isset($username)){
	echo "You have successfully been added " . $username;
} else {?>
<a href="<?php echo config_item('base_url') ?>student/register">register as student</a>
<h1>welcome Teacher</h1>
<form action="add_teacher" method="post">
	<label for="username">Username: </label> <input type="text" id="username" name="username"> <br>
	<label for="pasword">password: </label> <input type="text" id="password" name="password"><br>
	<label for="firstname">first: </label> <input type="text" id="firstname" name='firstname'><br>
	<label for="lastname">last: </label> <input type="text" id="lastname" name='lastname'><br>
	<label for="email">Email: </label> <input type="text" id="email" name='email'><br>
	<input type="submit" value="go">
</form>

<?php } ?>