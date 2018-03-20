<?php
include_once('databaseConnection.php');

class printFoldersMenu{

	static function buildMenu(){
		$query='SELECT DISTINCT `folder` FROM `album` ORDER BY `folder` ASC';

		$database=new askDatabase();
		$resultArray=$database->getDataFromDatabase($query); 

		foreach($resultArray[1] as $element){
			echo '<li class="filterMenuButton foldersMenu" onclick=\'showGroup(this)\'>'.ucfirst(substr($element[0],0,20)).'</li>';
		}
	}

}


?>