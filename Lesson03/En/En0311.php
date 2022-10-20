<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>En0311</title>
</head>
<body>
<h3>1000までの素数の表示</h3>
<p>これは1000までの素数を求めるプログラムです。</p>
<?php
    $primenum=array();
    $i=0;
    $j=0;
    $count=0;
    $primecount=0;
    $primenum[$primecount]=2;                 /*素数の配列を作成し、0番目に2を入れる。*/

    for($i=3; $i<=1000; $i++){                /*1000までの繰り返し処理*/
        for($j=0; $j<count($primenum); $j++){ /*素数の配列の中の個数分の繰り返し処理*/
            if($i%$primenum[$j]==0){          /*割り切れたらカウントを+1、つまり素数ではない*/
                $count+=1;
            }
        }
        if($count==0){
            $primenum[$primecount+1]=$i;      /*カウントが0のままの処理が終われば、素数の配列に加える。*/
            $primecount++;
        }
        $count=0;
    }

    for($i=0; $i<count($primenum); $i++){     /*素数の配列の表示*/
        echo "$primenum[$i]<br>";
    }

?>
</body>
</html>
