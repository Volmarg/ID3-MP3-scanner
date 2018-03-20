<?php
include_once('databaseConnection.php');


class foldersDatabase extends foldersManagement{


	public function insertIntoDatabase($filesData,$filesInFolder,$arrayOfDirs){
		$databaseConnection=new askDatabase();

		$arrayOfFiles_noDuplicates=array_unique($filesData,SORT_REGULAR);

		//Loop for single Album and then over files and structure for it
		foreach($arrayOfFiles_noDuplicates as $num => $subArrays){
			//vars
			$artist='Undefined / Mixed Pack';
			$album='Undefined / Mixed Pack';
			//if not analyzed & extracted
			if(@$subArrays['artist']){
				$artist=@$subArrays['artist'];
			}
			if(@$subArrays['album']){
				$album=@$subArrays['album'];
			}
			//prepare files & structure for input to DB
			$filesInFolderString='';

			foreach($filesInFolder as $file){
				$filesInFolderString.=$file.'<br/>';
			}

			$fullUrl=explode('\\',$arrayOfDirs[0]);
			$category=$fullUrl[2];
			
			

			//database changes
			$querry='INSERT INTO `album` (`autor`,`album`,`struktura`,`utwory`,`folder`) VALUES ("'.$artist.'","'.$album.'","'.$arrayOfDirs[0].'","'.$filesInFolderString.'","'.$category.'");';
			$databaseConnection->modifyDataInDatabase($querry);

		}
	}
}

?>