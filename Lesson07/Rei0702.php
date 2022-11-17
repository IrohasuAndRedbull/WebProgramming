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
$username = "root";
$password = "1234";

//DBに接続
try{
	$dbcon = new PDO($dsn, $username, $password);
}
catch(PDOException $e){
	//接続できなかった場合　dieは実行停止
    die("DSNを使ったデータベースの接続に失敗しました".$e->getMessage() );
}

//フォームから値の受け渡し
$prefecture = $_POST["prefecture"];

//　変数$sqlstringに，SQL文を設定する
$sqlstring = "
	SELECT *
	FROM quest
	WHERE prefecture = '$prefecture'
	ORDER BY age ASC 
";/*50音順*/

//SQL文を実行し，実行結果を受け取る
echo "sql=$sqlstring <br>";		//FOR debug

//SQL命令の実行
if( ! $recset = $dbcon -> query( $sqlstring ) ){
	//SQLのqueryが正しく実行できなかったとき，SQL文のチェック
	echo "<pre>sqlstring = $sqlstring \n";
	echo "SQLのqueryでエラー。エラーメッセ―は次の通り \n";
	print_r($dbcon->errorInfo());
	die("プログラム停止しました </pre>");
}

//検索結果を1レコードずつ配列変数に受け取り
//すべてのレコードの処理をする

echo"<table border>";
echo"<tr>";
echo "<td>名前</td><td>性別</td><td>出身</td><td>年齢</td>";
echo "</tr>";
while( $rowdata = $recset -> fetch(PDO::FETCH_ASSOC) ){
	//すべてのレコードについて実行
	echo "<tr>";
	echo "<td>" .$rowdata["namae"]."</td>";/*nameとnamaeの違い*/
	echo "<td>" .$rowdata["gender"]. "</td>";
	echo "<td>" .$rowdata["prefecture"]. "</td>";
	echo "<td>" .$rowdata["age"]. "</td>";
	echo "</tr>";
}
echo"/table>";

//検索結果とDBオブジェクトを開放する
$recset = null;
$dbcon = null;
?>

</body>
</html>
