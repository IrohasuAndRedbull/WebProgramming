<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>アンケートテーブルの検索結果</title>
</head>
<body>
<h3>アンケートテーブルの検索結果</h3>

<?php
//Data Source Name(DBサーバに接続するためのパラメータ)の指定
$dsn = "mysql:host=webprog_db;dbname=sampledb";
//$dsn = "mysql:host=172.30.0.10;dbname=sampledb";
$username = "root";
$password = "1234";

//DBに接続
try{
	$dbcon = new PDO($dsn, $username, $password);
}
catch(PDOException $e){
	//接続できなかった場合　dieは実行停止
    die("DSNを使ったデータベースの接続に失敗しました<pre>".$e->getMessage()."</pre>" );
}

//　変数$sqlstringに，SQL文を設定する【説明のためエラー混入】
$sqlstring = "
	SELECT *
	FROM post_area
	WHERE city='茅野市'
	;
";/*もともとpost_area2でエラー吐いた*/

//SQL文を実行し，実行結果を受け取る
//echo "<pre>sql=$sqlstring </pre>";		//FOR debug
//SQL命令の実行
if( ! $recset = $dbcon -> query( $sqlstring ) ){
	//SQLのqueryが正しく実行できなかったとき，SQL文のチェック
	echo "<pre>sqlstring = $sqlstring \n";
	echo "SQLのqueryでエラー。エラーメッセ―は次の通り \n";
	print_r($dbcon->errorInfo());
	//エラーメッセージを表示しプログラム終了
	die("プログラム停止しました</pre>");
}

//検索結果を1レコードずつ配列変数に受け取り
//すべてのレコードの処理をする
//結果を表形式で表示
echo "<table border>";
$lineflag=1;
echo "<tr>";
echo "<th>郵便番号</th><th>市町村</th><th>地域</th>";
echo "</tr>";
while( $rowdata = $recset -> fetch(PDO::FETCH_ASSOC) ){

	echo "<tr>";
	echo "<td>" .$rowdata["postnumber"]. "</td>";
	echo "<td>" .$rowdata["city"]. "</td>";
	echo "<td>" .$rowdata["area"]. "</td>";
	echo "</tr>";
	/*//すべてのレコードについて実行
	if( $lineflag==1){
		echo "<tr>";
		foreach($rowdata as $key => $val){
			echo "<th> $key </th>";
		}
		echo "</tr>";
	}
	$lineflag=0;
	echo "<tr>";
	foreach($rowdata as $val){
		echo " <td> $val </td>";
	}
	echo "</tr>";*/
}
echo "</table>";

//検索結果とDBオブジェクトを開放する
$recset = null;
$dbcon = null;


?>

</body>
</html>
