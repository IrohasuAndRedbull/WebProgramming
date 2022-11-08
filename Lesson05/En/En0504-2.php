<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>En0504-2</title>
</head>
<body>
<h1>サークル名簿出力</h1>

<?php
$meibolist=array();/*CSVファイルのデータを保存するための配列*/
$fp = fopen("./meibo.csv" , "r");/*読み取り専用でオープン*/
while($rowdata = fgetcsv($fp)){
	$meibolist[$rowdata[0]]=array("name"=>$rowdata[1], "adress"=>$rowdata[2], "phonenumber"=>$rowdata[3]);
}
fclose($fp);

/*表で結果出力*/
echo "<table border>";
echo "<tr>";
echo "<th>学籍番号</th>";
echo "<th>氏名</th>";
echo "<th>メールアドレス</th>";
echo "<th>携帯番号</th>";
echo "</tr>";
foreach($meibolist as $key => $rowdata){
	echo "<tr>";
	echo "<td> ".$key." </td>";
/*学籍番号、氏名、メールアドレス、携帯番号を順番に出力*/
	foreach ($rowdata as $val){
		echo "<th> $val </th>";
	}
	echo "</tr>";
}
echo "</table>";

?>

</body>
</html>