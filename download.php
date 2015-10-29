<?php
header('Content-Type:application/octet-stream');  //ダウンロードの指示
header('Content-Disposition:filename=sec_news.txt');  //ダウンロードするファイル名
header('Content-Length:' . filesize('sec_news.txt'));   //ファイルサイズを指定
readfile("sec_news.txt");  //ダウンロード
?>
