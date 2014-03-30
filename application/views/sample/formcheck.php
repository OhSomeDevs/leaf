<?php /*if(isset($user) ): ?>
	<?php echo $user ?>
<?php else: ?>

<form action="form_check" method="post">
	<label>username</label> <input type="text" id="name" name="username"> <br>
	<label>Password</label> <input type="password" id="name" name="password"> <br>
	<input type="submit" value="go">
</form>

<?php endif; */
if($count == 1):
	echo $choices->answer_text . "<br>";
elseif($count < 1):
	echo "No Result Found!!!";
else:
	foreach($choices as $choice)
		echo $choice->answer_text . "<br>";
endif;
?>