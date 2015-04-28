<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DVD/xhtml1-transitional.dtd">
<html>
<head>
	<title>お友達</title>
</head>
<body>
	<h1>友達情報</h1>

	<form action="areas.php" method="post">
		<input type= "submit" name="submit" value="戻る">	
	
	</form>

	</body>
	</html>

<?php

$link = mysql_connect('localhost','root','tetu1129');//データベース接続オブジェクト
		
		if(!$link){  //if(!$link)⇨if($link!=true) !は否定
			die('データベースに接続できません:'.mysql_error());

		}

         mysql_select_db("FriendsSystem",$link);
　　　　
         $errors = array();　tml>




?>