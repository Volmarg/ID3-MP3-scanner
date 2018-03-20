<?php 

interface coverRules{
	public function getPageContent($artist,$album);
}

class fetchingCover implements coverRules{
	

//----->
	public function getPageContent($artist,$album){
		$pageBase='http://www.last.fm/music/';
		$albumUrl=$this->buildUrl($artist,$album);

		$coverPage=file_get_contents($pageBase.$albumUrl);
		return $this->extractCover($coverPage);
	}
//----->
	private function extractCover($page){
		$matchExtraction='<img src="(.*)"(.*)class="cover-art"/>';
		preg_match('#'.$matchExtraction.'#Usmi',$page,$content);

		if(@$content[1]==null || @$content[1]==false || @$content[1]==''){
			$extractedCover='';
		}else{
			$extractedCover=@$content[1];
		}

		return $extractedCover;

	}

	private function buildUrl($artist,$album){
		$albumUrl=str_replace(' ','+',$artist).'/'.str_replace(' ','+',$album);
		$albumUrl=preg_replace('#\+\[([^\]]*)\]#Usmi','',$albumUrl);

		return $albumUrl;
	}
//----->
	
}

?>