<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Rei0401</title>
</head>
<body>
<h1>繰り返し処理</h1>
<pre>
初期値;  //なくてもより
while(条件式){
    繰り返し処理;
}
</pre>
<hr>

<?php
//1から10までの和
$wa = 0;
for( $i = 1; $i<=10 ; $i++){
	$wa += $i;
}
echo "for) 1+2+...+10 = $wa <br>";

//whileループの場合
$wa = 0;
$i = 1; //ループ制御変数の初期化
while( $i<= 10 ){
	$wa += $i;
	$i++;  //ループ制御変数のインクリメント
}
echo "while) 1+2+...+10 = $wa <br>";

//<考察>1+2+...+nを計算した結果が1000未満で，
//最も1000に近いときのnを求めるプログラム

?>
</body>
</html>

