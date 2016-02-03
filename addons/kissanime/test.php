<?php
 print('<title> Kiss Anime Downloader </title>');
 print('<link rel="stylesheet" href="//cdn-1-x.l0c.biz/index.css">');
 print('<link rel="stylesheet" href="//cdn-1-x.l0c.biz/index.boot.css">');
 print('<div class="main-swift"><p class="main-box"> Kiss Anime Downloader </p>');
 print("<center>");
 // Kiss Anime Grabber + Downloader :)
 class KissAnime {
	   protected static $url;
	   var $ep_1;
	   public $agent = "Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_0 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobile/7A341 Safari/528.16";
          public function __construct($a){
		          $this->url = $this->cURL($a,"1"); 
				   return $this->ep_1 = count($this->url) - 1;
				   //$this->ep_1 = $b;
				   //$this->ep_2 = $c;
		  }
		  private function cURL($a,$x){
			      $ch = curl_init();
				  		 curl_setopt($ch, CURLOPT_URL,$a);
						 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						 curl_setopt($ch, CURLOPT_HEADER, true);
						 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
						 curl_setopt($ch, CURLOPT_USERAGENT,$this->agent);
				  $c = curl_exec($ch);
				  if($x == 1){
				  preg_match_all('/<a href=[\'\"](.*?)[\'\"] title=[\'\"](.*?)[\'\"]>/i',$c,$matches);
				  return $matches[1];
				  }if($x == 0){
					  preg_match('/<select id=[\'\"]selectQuality[\'\"]><option value=[\'\"](.*?)[\'\"]>(.*?)<\/option>/i',$c,$matches);
					  return $matches[1]; }
					  if($x == 3){
						  $curl_info = curl_getinfo($ch);
						  $headers = substr($c, 0, $curl_info["header_size"]);
						  preg_match("!\r\n(?:Location|URI): *(.*?) *\r\n!", $headers, $matches);
						  return $matches[1];
					  }
		  }
		  public function Render($episode){
			       print('<form method="POST" class="main-form">');
				         print('<select name="episode" class="main-input">');
			                  for ($i=9;$i<$episode; $i++) { 
					           print('<option name="'.$this->url[$i].'">'.$this->url[$i].'</option>');
			                  } print('</select><input type="submit" class="btn btn-lg btn-primary btn-block" value="Get URL"></form></form>');
		  }
		  public function Download($episode){
			     $a = $this->cURL("http://kissanime.com".$episode,"0");
				    return $this->cURL(base64_decode($a),"3");
		  }
		  public function Decode($episode){
			      return $this->cURL("http://kissanime.com".$episode,"0");
		  }
 }
if(!isset($_GET["anime"])){
print('<form method="GET" class="main-form">');
print('<input type="url" name="anime" placeholder="Example : http://kissanime.com/Anime/One-Piece-Dub/" class="main-input">');
print('<input type="submit" class="btn btn-lg btn-primary btn-block"></form>');
}else{
$a = new KissAnime($_GET["anime"]);
     print($a->Render($a->ep_1));
           if(isset($_POST["episode"])){
			  $u = $a->Download(urldecode($_POST["episode"]));
			  print('<a href="'.$u.'" class="btn btn-lg btn-primary btn-block"> Download ^_^ </a>');
		   } 
}
 ?>
