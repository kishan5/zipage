<!DOCTYPE html>

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Download As Zip</title>
</head>
<body>
<center><h1>Create Zip</h1></center>
<?php if(!empty($error)) { ?>
<p style=" border:#C10000 1px solid; background-color:#FFA8A8; color:#B00000;padding:8px; width:588px; margin:0 auto 10px;"><?php echo $error; ?></p>
<?php } ?>

<table width="600" border="1" align="center" cellpadding="10" cellspacing="0" style="border-collapse:collapse; border:#ccc 1px solid;">
  <tr>
    <td width="33" align="center">*</td>
    <td width="382">File Name</td>
  </tr>

<form action="test2.php" method="post">
<?php 
session_start();
$conn_id=ftp_connect("localhost") or die("Could not connect");
ftp_login($conn_id,"kishan","ubuntu"); 		//login to ftp localhost

//$a="/var/www/zipper/zipper2/test/test";
$a="/var/www/test/".$_SESSION["dir_name"];
echo "$a";
ftp_chdir($conn_id,"$a");
$contents=ftp_nlist($conn_id,".");
foreach($contents as $file)	//addition of files to zip one-by-one
{
?>
<tr>
    <td align="center"><input type="checkbox" name="files[]" value="<?php echo "$file"; ?>" /></td>
    <td><?php echo $file; ?></td>
  </tr>

<?php } ?>

  <tr>
    <td colspan="3" align="center">

    	<input type="submit" name="createpdf" style="border:0px; background-color:#800040; color:#FFF; padding:10px; cursor:pointer; font-weight:bold; border-radius:5px;" value="Download as ZIP" />&nbsp;
        <input type="reset" name="reset" style="border:0px; background-color:#D3D3D3; color:#000; font-weight:bold; padding:10px; cursor:pointer; border-radius:5px;" value="Reset" />

    </td>


    </tr>
</table>
</form>
</body>
</html>
