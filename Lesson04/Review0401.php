<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>フィボナッチ数列(1次元配列)</title>
</head>
<body>
<h1>フィボナッチ数列(1次元配列)</h1>

<?php
//フォーム変数の受け取り
$n=$_POST["number"];

//数列を配列変数として宣言
$fib=[];

//指定された項まで計算する繰り返し処理
$fib[0]=0;
$fib[1]=1;
for($i=2; $i<$n; $i++) $fib[$i]=$fib[$i-1]+$fib[$i-2];

//結果表示
print_r($fib);
for($i=0; $i<$n; $i++) echo"{$i}項=$fib[$i] <br>";

?>


</body>
</html>
