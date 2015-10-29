<html>
<body>
<?php
require_once 'goutte.phar';;
use Goutte\Client;

$fp = fopen("sec_news.txt", "w");

$title=array();
$title2=array();
$title3=array();
$explain=array();
$explain2=array();
$explain3=array();
$url=array();
$url2=array();
$url3=array();


//scannet
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

//zdnet
$crawler = $client->request('GET', 'http://japan.zdnet.com/security/');

//タイトル,URL抽出
$crawler->filter('div.tag_title a')->each(function($node)use(&$url2,&$title2)
{$url2[]="http://japan.zdnet.com/".$node->attr('href');
 $title2[]=$node->text();
});

//本文抽出
$crawler->filter('p.summary')->each(function($node)use(&$explain2)
{$explain2[]=$node->text();
});

//securitynews
$crawler = $client->request('GET', 'http://securityblog.jp/news/');

//タイトル,URL抽出
$crawler->filter('div.section dt  a')->each(function($node)use(&$url3,&$title3)
{$url3[]=$node->attr('href');
 $title3[]=$node->text();
});

//本文抽出
$crawler->filter('dd.excerpt')->each(function($node)use(&$explain3)
{$explain3[]=$node->text();
});


if ($fp){
    if (flock($fp, LOCK_EX)){
		fwrite($fp,'Scan NetSecurity'."\r\n\r\n");
		for($i=0;$i<=4;$i++){
        		fwrite($fp,$title[$i]."\r\n");
      			fwrite($fp,$explain[$i]."\r\n");
			fwrite($fp,$url[$i]."\r\n");
			fwrite($fp,"\r\n");
		}
		fwrite($fp,'ZDnet Japan'."\r\n\r\n");
		for($i=0;$i<=4;$i++){
        		fwrite($fp,$title2[$i]."\r\n");
      			fwrite($fp,$explain2[$i]."\r\n");
			fwrite($fp,$url2[$i]."\r\n");
			fwrite($fp,"\r\n");
		}
		fwrite($fp,'Security_News'."\r\n\r\n");
		for($i=0;$i<=4;$i++){
        		fwrite($fp,$title3[$i]."\r\n");
      			fwrite($fp,$explain3[$i]."\r\n");
			fwrite($fp,$url3[$i]."\r\n");
			fwrite($fp,"\r\n");
		}
        flock($fp, LOCK_UN);
    }
}
$flag = fclose($fp);
?>
</body>
</html>
