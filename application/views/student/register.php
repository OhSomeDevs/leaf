
<?php if (isset($username)){
	echo "You have successfully been added " . $username;
} else {?>
<a href="<?php echo config_item('base_url') ?>teacher/register">register as teacher</a>
<h1> welcome Student</h1>
<form action="<?php echo config_item('base_url') ?>student/add_student" method="post">
	<label for="username">Username: </label> <input type="text" id="username" name="username"> <br>
	<label for="pasword">password: </label> <input type="text" id="password" name="password"><br>
	<label for="firstname">first: </label> <input type="text" id="firstname" name='firstname'><br>
	<label for="lastname">last: </label> <input type="text" id="lastname" name='lastname'><br>
	<label for="course">course: </label> <input type="text" id="course" name='course'><br>
	<label for="email">Email: </label> <input type="text" id="email" name='email'><br>
	<label for="school">school: </label> <input type="text" id="school" name='school'><br>
	<input type="submit" value="go">
</form>

<?php } ?>