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
// 1行ずつ読み込む　1行分のデータが$rowdata
while( $rowdata = fgetcsv($fp)){
	//1行ずつ，データを$sikenに格納する
	$siken[$i] = $rowdata;
	$i++;
}
fclose($fp);

//各科目の合計点を求める
for( $i=0 ;$i<count($siken) ; $i++ ){
	//合計点を計算するために$goukeiを0にする
	$goukei = 0;
	for( $j=1; $j<count($siken[$i]);$j++){
		//1科目目からcount($siken[$i])で3科目目まで
		$goukei += $siken[$i][$j];
	}
	//合計は [4]列目
	$siken[$i][4] = $goukei;
}


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