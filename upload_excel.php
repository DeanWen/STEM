<?
include("uploadFile.php"); 
include "layoutTemplate.php";

buildTop();
buildBody();

if($_POST['import']=="upload"){

	$leadExcel=$_POST['leadExcel'];
	
	if($leadExcel)
	{
		$tmp_name = $_FILES['inputExcel']['tmp_name'];
		
		$msg = uploadFile($tmp_name,$leadExcel);
	}
}

if ($msg == 'success') 
	echo "<h4 class = 'alert_success'> upload successfully </h1>  <br /><br />";
else if ($msg == 'incomplete')
	echo "<h4 class = 'alert_warning'> A part of data may not upload successfully </h1> <br /> <br />";
else
	echo "<h4 class = 'alert_error'> fail to upload </h1> <br /> <br />";

?>


<?
	buildBottom();
?>