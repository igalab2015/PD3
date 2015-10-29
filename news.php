<h2>セキュリティニュース</h2>
<?php
require_once 'goutte.phar';;
use Goutte\Client;

$url=array();
$title=array();
$explain=array();
$jpg=array();


$client = new Client();
$crawler = $client->request('GET', 'http://securityblog.jp/news/');

//タイトル,URL抽出
$crawler->filter('div.section dt  ')->each(function($node)use(&$url,&$title)
{$url[]=$node->attr('a href');
 $title[]=$node->html();
});

//本文抽出
$crawler->filter('dd.excerpt')->each(function($node)use(&$explain)
{$explain[]=$node->text();
});

//画像抽出
$crawler->filter('div.photo')->each(function($node)use(&$jpg)
{$jpg[]=$node->html();
});


for($i=0; $i<=5; $i++){
	  	print "{$jpg[$i]}<br/>";

                $title[$i]=mb_convert_encoding($title[$i], "SJIS", "auto");
		print "<font size=4><b>{$title[$i]}</b></font><br/>";
	
                $explain[$i]=mb_convert_encoding($explain[$i], "SJIS", "auto");
		print "{$explain[$i]}<br/>";    
                print "<a href=\"{$url[$i]}\">{$url[$i]}</a><br/>";

		print "<br/>";
		print "<br/>";
    
}
?>
