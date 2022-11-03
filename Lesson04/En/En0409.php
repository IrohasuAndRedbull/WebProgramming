<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>En0409.php</title>
</head>
<body>
<h1>アンケート</h1>
<?php

$name=$_POST["name"];		/*氏名*/
$sex=$_POST["sex"];			/*性別、男性は1、女性は2*/
$height=$_POST["height"];	/*身長*/
$weight=$_POST["weight"];	/*体重*/
/*入力番号、名前、性別、身長、体重をank.csvに出力する*/
$fp = fopen("./ank.csv","a");
$temp = array();

$temp[0]=$name;
if($sex==1) $temp[1]="1";
else if($sex==2) $temp[1]="2";/*男性は1、女性は2*/
$temp[2]=$height;
$temp[3]=$weight;

fputcsv($fp, $temp);
fclose($fp);

echo"送信しました。<br>"
?>

</body>
</html>