<?php 
include_once('../folderPrint.php');
include_once('../folderFetch.php');

@$route=$_GET['route'];
@$orderby=$_GET['orderby'];

if(@$route=='refresh'){
	$printFolder=new printFolder();
	$printFolder->buildAlbumsTreeDB(@$orderby);
}elseif(@$route=='scan'){
	$foldersMange=new foldersManagement();		
	$foldersMange->getFoldersData('E:\Muzyka'); 	
}


?>
