<h1>welcome back teacher</h1>
<form action="<?php echo config_item('base_url') ?>teacher/login_teacher" method="post">
	<label for="username">Username: </label> <input type="text" id="username" name="username"> <br>
	<label for="pasword">password: </label> <input type="text" id="password" name="password"><br>
	<input type = "submit" values="login">
</form>