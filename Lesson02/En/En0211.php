<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>En0211</title>
</head>
<body>
<?php
    $sex=$_POST["sex"];                 /*性別*/
    $waistcircumference=$_POST["waistcircumference"];             /*腹囲*/
    $neutralfat=$_POST["neutralfat"];   /*中性脂肪*/
    $hdlkoru=$_POST["hdlkoru"];         /*HDLコレステロール*/
    $hobp=$_POST["hobp"];               /*最高血圧*/
    $lobp=$_POST["lobp"];               /*最低血圧*/
    $fbs=$_POST["fbs"];                 /*空腹時血糖値*/
    
    $count01=0;
    $count02=0;

if($sex==0){
    if($waistcircumference>=85) $count01++;
}else{
    if($waistcircumference>=90) $count01++;
}

    if($neutralfat>=150 || $hdlkoru<40) $count02++;
    if($hobp>=130 || $lobp>=85) $count02++;
    if($fbs>=110) $count02++;

if($count01==1 && $count02>=2) echo "あなたはメタボリックシンドロームの可能性があります。";
else echo "あなたはメタボリックシンドロームの可能性はありません。"
?>
</body>
</html>
