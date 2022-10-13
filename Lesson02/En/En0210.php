<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>En0210</title>
</head>
<body>
<?php
    $usedtank=$_POST["usedtank"];
    $bm=$_POST["bm"];
    $expense=0;

    if($bm==1){
        if($bm<=5) $expense=$usedtank*3000;
        else if(6<=$bm && $bm<=10) $expense=$usedtank*2700;
        else $expense=$usedtank*2500;

        $expense = round($expense*0.80, -2);
        echo "料金は、$expense 円です。<br>";
    }else{
        if($bm<=5) $expense=$usedtank*3000;
        else if(6<=$bm && $bm<=10) $expense=$usedtank*2700;
        else $expense=$usedtank*2500;
        echo "料金は、$expense 円です。<br>";
    }
?>
</body>
</html>
