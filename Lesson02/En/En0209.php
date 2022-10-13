<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>En0209</title>
</head>
<body>
<?php
    $firstride=700; /*初乗り料金*/
    $firstridemovingdistande=1500;
    $every=90;
    $movingdistance=296; /*1800m移動した後は、296m/90円分賃金が上がる。*/
    $purposedistance=$_POST["purposedistance"]*1000;
    $day=$_POST["day"];

    $odd=0;/*1桁目を0にするために使用*/

    if($day==0){
        if($purposedistance<=1500) {
            $firstride=$firstride*1.3;
            $odd=$firstride%10;/*1桁目の余りを計算する。 */
            $finalfees=$firstride-$odd;
            }
        else{
            $hmttfai=($purposedistance-$firstridemovingdistande)/$movingdistance; /*How many times the fees are increased*/
            $finalfees=floor($firstride+ceil($hmttfai)*$every)*1.3;
            $odd=$finalfees%10;
            $finalfees=$finalfees-$odd;/*初乗り料金と賃金が加算された回数×90を足し、3割増してのが答えである。 */
        }
    }/*23時以降、6時前までなら料金が3割増しなので、その計算を行う。 */

    else{
        if($purposedistance<=1500) $finalfees=$firstride;/*移動距離が1800m以内の場合は、710円である。 */
        else{
            $hmttfai=($purposedistance-$firstridemovingdistande)/$movingdistance; /*How many times the fees are increased*/
            $finalfees=$firstride+ceil($hmttfai)*$every;/*初乗り料金と賃金が加算された回数×90を足したのが答えである。 */
        }
    }

    echo "初乗り$firstride 円で $firstridemovingdistande m後は$movingdistance m毎に $every 円加算されるタクシーで、<br>";
    if($day==1) echo "昼間に乗車した場合、<br>";
    else if($day==0) echo "夜間に乗車した場合、<br>";
    echo "$purposedistance m移動する場合は、$finalfees 円かかります。";
?>
</body>
</html>
