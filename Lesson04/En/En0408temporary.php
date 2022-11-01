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
$Pow_Of_Average=array();/*平均の2乗を配列に保存する*/
$Average_Of_Pow=array();/*2乗の平均を配列に保存する*/
$Dispersion=array();/*各教科の分散を配列に保存する*/
$Standard_Deviation=array();/*各教科の標準偏差を配列に保存する*/
$Deviation_Value=array();/*各学生の科目ごとの偏差値を配列に保存する*/

$i=0;
$Sum_Temp=0;/*各科目の合計点の計算をするときに使用する*/

$fp = fopen("./seiseki.csv","r");/*ファイルを読み取り専用で開く*/

while($rowdata=fgetcsv($fp)){
	$Exam[$i]=$rowdata;/*1行ずつ，データを$Examに格納する*/
	$i++;
}/*1行ずつ読み込む、1行分のデータが$rowdata*/
fclose($fp);

$Subject_Sum[0]="Sum";						/*合計*/
$Average[0]="Average";						/*平均*/
$Pow_Of_Average[0]="Pow_Of_Average";		/*平均の2乗*/
$Average_Of_Pow[0]="Average_Of_Pow";		/*2乗の平均*/
$Dispersion[0]="Dispersion";				/*分散*/
$Standard_Deviation[0]="Standard_Deviation";/*標準偏差*/

for($i=0; $i<count($Exam[0])-1; $i++){
	$Sum=0;
	$Pow_Of_Sum=0;
	for($j=0; $j<count($Exam); $j++){ 
		$Sum+=$Exam[$j][$i+1];
		$Pow_Of_Sum+=pow($Exam[$j][$i+1], 2);						/*2乗の総和*/
	}
	$Subject_Sum[$i+1]=$Sum;										/*合計*/
	$Average_Of_Pow[$i+1]=$Pow_Of_Sum/$j;							/*2乗の平均*/
    $Average[$i+1]=$Sum/$j;											/*平均*/
	$Pow_Of_Average[$i+1]=pow($Average[$i+1], 2);					/*平均の2乗*/
	$Dispersion[$i+1]=$Average_Of_Pow[$i+1] - $Pow_Of_Average[$i+1];/*分散*/
	$Standard_Deviation[$i+1]=sqrt($Dispersion[$i+1]);				/*標準偏差*/
}

printf("各科目の合計点はそれぞれ");
for($i=1; $i<count($Exam[$i]); $i++) printf("%.3f点 ", $Subject_Sum[$i]);
echo"<br>";
printf("各科目の2乗の平均はそれぞれ");
for($i=1; $i<count($Exam[$i]); $i++) printf("%.3f点 ", $Average_Of_Pow[$i]);
echo"<br>";
printf("各科目の平均の2乗はそれぞれ");
for($i=1; $i<count($Exam[$i]); $i++) printf("%.3f点 ", $Pow_Of_Average[$i]);
echo"<br>";
printf("各科目の平均点はそれぞれ");
for($i=1; $i<count($Exam[$i]); $i++) printf("%.3f点 ", $Average[$i]);
echo"<br>";
printf("各科目の分散はそれぞれ");
for($i=1; $i<count($Exam[$i]); $i++) printf("%.3f点 ", $Dispersion[$i]);
echo"<br>";
printf("各科目の標準偏差はそれぞれ");
for($i=1; $i<count($Exam[$i]); $i++) printf("%.3f点 ", $Standard_Deviation[$i]);
echo"<br>";

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
	$temp[0]=$Exam[$i][0];											/*学籍番号*/
	$temp[1]=$Exam[$i][1]-$Average[1]/$Standard_Deviation[1]*10+50;	/*科目1の偏差値*/
	$temp[2]=$Exam[$i][2]-$Average[2]/$Standard_Deviation[2]*10+50;	/*科目2の偏差値*/
    $temp[3]=$Exam[$i][3]-$Average[3]/$Standard_Deviation[3]*10+50;	/*科目3の偏差値*/
	fputcsv($fp,$temp);
}
fclose($fp);
?>

</body>
</html>
