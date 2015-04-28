<?php

//データベースに接続
$link = mysql_connect( "localhost","root","tetu1129" );
if(!$link)
{
	die("データベースに接続できません:" . mysql_error());
}
$sql = "SET NAMES utf8";
$result = mysql_query($sql,$link);//実行

var_dump($_POST['name']);//var_dumpではそれよりも前の処理を確認できる、

//データベースを選択する
mysql_select_db('FriendsSystem',$link);//$linkでデータベースも選択
if($_SERVER['REQUEST_METHOD']==='POST'){
$sql = "INSERT INTO `friends`(`area_id`, `name`, `age`, `gender`) VALUES (".$_POST['basyo'].",'".$_POST['name']."',".$_POST['age'].",'".$_POST['gender']."');";//初めの;はSQL文の、二個目はphp文の終わりの;  //文字と変数を繋ぎ目には.赤点が必要、つまり$_POSTより前は文字
$result= mysql_query($sql,$link);//実行　関数は実行しているのでその後に上書き
//header('Location: http://' .$_SERVER['HTTP_HOST'].'/areas.php');//ホスト名、飛び先
var_dump($sql);

}
//var_dump($sql);}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DVD/xhtml1-transitional.dtd">
<html>
<head>
	<title>入力</title>
	</head>
	<body>

<?php
		//投稿された内容を取得するSQLを作成して結果を取得
		$sql="SELECT * FROM `area`;";//ASK昇順、DESK降順  データベース内のareaから取得
		$result= mysql_query($sql, $link);//バイナリデータとして格納
?>

<h1>追加</h1><br />
<form  method="post">

出身地
  <select name="basyo"><!--フォームの部品としてデータが送信される際には、 <SELECT>タグのname属性で付けたデータ名と、 選択された<OPTION>のvalue属性の値を一組にして、 <FORM>タグのaction属性で指定したサーバー上のファイルに、 <FORM>タグのmethod属性で指定した転送方法で送られます。-->
         <option value="未選択">選択して下さい</option>
					<?php while ($post = mysql_fetch_assoc($result)): ?>
						<?php echo '<option value="'.$post['id'].'">'.$post['name'].'</option>';?>
					<?php endwhile; ?><!--optionの.の必要性 value="値"
                                       選択したときに送信される値を指定します。-->
			</select>

	<p>名前:<input type="text" name="name"></p>
	
	<p>年齢:<select name="age">
		<option value="未選択">選択して下さい</option>
			<?php  
			    for($a=1;$a<=100;$a++){
				echo '<option value="'.$a.'">'.$a.'</option>';
                } 
                ?>
     性別:<label><input type="radio" name="gender" value="男">男</label>
			<label><input type="radio" name="gender" value="女">女</label>

	</select>
	<input type="submit" name="save" value="保存">
	</form>


<form action="friends.php" method="post">
		<input type="submit" name="back" value="戻る">
</form>

    </body>f
	</html>