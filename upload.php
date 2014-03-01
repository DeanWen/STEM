<?php
include "layoutTemplate.php";

buildTop();
buildBody();
?>

<form name="form2" method="post" enctype="multipart/form-data" action="upload_excel.php">
<input type="hidden" name="leadExcel" value="true">


<h1>Upload Faculty</h1>
<input type="file" name="inputExcel"><input type="submit" name="import" value="upload">
<!--
<h1>Upload Faculty</h1>
<input type="file" name="inputExcel"><input type="submit" name="import1" value="upload1">

<h1>Upload Faculty</h1>
<input type="file" name="inputExcel"><input type="submit" name="import2" value="upload2">
-->
</form>
<br/>


<?
	buildBottom();
?>
