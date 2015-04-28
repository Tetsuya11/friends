<?php

$link = mysql_connect("localhost","root","tetu1129");//データベース接続オブジェクト
	
		if(!$link){  //if(!$link)⇨if($link!=true) !は否定
			die('データベースに接続できません:'.mysql_error());

		}
$sql = "SET NAMES utf8"; //文字化け解消
$result = mysql_query($sql);////ソフトウェアに対するデータの問い合わせや要求などを一定の形式で文字に表したもの  Q.$sql後に$Linkは必要か?



            mysql_select_db("FriendsSystem",$link);//取得したデータを元にデータベースの選択
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DVD/xhtml1-transitional.dtd">
<html>

<head>

	<title>都道府県</title>

</head>

<body>
	<h1>都道府県</h1>

	<!--<form action="friends.php" method="post">-->
      
<?php

	$sql = "SELECT `id`, `name` FROM `area`";//areaからidとnameを＄sqlに入れる
	$result = mysql_query($sql,$link);//SQL文の実行、１引数にSQL文、２にはmysql＿connect関数で取得した接続をしてい  Q.sql後に$Linkは必要か?
    
?>

<?php if ($result !== false && mysql_num_rows($result))://結果における行の数を得る　とは？
 ?>

	<?php while ($post = mysql_fetch_assoc($result)): //whileは条件が真であればその後の文を繰り返す
 ?>
	
		<a href="friends.php?area_id=<?php echo $post['id'];?>">
		<?php echo htmlspecialchars($post["name"],ENT_QUOTES,"UTF-8"); //echoからコメントアウトで県名消えた?>
		</a>
	</li>
	<?php endwhile; ?>
</ul>
<?php endif; ?>

<?php

//取得結果を開放して接続を閉じる
mysql_free_result($result);
mysql_close($link);

?>


	
</body>
</html>



	

