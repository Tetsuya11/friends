<?php


//データベースに接続
$link = mysql_connect( "localhost","root","tetu1129" );
if(!$link)
{
	die("データベースに接続できません:" . mysql_error());
}
$sql = "SET NAMES utf8"; //文字化け解消
$result = mysql_query($sql);
//$result = mysql_query($sql);


//データベースを選択する
mysql_select_db( "FriendsSystem",$link );


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>友達リスト</title>
</head>
<body>

	<h1>友達リスト</h1>

<?php
	$area_id = $_GET['area_id'];
	$sql = "SELECT `id`, `area_id`, `name`, `gender`, `age` FROM `friends` WHERE area_id =".$area_id;
	$result = mysql_query($sql,$link);
?>

<?php if ($result !== false && mysql_num_rows($result)): ?>
<ul>

	<?php while ($post = mysql_fetch_assoc($result)): //fetch?>
	<li> 
		<?php echo htmlspecialchars($post["name"],ENT_QUOTES,"UTF-8"); ?>
		<?php echo htmlspecialchars($post["gender"],ENT_QUOTES,"UTF-8"); ?>
		<?php echo htmlspecialchars($post["age"],ENT_QUOTES,"UTF-8"); ?>
	</li>
	<?php endwhile; ?>
</ul>
<?php

//取得結果を開放して接続を閉じる
mysql_free_result($result);
mysql_close($link);

?>

<?php endif; ?>

<?php

//取得結果を開放して接続を閉じる


?>


	<form action="areas.php" method="post">
		<input type="submit" name="back" value="戻る">
	</form>

	<form action="hozon.php" method="post">
		<input type="button" name="add" value="追加" onclick="location.href='hozon.php'"><!--submitだと一度hozon.phpに飛んでいくが処理内容にareas.phpに飛ぶ処理をしているため-->
	</form>
</body>
</html>









