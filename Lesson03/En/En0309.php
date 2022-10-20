<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>En0309</title>
</head>
<body>
<h3>試験の結果</h3>
<?php
$exam=array();
$deviation=array();/*偏差 */
$sum=0;
$max=0;
$min=100;
$median=0;
$average=0;
$standarddeviation=0;
$squaredsumofdeviation=0;
$dispersion=0;

//受験者数を乱数で設定
$people =rand(5,20);
echo "受験者数 $people 人<br>";

//人数分の試験結果を配列に格納
for($i=0 ; $i<$people ; $i++){
	$exam[$i] = rand(0,100);
}

//昇順にソート
sort($exam);

//試験結果の表示
echo "試験結果<br>";
for($i=0 ; $i<count($exam) ; $i++){
	echo $exam[$i]." ";
    $sum+=$exam[$i];
}
echo"<br>";

//最高点の表示
$max=$exam[count($exam)-1];
echo"最高点は $max 点<br>";
//最低点の表示
$min=$exam[0];
echo"最低点は $min 点<br>";
//平均点の表示
$average=$sum/count($exam);
echo"平均点は $average 点<br>";

//標準偏差の表示
for($i=0 ; $i<count($exam) ; $i++){
    $deviation[$i]=$exam[$i]-$average;
    $squaredsumofdeviation+=pow($deviation[$i], 2);
}
$dispersion=$squaredsumofdeviation/count($exam);
$standarddeviation=sqrt($dispersion);
echo"標準偏差は $standarddeviation <br>";

//中央値の計算
if(count($exam)%2==0) $median = ($exam[($people-1)/2]+$exam[$people/2])/2;
else $median = $exam[($people-1)/2];
echo "中央値は".$median."<br>";

?>
</body>
</html>
