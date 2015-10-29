<h2>ZDnet</h2>
<?php
require_once 'goutte.phar';;
use Goutte\Client;

$url=array();
$title=array();
$explain=array();
$jpg=array();

$client = new Client();
$crawler = $client->request('GET', 'http://japan.zdnet.com/security/');

//タイトル,URL抽出
$crawler->filter('div.tag_title a')->each(function($node)use(&$url,&$title)
{$url[]="http://japan.zdnet.com/".$node->attr('href');
 $title[]=$node->text();
});

//本文抽出
$crawler->filter('p.summary')->each(function($node)use(&$explain)
{$explain[]=$node->text();
});

//画像抽出
$crawler->filter('div.img_l img')->each(function($node)use(&$jpg)
{$jpg[]="http://japan.zdnet.com/".$node->attr('src');
});

for($i=0; $i<=4; $i++){
		print "<a href=\"{$url[$i]}\"><img src=\"{$jpg[$i]}\"></a><br/>";
		$title[$i] = mb_convert_encoding($title[$i], "SJIS", "auto");
		print "<font size=4><b><a href=\"{$url[$i]}\">{$title[$i]}</a></b></font><br/>";
	  $explain[$i] = mb_convert_encoding($explain[$i], "SJIS", "auto");
		print "{$explain[$i]}<br/>";    
		print "<br/>";
		print "<br/>";
    
}
?>
