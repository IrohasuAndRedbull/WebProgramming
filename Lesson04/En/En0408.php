<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>En0408</title>
</head>
<body>
<h1>学籍番号と各科目の偏差値の出力</h1>

<?php
$exam=array();
$subjectsum=array();/*各科目の合計点を配列に保存する*/
$average=array();/*各科目の平均点を配列に保存する*/
$deviation=array();/*各教科の偏差を配列に保存する*/
$powofdeviation=array();/*各教科の偏差の2乗を配列に保存する*/
$dispersion=array();/*各教科の分散を配列に保存する*/
$standarddeviation=array();/*各教科の標準偏差を配列に保存する*/
$deviationvalue=array();/*各教科の偏差値を各学生毎に配列に保存する*/

$i=0;
$sumtemp=0;/*各科目の合計点の計算をするときに使用する*/

$fp = fopen("./seiseki.csv","r");/*ファイルを読み取り専用で開く*/

while($rowdata=fgetcsv($fp)){
	$exam[$i]=$rowdata;/*1行ずつ，データを$sikenに格納する*/
	$i++;
}/*1行ずつ読み込む、1行分のデータが$rowdata*/
fclose($fp);

for($i=0; $i<count($exam); $i++){
	for($j=1; $j<count($exam[$i]); $j++) $sumtemp+=$exam[$i][$j];
    $subjectsum[$i]=$sumtemp;
}/*各教科の合計をsubjectsumという配列にいれる。*/

for($i=0; $i<count($exam); $i++){
$average[$i]=$subjectsum[$i]/count($exam[$i]);/*平均点の計算*/
    for($j=0; $j<count($exam[$i]); $j++){
        $deviation[$i][$j]=$exam[$i][$j]-$average[$i];/*偏差の計算*/
        $powofdeviation[$i]+=pow($deviation[$i][$j], 2);/*偏差の2乗の総和の計算*/
    }
    $dispersion[$i]=$powofdeviation/count($exam[$i]);/*分散の計算*/
    $standarddeviation[$i]=sqrt($dispersion[$i]);/*標準偏差の計算*/
}

printf("各科目の平均点はそれぞれ\n");
for($i=0; $i<count($exam); $i++) printf("%.3f点\n", $average[$i]);

printf("各科目の標準偏差はそれぞれ\n");
for($i=0; $i<count($exam); $i++) printf("%.3f点\n", $standarddeviation[$i]);

/*各科目の偏差値を求める、偏差値=10*(偏差/標準偏差)+50*/
for($i=0; $i<count($exam); $i++){
    for($j=0; $j<count($exam[$i]); $i++) $deviationvalue[$i][$j]=50+10*$deviation[$i][$j]/$standarddeviation[$i];
}

//試験結果の表示
echo "<table border>";
for($i=0; $i<count($exam); $i++){
	echo "<tr>";
	for($j=0; $j<count($exam[$i]); $j++) echo "<td>".$exam[$i][$j]."</td>";
	echo "</tr>";
}
echo "</table>";

//学籍番号、科目1偏差値、科目2偏差値、科目3偏差値をEn0408.csvに書き出す
$fp = fopen("./En0408.csv","w");
$temp = array();
for($i=0; $i<count($exam); $i++){
	$temp[0]=$exam[$i][0];
	$temp[1]=$deviationvalue[0][$i];
	$temp[2]=$deviationvalue[1][$i];
    $temp[3]=$deviationvalue[2][$i];/*学籍番号、科目の毎の偏差値をそれぞれ出力*/
	fputcsv($fp,$temp);
}
fclose($fp);
?>

</body>
</html>