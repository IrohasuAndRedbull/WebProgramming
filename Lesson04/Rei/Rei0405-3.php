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
	$goukei = 0;
	for( $j=1; $j<count($siken[$i]);$j++){
		$goukei += $siken[$i][$j];
	}
	$siken[$i][4] = $goukei;
}


//合計点の平均点と標準偏差を求める
$sum = 0;
$sum2 = 0;
//count( $siken )は，データの行数を表す
for( $i=0 ; $i<count($siken) ; $i++){
	//$siken[$i][4]は，合計点となる
	$sum += $siken[$i][4];
	$sum2 += pow( $siken[$i][4],2);
}
$mean = $sum / count( $siken );
$sd = sqrt( $sum2 / count($siken) - pow($mean,2) );
echo "合計点の平均点 = ".number_format($mean,1) ."<br>";
echo "合計点の標準偏差 = ".number_format($sd, 1). "<br>";

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