<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Rei0402</title>
</head>
<body>
<h1>Fibonacci数列</h1>
<?php
//Fibonacci数列を格納する配列を宣言
$fib = array();

$fib[0] = 0;
$fib[1] = 1;
$n=2;

//数列の値が1000未満の間ループする
//=数列の値が1000以上になったらループをやめる
while( ($fib[$n] = $fib[$n-1] + $fib[$n-2]) < 1000){
	$n++;
}

for($i = 0; $i<count($fib) ; $i++){
	echo " $fib[$i]  ";
}
echo "<br>最終項 { ($n - 1)} <br>";

//<考察>
//while文の　($fib[$n] = $fib[$n-1] + $fib[$n-2])
//( )括弧がなかったら，結果は?
//演算の優先順位
//単項演算子　> 算術演算子 > 比較演算子 > 代入演算子

?>

</body>
</html>