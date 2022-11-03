<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>En0410.php</title>
</head>
<body>
<h1>アンケート</h1>
<?php
$ank=array();
$i=0;
$j=0;
/*名前、性別、身長、体重をank.csvから読み取る*/
$fp = fopen("./ank.csv","r");
$count=0;
while($rowdata=fgetcsv($fp)){
	$ank[$count]=$rowdata;/*1行ずつ，データを$Examに格納する*/
	$count++;
}/*1行ずつ読み込む、1行分のデータが$rowdata*/
fclose($fp);

$ank[0][0]="名前(name)";
$ank[0][1]="性別(男性は1、女性は2)";
$ank[0][2]="身長(cm)";
$ank[0][3]="体重(kg)";

$ank[$count][0]="The average of man";
$ank[$count][1]="1";
$ank[$count+1][0]="The average of woman";
$ank[$count+1][1]="2";/*表の下から2行目の1列目と2列目に表示される*/

for($i=0; $i<2; $i++){
    $Sum_Of_Man=0;
    $Count_Of_Man=0;
    $Sum_Of_Woman=0;
    $Count_Of_Woman=0;
    for($j=0; $j<$count; $j++){
        if($ank[$j][1]==1){
            $Sum_Of_Man+=$ank[$j][$i+2];
            $Count_Of_Man++;
        }else if($ank[$j][1]==2){
            $Sum_Of_Woman+=$ank[$j][$i+2];
            $Count_Of_Woman++;
        }
    }/*男性の人数と平均を求めるための総和、及び女性の人数と平均を求めるための総和を求める*/
    if($ank[$j][1]==1) $ank[$count][$i+2]=$Sum_Of_Man/$Count_Of_Man;
    if($ank[$j+1][1]==2) $ank[$count+1][$i+2]=$Sum_Of_Woman/$Count_Of_Woman;/*平均を求める*/
}

printf("男女別の身長及び体重の平均値はそれぞれ");
echo"<br>男性(1)";
printf("%.3fcm, %.3fkg", $ank[$count][2], $ank[$count][3]);
echo"<br>女性(2)";
printf("%.3fcm, %.3fkg", $ank[$count+1][2], $ank[$count+1][3]);

echo "<br><table border>";
        for($i=0; $i<count($ank); $i++){/*count($ank)は入力された人数*/
	        echo "<tr>";
	        for($j=0; $j<count($ank[$j]); $j++){
                echo "<td>　".$ank[$i][$j]. "　</td>";/*count($ank[$i])は要素数(今回は4)*/
            }
	        echo "</tr>";
        }
        echo "</table>";/*table出力*/
?>

</body>
</html>