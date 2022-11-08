<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>En0501-1</title>
</head>
<body>
<h1>サークル名簿登録確認</h1>
<?php

$number=$_POST["number"];	        /*学籍番号*/
$name=$_POST["name"];		        /*氏名*/
$adress=$_POST["adress"];	        /*メールアドレス*/
$phonenumber=$_POST["phonenumber"];	/*携帯番号*/
/*学籍番号、氏名、メールアドレス、携帯番号をmeibo.csvに出力する*/
$fp = fopen("./meibo.csv","a");
$temp = array();

$temp[0]=$number;
$temp[1]=$name;
$temp[2]=$adress;
$temp[3]=$phonenumber;

fputcsv($fp, $temp);
fclose($fp);

echo"送信しました。<br>"
?>

</body>
</html>