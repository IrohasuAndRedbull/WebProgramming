<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>En0205</title>
</head>
<body>
<?php
    $firstride=710; /*初乗り料金*/
    $firstridemovingdistande=1800;
    $every=90;
    $movingdistance=285; /*1800m移動した後は、285m/90円分賃金が上がる。*/
    $purposedistance=rand(1000, 4000);
    $oclock=rand(0, 23);/*時間*/
    $minutes=rand(0,59);/*分、これはいらないけど結果をきれいに表示したいため使用。*/

    $odd=0;/*1桁目を0にするために使用*/

    if($oclock>=23 || $oclock<6){
        if($purposedistance<=1800) {
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
        if($purposedistance<=1800) $finalfees=$firstride;/*移動距離が1800m以内の場合は、710円である。 */
        else{
            $hmttfai=($purposedistance-$firstridemovingdistande)/$movingdistance; /*How many times the fees are increased*/
            $finalfees=$firstride+ceil($hmttfai)*$every;/*初乗り料金と賃金が加算された回数×90を足したのが答えである。 */
        }
    }

    echo "初乗り$firstride 円で $firstridemovingdistande m後は$movingdistance m毎に $every 円加算されるタクシーで、<br>";
    echo "仮に、$oclock 時 $minutes 分に乗車した場合、<br>";
    echo "$purposedistance m移動する場合は、$finalfees 円かかります。";
?>
</body>
</html>
