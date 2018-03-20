<?php
include_once('coverFetch.php');
include_once('folderPrint.php');
include_once('databaseConnection.php');
include_once('folderToDatabase.php');
include_once('fileFetch.php');

class foldersManagement{
	public $testVar='test';
	public $albums=array();
	public $arrayOfFilesData=array();
	public $arrayOfFilesInFolder=array();
	public $arrayOfDirs=array();
	public $arrayOfFullPath=array();

//----->
	public function getFoldersData($folder){

		//Clear vars
		$this->arrayOfFilesData=array();
		$this->arrayOfFilesInFolder=array();
		$this->arrayOfDirs=array();
		$this->arrayOfFullPath=array();

		//Files Vars

		$openedDir=scandir($folder);

		//recursive folder and files scan
		foreach($openedDir as $numer=>$value){
			if(!in_array($value,array(".",".."))){
				if(is_dir($folder.DIRECTORY_SEPARATOR.$value)){
					$arrayOfDir[$value]=$this->getFoldersData($folder.DIRECTORY_SEPARATOR.$value);			
				}
				else{
				//save info about folders content
					$this->arrayOfFullPath[]=$folder.'\\'.$value;
					$this->arrayOfDirs[]=$folder;
					$this->arrayOfFilesInFolder[]=$value;


				//get info about file
					$fileManage=new filesManagement;

					//be sure if it's mp3 else will print undefined data
					if(strpos($value,'.mp3')){
						$this->arrayOfFilesData[]=$fileManage->getFileData($folder.'\\'.$value);
					}

				}

			}
		}
		echo($this->arrayOfFilesData.$this->arrayOfFilesInFolder.$this->arrayOfDirs);
	//---------crud to DB
	$folderToDatabase=new foldersDatabase;
	$folderToDatabase->insertIntoDatabase($this->arrayOfFilesData,$this->arrayOfFilesInFolder,$this->arrayOfDirs);


	}

//----->
	private function databaseHandle($file){

	}

}

?>