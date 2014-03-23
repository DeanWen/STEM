<?php
include "layoutTemplate.php";

buildTop();
buildBody();
?>

<form name="form2" method="post" enctype="multipart/form-data" action="upload_excel.php">
<input type="hidden" name="leadExcel" value="people">
<h1>Upload Faculty</h1>
<input type="file" name="inputExcel"><input type="submit" name="import" value="upload">
</form>
<br/>

<form name="form3" method="post" enctype="multipart/form-data" action="upload_excel.php">
<input type="hidden" name="leadExcel" value="school">
<h1>Upload School</h1>
<input type="file" name="inputExcel"><input type="submit" name="import" value="upload">
</form>
<br/>

<form name="form4" method="post" enctype="multipart/form-data" action="upload_excel.php">
<input type="hidden" name="leadExcel" value="department">
<h1>Upload department</h1>
<input type="file" name="inputExcel"><input type="submit" name="import" value="upload">
</form>
<br/>

<form name="form5" method="post" enctype="multipart/form-data" action="upload_excel.php">
<input type="hidden" name="leadExcel" value="fundingsource">
<h1>Upload FundingSource</h1>
<input type="file" name="inputExcel"><input type="submit" name="import" value="upload">
</form>
<br/>


<?
	buildBottom();
?>
