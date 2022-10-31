<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>En0408</title>
</head>
<body>
<h1>学籍番号と各科目の偏差値の出力</h1>

<?php
$Exam=array();
$Subject_Sum=array();/*各科目の合計点を配列に保存する*/
$Average=array();/*各科目の平均点を配列に保存する*/
$Deviation=array();/*各教科の偏差を配列に保存する*/
$Pow_Of_Deviation=array();/*各教科の偏差の2乗を配列に保存する*/
$Dispersion=array();/*各教科の分散を配列に保存する*/
$Standard_Deviation=array();/*各教科の標準偏差を配列に保存する*/
$Deviation_Value=array();/*各教科の偏差値を各学生毎に配列に保存する*/

$i=0;
$Sum_Temp=0;/*各科目の合計点の計算をするときに使用する*/

$fp = fopen("./seiseki.csv","r");/*ファイルを読み取り専用で開く*/

while($rowdata=fgetcsv($fp)){
	$Exam[$i]=$rowdata;/*1行ずつ，データを$sikenに格納する*/
	$i++;
}/*1行ずつ読み込む、1行分のデータが$rowdata*/
fclose($fp);

for($i=0; $i<count($Exam); $i++){
	for($j=1; $j<count($Exam[$i]); $j++) $Sum_Temp+=$Exam[$i][$j];
    $Subject_Sum[$i]=$Sum_Temp;
}/*各教科の合計をsubjectsumという配列にいれる。*/

for($i=0; $i<count($Exam); $i++){
$Average[$i]=$Subject_Sum[$i]/count($Exam[$i]);/*平均点の計算*/
    for($j=0; $j<count($Exam[$i]); $j++){
        $Eeviation[$i][$j]=$Exam[$i][$j]-$Average[$i];/*偏差の計算*/
        $Pow_Of_Deviation[$i]+=pow($Deviation[$i][$j], 2);/*偏差の2乗の総和の計算*/
    }
    $Dispersion[$i]=$Pow_Of_Deviation/count($Exam[$i]);/*分散の計算*/
    $Standard_Deviation[$i]=sqrt($Dispersion[$i]);/*標準偏差の計算*/
}

printf("各科目の平均点はそれぞれ\n");
for($i=0; $i<count($Exam); $i++) printf("%.3f点\n", $Average[$i]);

printf("各科目の標準偏差はそれぞれ\n");
for($i=0; $i<count($Exam); $i++) printf("%.3f点\n", $Standard_Deviation[$i]);

/*各科目の偏差値を求める、偏差値=10*(偏差/標準偏差)+50*/
for($i=0; $i<count($Exam); $i++){
    for($j=0; $j<count($Exam[$i]); $i++) $Deviation_Value[$i][$j]=50+10*$Deviation[$i][$j]/$Standard_Deviation[$i];
}

//試験結果の表示
echo "<table border>";
for($i=0; $i<count($Exam); $i++){
	echo "<tr>";
	for($j=0; $j<count($Exam[$i]); $j++) echo "<td>".$Exam[$i][$j]."</td>";
	echo "</tr>";
}
echo "</table>";

//学籍番号、科目1偏差値、科目2偏差値、科目3偏差値をEn0408.csvに書き出す
$fp = fopen("./En0408.csv","w");
$temp = array();
for($i=0; $i<count($Exam); $i++){
	$temp[0]=$Exam[$i][0];
	$temp[1]=$Eeviation_Value[0][$i];
	$temp[2]=$Eeviation_Value[1][$i];
    $temp[3]=$Eeviation_Value[2][$i];/*学籍番号、科目の毎の偏差値をそれぞれ出力*/
	fputcsv($fp,$temp);
}
fclose($fp);
?>

</body>
</html>
