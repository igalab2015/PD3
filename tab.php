<html>
<head>
<h1>�Z�L�����e�B�����W�c�[��</h1>
<script type="text/javascript">
function ChangeTab(tabname) {
   // �S������
   document.getElementById('tab1').style.display = 'none';
   document.getElementById('tab2').style.display = 'none';
   document.getElementById('tab3').style.display = 'none';
   document.getElementById('tab4').style.display = 'none';
   // �w��ӏ��̂ݕ\��
   document.getElementById(tabname).style.display = 'block';
}
</script>


<style type="text/css">
/* �^�u���� */
p.tabs { margin: 0px; padding: 0px; }
p.tabs a {
   display: block; width: 5em; float: left;
   margin: 0px 1px 0px 0px; padding: 3px;
   text-align: center;
}
p.tabs a.tab1 { background-color: blue; color: white; }
p.tabs a.tab2 { background-color: #aaaa00; color:white;}
p.tabs a.tab3 { background-color: red; color: white; }
p.tabs a.tab4 { background-color: green; color: white; }
p.tabs a:hover { color: yellow; }

/* �^�u���g�̃{�b�N�X */
div.tab { height: auto; overflow: auto; clear: left; }
div#tab1 {
   border: 2px solid black; background-color: white;
}
div#tab2 {
   border: 2px solid black; background-color: white;
}
div#tab3 {
   border: 2px solid black; background-color: white;
}
div#tab4 {
   border: 2px solid black; background-color: white;
}
div.tab p { margin: 0.5em; }
</style>


</head>
<body>


<div class="tabbox">
   <p class="tabs">
      <a href="#tab1" class="tab1" onclick="ChangeTab('tab1'); return false;">�j���[�X</a>
      <a href="#tab2" class="tab2" onclick="ChangeTab('tab2'); return false;">�Ǝ㐫</a>
      <a href="#tab3" class="tab3" onclick="ChangeTab('tab3'); return false;">twitter</a>
      <a href="#tab4" class="tab4" onclick="ChangeTab('tab4'); return false;">�ۑ�</a>
   </p>
   <div id="tab1" class="tab">
			<?php
			include "scannet.php";
			include "news.php";
			include "ZDnet.php";
			include "twitterget.php";
			?>
   </div>
   <div id="tab2" class="tab">
	 	<?php
			include "jvn.php";
			?>
   </div>
   <div id="tab3" class="tab">
		<?php
			include "twitter.php"
?>
   </div>
   <div id="tab4" class="tab">
   <?php
      print "�ۑ��������ƃe�L�X�g�t�@�C�����_�E�����[�h����܂��B<br/>";
      include "textout.php";
   ?>
�@<a href="http://igaigaver1.pupu.jp/download.php">�ۑ�</a>

</div>
</div>

<script type="text/javascript">
  // �f�t�H���g�̃^�u��I��
  ChangeTab('tab1');
</script>

</body>
</html>
