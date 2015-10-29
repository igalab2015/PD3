<html>
<body>
<?php
require_once 'goutte.phar';;
use Goutte\Client;

$fp = fopen("twitterget.txt", "w");

$title=array();
$title2=array();
$title3=array();
$url=array();
$url2=array();
$url3=array();


$client = new Client();
$crawler = $client->request('GET', 'http://scan.netsecurity.ne.jp/');

//タイトル,URL抽出
$crawler->filter('div.newslistHeadline a')->each(function($node)use(&$url,&$title)
{$url[]="http://scan.netsecurity.ne.jp".$node->attr('href');
 $title[]=$node->html();
});



$crawler = $client->request('GET', 'http://japan.zdnet.com/security/');

//タイトル,URL抽出
$crawler->filter('div.tag_title a')->each(function($node)use(&$url2,&$title2)
{$url2[]="http://japan.zdnet.com/".$node->attr('href');
 $title2[]=$node->text();
});

//securitynews
$client = new Client();
$crawler = $client->request('GET', 'http://securityblog.jp/news/');

//タイトル
$crawler->filter('div.section dt  ')->each(function($node)use(&$title3)
{$title3[]=$node->text();
});

//URL
$crawler->filter('div.section dt a')->each(function($node)use(&$url3)
{$url3[]=$node->attr('href');
});

if ($fp){
    if (flock($fp, LOCK_EX)){
		for($i=0;$i<=4;$i++){
        		fwrite($fp,$title[$i]." ");
			fwrite($fp,$url[$i]."\r\n");
		}
		for($i=0;$i<=4;$i++){
        		fwrite($fp,$title2[$i]." ");
			fwrite($fp,$url2[$i]."\r\n");
		}
		for($i=0;$i<=4;$i++){
        		fwrite($fp,$title3[$i]." ");
			fwrite($fp,$url3[$i]."\r\n");
		}
        flock($fp, LOCK_UN);
    }else{
    }
}
$flag = fclose($fp);
?>
</body>
</html>
