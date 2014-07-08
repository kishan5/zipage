<?php
session_start();

	$error = "";		//error holder
	if(isset($_POST['createpdf']))
	{
		$post = $_POST;		
		$file_folder = "test/".$_SESSION["dir_name"]."/";	// folder to load files
		echo $file_folder;
		
		if(extension_loaded('zip'))

		{	// Checking ZIP extension is available
			echo "checking";
			if(isset($post['files']) and count($post['files']) > 0)
			{	echo "/checking2";// Checking files are selected
				$zip = new ZipArchive();			// Load zip library	
				$zip_name = time().".zip";			// Zip name
				
				if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
				{	
					// Opening zip file to load files
					echo "* Sorry ZIP creation failed at this time<br/>";

				}
				
				foreach($post['files'] as $file)
				{	echo "added";			
					$zip->addFile($file_folder);			// Adding files into zip
//					$zip->addFile($file);			// Adding files into zip
//					$zip->addFile("$file");
				}
				$zip->close();
				if(file_exists($zip_name))
				{
					// push to download the zip
					header('Content-type: application/zip');
					header('Content-Disposition: attachment; filename="'.$zip_name.'"');
					readfile($zip_name);
					// remove zip file is exists in temp path
					unlink($zip_name);
				}
				
			}else
				echo "* Please select file to zip <br/>";
		}else
			echo "* You dont have ZIP extension<br/>";
	}

?>
