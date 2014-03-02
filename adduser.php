<?php
include "layoutTemplate.php";
buildTop();
buildBody();
?>
<form id="add_new_user" method="post" enctype="multipart/form-data" action="upload_excel.php">
	<table class="tablesorter" cellspacing="0">
		<tbody>
			<tr><th>Username</th><td><input></td></tr>
			<tr><th>Passcode</th><td><input></td></tr>
			<tr><th>First Name</th><td><input></td></tr>
			<tr><th>Last Name</th><td><input></td></tr>
			<tr><th>Admin Level</th><td><input></td></tr>
		</tbody>
	</table>
	<div align="center">
		<br />
		<input type="submit" name="submit" value="submit" class="alt_btn">
		<input type="reset" name="reset" value="reset">
	</div>
</form>
<br />
<?
buildBottom();
?>