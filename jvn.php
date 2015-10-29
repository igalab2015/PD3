<?php
require_once 'goutte.phar';;
use Goutte\Client;

$url=array();
$title=array();

$client = new Client();
$crawler = $client->request('GET', 'https://jvn.jp/');

$crawler->filter('div#news-list a')->each(function($node)use(&$url,&$title)
{$url[]="https://jvn.jp/".$node->attr('href');
 $title[]=$node->html();
});

for($i=0; $i<=9; $i++){
                $title[$i]=mb_convert_encoding($title[$i], "SJIS", "auto");
		print "<font size=4><b>{$title[$i]}</b></font><br/>";    
    print "<a href=\"{$url[$i]}\">{$url[$i]}</a><br/>";
		print "<br/>";
		print "<br/>";
    
}
?>
