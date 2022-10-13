<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>En0208</title>
</head>
<body>
<?php
$sideofa = $_POST["sideofa"];/*各辺をそれぞれa,b,cと置き、abcの和/2とヘロンの公式より求める。*/
$sideofb = $_POST["sideofb"];
$sideofc = $_POST["sideofc"];

$sumofab = $sideofa + $sideofb;
$sumofbc = $sideofb + $sideofc;
$sumofca = $sideofc + $sideofa;

if($sumofab < $sideofc || $sumofbc < $sideofa || $sumofca < $sideofb){
    echo "三角形が存在しません。";
}else{
    $sideofs = ($sideofa+$sideofb+$sideofc)/2;
    $herons_formula = sqrt($sideofs*($sideofs-$sideofa)*($sideofs-$sideofb)*($sideofs-$sideofc));
    printf("各辺の長さが、%.0f, %.0f, %.0f の三角形の面積は<br>", $sideofa,$sideofb,$sideofc);
    echo "ヘロンの公式より、".number_format($herons_formula,2)."です。";
}

?>
</body>
</html>
