<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>CSVファイルの読み出しと出力</title>
</head>
<body>
<h1>CSVデータファイルの読み出しと書き出し</h1>

<?php
//CSVファイルのデータを保存するための配列
$siken = array();

//ファイルをrでオープン
$fp = fopen("./seiseki.csv" , "r");

$i=0;
//1行ずつ読み込む　1行分のデータが1次元配列$rowdataに
//$rowdataには，学籍番号，数学，英語，国語の点
while( $rowdata = fgetcsv($fp)){
	//1行ずつ，データを$sikenに格納する
	$siken[$i] = $rowdata;
	$i++;
}
fclose($fp);

//試験結果の表示
echo "<table border>";
for( $i=0 ; $i< count($siken) ; $i++){
	echo "<tr>";
	for( $j=0 ; $j<count($siken[$i]) ; $j++){
		echo "<td>".$siken[$i][$j]."</td>";
	}
	echo "</tr>";
}

echo "</table>";

?>

</body>
</html>