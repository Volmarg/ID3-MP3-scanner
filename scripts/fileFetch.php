<?php
include_once('../../config.php');

class filesManagement{

//----->
	public function getFileData($file){
//PEAR || way much faster
		$mp3Reader=new MP3_Id();
		$mp3Reader->read($file);

		//Returned info builder
		$tagArtist=$mp3Reader->getTag('artists');
		$tagAlbum=$mp3Reader->getTag('album');
		$tagName=$mp3Reader->getTag('name');
		$tagGenre=$mp3Reader->getTag('genre');
		$tagBitrate=$mp3Reader->getTag('bitrate');
		
//SourceForge || slow
			$forgeFile=str_replace('\\','/',$file);
			$getID3 = new getID3;
			$ThisFileInfo = $getID3->analyze($forgeFile);
			getid3_lib::CopyTagsToComments($ThisFileInfo);

			$forgeTagArtist=htmlentities(!empty($ThisFileInfo['comments_html']['artist']) ? implode('', $ThisFileInfo['comments_html']['artist']): chr(160)).'';
			$forgeTagAlbum=htmlentities(!empty($ThisFileInfo['comments_html']['album'])  ? implode('', $ThisFileInfo['comments_html']['album']): chr(160)).'';

		//Get Cover

		$infoReturn=array(
		'artist'=> $forgeTagArtist,
		'album' => $forgeTagAlbum
		);

		return $infoReturn;
	}

}

?>