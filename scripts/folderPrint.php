<?php
include_once('databaseConnection.php');

class printFolder{

//----->
	public function buildAlbumsTreeDB($orderBy){
		//This is the section for Ajax
		$query='SELECT DISTINCT * FROM `album` ORDER BY `'.$orderBy.'` ASC';

		$database=new askDatabase();
		$resultArray=$database->getDataFromDatabase($query); //this array contains ($tableNames,$fetchedArray,$dimmension2)
															 //[0] songs list [1] structure list [2] author [3] album

		
		foreach($resultArray[1] as $num => $subArrays){
		//vars
		$artist='Undefined / Mixed Pack';
		$album='Undefined / Mixed Pack';
		//if not analyzed & extracted
		if(@$subArrays[2]){
			if(strlen(@$subArrays[2])>40){
				$artist=substr(@$subArrays[2],0,44).'...';				
			}else{
				$artist=@$subArrays[2];
			}
		}
		if(@$subArrays[3]){
			if(strlen(@$subArrays[3])>40){
				$album=substr(@$subArrays[3],0,44).'...';				
			}else{
				$album=@$subArrays[3];
			}

		}

		//Groupings
		$groupIdentifier=$this->echoGroups($resultArray,$num,$orderBy);

		//build album and groups
		$this->echoAlbums($groupIdentifier,$artist,$album,@$subArrays);


		}	

	}

//----->
private function echoAlbums($groupIdentifier,$artist,$album,$subArrays){
		//mb_convert_encoding 
	echo '<div class="singleAlbum show" data-group-element="'.ucfirst($groupIdentifier).'">';
		echo "<div class='aboutAlbum'>";

			echo '<div>
					<b> Artist: </b>'.$artist.'
				  </div> 
				  
				  <div> 
					<b> Album: </b>'.$album.'
				  </div>';

	        echo "</div>";

	echo "<div class='aboutFilesStructure'>";			
		echo '<section class="tracks section">';
			echo '<show-tracks ng-controller="controllListingButton as controllListingButton"><button class="icon">♫</button></show-tracks>';
			echo '<tracks-listing>';
				echo '<b> Tracks List </b> <div class="tracks listing">'; echo @$subArrays[0]; echo '</div>';
			echo '</tracks-listing>';
		echo '</section>';

		echo '<section class="structure section">';
			echo '<show-structure ng-controller="controllListingButton as controllListingButton"><button class="icon">📁</button></show-structure>';
			echo '<structure-listing>';
				echo '<b> Structure List </b> <div class="structure listing">'; echo @$subArrays[1]; echo '</div>';
			echo '</structure-listing>';
		echo '</section>';

		echo "</div>";
	echo "</div>";
}

//----->
private function echoGroups($resultArray,$num,$orderBy){
			

	if($orderBy=='autor'){// by first letters

			//#Get first letters
			$firstLetterThis=substr(@$resultArray[1][$num][2],0,1);
			if($num!=0){
				$firstLetterPrevious=substr(@$resultArray[1][$num-1][2],0,1);
			}

			//#Group separator builder
			$groupIdentifier='';
			if(is_numeric($firstLetterThis)){
				$groupIdentifier='0-9';
			}elseif($firstLetterThis=='['){//to trzeba rozbudować
				$groupIdentifier='[/,';
			}else{
				$groupIdentifier=$firstLetterThis;
			}
			//#Declare if numeric or special and overrite
			if(is_numeric($firstLetterThis)){
				$firstLetterThis='0-9';
			}
			if(is_numeric(@$firstLetterPrevious)){
				@$firstLetterPrevious='0-9';
			}

			//#Check differenece between this/previous and print
			$this->printSeparators($firstLetterThis,@$firstLetterPrevious,$groupIdentifier,$num);

	}elseif($orderBy=='folder'){// by full name
			$thisFolder=@$resultArray[1][$num][4];
			@$previousFolder=$resultArray[1][$num-1][4];
			$groupIdentifier=$thisFolder;

			$this->printSeparators($thisFolder,@$previousFolder,$groupIdentifier,$num);

	}

	return $groupIdentifier;
}

//----->
private function printSeparators($thisVersion,$previousVersion,$groupIdentifier,$num){
	if($thisVersion!=@$previousVersion && $num>0){
		echo '<div class="groupSeparator show" data-group-wrapper="'.ucfirst($groupIdentifier).'"><span class="button">'.ucfirst($groupIdentifier).'</span></div>';		
	}elseif($num==0){
		echo '<div class="groupSeparator show" data-group-wrapper="'.ucfirst($groupIdentifier).'"><span class="button">'.ucfirst($groupIdentifier).'</span></div>';
	}
}


//----->
	public function buildFoldersTree($folders){

		foreach($folders as $directory){
			echo $directory.'<br/>';
		}

	}

//----->
	public function listData($data){

		foreach($data as $info){
			echo $info.'<br/>';
		}

	}

}

?>