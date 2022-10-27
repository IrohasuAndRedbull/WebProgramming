<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Rei0403</title>
</head>
<body>
<h1>2次元配列</h1>
<?php
//2次元配列の設定
$seiseki = [
	["H001",50,70,0],
	["H002",60,55,0],
	["H003",50,80,0],
	["H004",45,23,0],
	["H005",80,75,0]
];
/*
$seiseki = [][];
$seiseki[0][0] = "H001";
$seiseki[0][1] = 50;
$seiseki[0][2] = 70;
$seiseki[0][3] = 0;
$seiksei[1][0] = "H002";
$seiseki[1][1] = 60;
$seiseki[1][2] = 55;
$seiseki[1][3] = 0;
  以下省略
*/

//合計点を求める
for($i = 0; $i < count($seiseki) ; $i++){
	//合計の計算
	$seiseki[$i][3] = $seiseki[$i][1] + $seiseki[$i][2]
}

//合計点の平均値と標準偏差の計算
$sum01=0;
$sum02=0;
for($i=0; $i<count($seiseki); $i++){
	$sum01 += $seiseki[$i][3];
	$sum02 += pow($seiseki[$i][3], 2);
}


//各人の合計点の偏差値を求める

echo "試験結果<br>";
echo "<table border>";
echo "<tr>";
echo "<th>学籍</th><th>数学</th><th>英語</th><th>合計</th>";
echo "</tr>";
// count( $seiseki )は，2次元配列の行数
for( $i = 0 ; $i < count($seiseki) ; $i++ ){
	echo "<tr align='right'>";
	// count( $seiseki[$i] ) は，2次元配列の列数
	for( $j=0 ; $j < count($seiseki[$i]);$j++){
		echo "<td> ".$seiseki[$i][$j]." </td>";
	}
	echo "</tr>";
}
echo "</table>";

//考察
//・各人の合計点を求める
//・各人の合計点の平均値と標準偏差を求める
//・各人の合計点の偏差値を求める

?>

</body>
</html>
