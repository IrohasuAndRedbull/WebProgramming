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
    
    $count=0;

if($sex==0){
    if($waistcircumference>=85) $count++;
}else{
    if($waistcircumference>=90) $count++;
}

    if($neutralfat>=150) $count++;
    if($hdlkoru<40) $count++;
    if($hobp>=130) $count++;
    if($lobp>=85) $count++;
    if($fbs>=110) $count++;

if($count>0) echo "あなたはメタボリックシンドロームの可能性があります。";
else echo "あなたはメタボリックシンドロームの可能性はありません。"
?>
</body>
</html>
