<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>tweetpost</title>
</head>
<body>
<?php
//twitteroauth.php���C���N���[�h���܂��B�t�@�C���ւ̃p�X�͂������Ō��߂ĉ������B
require_once("twitteroauth.php");

//TwitterAPI�J���҃y�[�W�ł��m�F�������B
//Consumer key�̒l���i�[
$sConsumerKey = "9V0dE5N4nFJebUKFc8EJTLDS0";
//Consumer secret�̒l���i�[
$sConsumerSecret = "j9jDLhAWsm3hdaIHn8GN0g4N60kIYuTB5K4MwYC4Ci6MfmWPbN";
//Access Token�̒l���i�[
$sAccessToken = "2892522541-e32VX7fKFT2qZZyFIh5VhwJ1jAbEIgLaGt89gzS";
//Access Token Secret�̒l���i�[
$sAccessTokenSecret = "87ysidiYkKn272ZYYDRLBofvOojOm64SoElrRAib3dE2a";

//OAuth�I�u�W�F�N�g�𐶐�����
$twObj = new TwitterOAuth($sConsumerKey,$sConsumerSecret,$sAccessToken,$sAccessTokenSecret);

// �t�@�C���̍s�������_���ɒ��o
$filelist = file('twitterget.txt');
if( shuffle($filelist) ){
  $message = $filelist[0];
}

//�ꂫ��POST����API
$sTweet = $message."(".date('Y-m-d H:i:s').")";
mb_language("Japanese"); 
$sTweet = mb_convert_encoding($sTweet, "UTF-8", "auto");
$vRequest = $twObj->OAuthRequest("https://api.twitter.com/1.1/statuses/update.json","POST",array("status" => $sTweet));

//Json�f�[�^���I�u�W�F�N�g�ɕύX
$oObj = json_decode($vRequest);

?>

<?php
$sTweet = mb_convert_encoding($sTweet, "UTF-8", "auto");
$to = 'nagao.toshiki@gmail.com';
$title = '�Z�L�����e�B���';
$mess = $sTweet;
$header = 'From:info@igaigaver1.pupu.jp' . "\r\n";
$header .= 'Return-Path:nagao.toshiki@gmail.com';
mb_send_mail($to, $title, $mess, $header);


print"sousin";
?>


</body>
</html>
