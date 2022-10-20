<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>演習0306</title>
</head>
<body>
<h3>和風月名</h3>
<?php
$tuki = rand(1,13);

echo $tuki."月は";
switch($tuki){
	case 1:echo "1月は睦月です。<br>";
         echo "新年の始まりですね。<br>";
         break;
	case 2:echo "2月は如月です。<br>";
         echo "1年のうち最も冷えますね。<br>";
         break;
	case 3:echo "3月は弥生です。<br>";
         echo "段々あたたかくなってきましたね。";
         break;
	case 4:echo "4月は卯月です。<br>";
         echo "桜がきれいですね。<br>";
         break;
	case 5:echo "5月は皐月です。<br>";
		     echo "祝日が多いですね。<br>";
		     break;
  case 6:echo "6月は水無月です。<br>";
         echo "雨が降って少し淋しいですね。<br>";
         break;
	case 7:echo "7月は文月です。<br>";
         echo "段々暑くなってきましたね。<br>";
         break;
	case 8:echo "8月は葉月です。<br>";
		     echo "蝉や蜂が活発になってきましたね。<br>";
		     break;
	case 9:echo "9月は長月です。<br>";
         echo "ちょっと涼しくなってきましたね。<br>";
         break;
	case 10:echo "10月は神無月です。<br>";
          echo "月がきれいですね。";
          break;
	case 11:echo "11月です。<br>";
		      echo "冬が近づいてきましたね。<br>";
		      break;
  case 12:echo "12月は師走です。<br>";
          echo "1年の締め括りです、やり残したことはありませんか？<br>";
          break;
	default:echo "月はエラーです<rb>";
		      break;
}
?>

</body>
</html>
