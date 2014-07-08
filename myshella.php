<?php
	session_start();
	
	$url=$_POST[name1];
	$_SESSION["dir_name"]=time();

	$output = shell_exec("./myshella.sh {$url} {$_SESSION["dir_name"]}");
	echo "<br>"."job done";
	echo session_id();

?>



<form action="test1.php" method="post">
<input type = "submit" value = "Submit">  
</form>

