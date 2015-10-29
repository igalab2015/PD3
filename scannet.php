<h2>ScanNet</h2>
<?php
require_once 'goutte.phar';;
use Goutte\Client;

$url=array();
$title=array();
$explain=array();
$jpg=array();


$client = new Client();
$crawler = $client->request('GET', 'http://scan.netsecurity.ne.jp/');

//タイトル,URL抽出
$crawler->filter('div.newslistHeadline a')->each(function($node)use(&$url,&$title)
{$url[]="http://scan.netsecurity.ne.jp".$node->attr('href');
 $title[]=$node->html();
});

//本文抽出
$crawler->filter('div.newslistExplain p')->each(function($node)use(&$explain)
{$explain[]=$node->text();
});

//画像抽出
$crawler->filter('div.newslistImage')->each(function($node)use(&$jpg)
{$jpg[]=$node->html();
});


for($i=0; $i<=4; $i++){
 if($jpg[$i]=="<br/>"){
        print "{$title[$i]}<br/>";
	}else{
	  print "{$jpg[$i]}<br/>";
		$title[$i] = mb_convert_encoding($title[$i], "SJIS", "auto");
		print "<font size=4><b><a href=\"{$url[$i]}\">{$title[$i]}</a></b></font><br/>";
	}	
	  $explain[$i] = mb_convert_encoding($explain[$i], "SJIS", "auto");
		print "{$explain[$i]}<br/>";    
		print "<br/>";
		print "<br/>";
    
}
?>
