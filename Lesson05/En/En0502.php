<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>En0502.php</title>
</head>
<body>
<h1>1次元の連想配列</h1>

<?php
//国語の結果
$kokugo = array(
	"H001"=>41,
	"H002"=>52,
	"H003"=>34,
	"H004"=>53,
	"H005"=>68,
	"H006"=>64,
	"H007"=>46,
	"H008"=>56,
	"H009"=>58,
	"H010"=>44,
	"H011"=>54,
	"H012"=>41,
	"H013"=>38,
	"H014"=>51,
	"H015"=>55,
	"H016"=>55,
	"H017"=>37,
	"H018"=>55,
	"H019"=>33,
	"H020"=>41
);

//数学の結果
$suugaku = array(
	"H001"=>37,
	"H002"=>46,
	"H003"=>35,
	"H004"=>46,
	"H005"=>61,
	"H006"=>36,
	"H007"=>29,
	"H008"=>54,
	"H009"=>37,
	"H010"=>43,
	"H011"=>55,
	"H012"=>28,
	"H013"=>46,
	"H014"=>31,
	"H015"=>55,
	"H016"=>47,
	"H017"=>44,
	"H018"=>57,
	"H019"=>35,
	"H020"=>47
);

/*各科目の合計→平均→共分散、分散→標準偏差を求める*/
/*National Language(国語)*/
$NationalLanguage=array();		/*国語の配列*/
$NLSum=0;				/*点数の総和*/
$NLMulti=0;				/*点数の掛け算の総和*/
$Pow_Of_NLSum=0;			/*点数の2乗の総和*/
$Average_Of_NL=0;			/*平均*/
$Pow_Of_Average_Of_NL=0;		/*平均の2乗*/
$StandardDeviation_Of_NL=0;		/*標準偏差*/

/*Mathematics(数学)*/
$Math=array();				/*数学の配列*/
$MathSum=0;				/*点数の総和*/
$MathMulti=0;				/*点数の掛け算の総和*/
$Pow_Of_MathSum=0;			/*点数の2乗の総和*/
$Average_Of_Math=0;			/*平均*/
$Pow_Of_Average_Of_Math=0;		/*平均の2乗*/
$StandardDeviation_Of_Math=0;		/*標準偏差*/

$Covariance=0;				/*共分散*/
$CorrelationCoefficient=0;		/*相関係数*/

$count=0;

/*国語の平均と標準偏差を求める*/
foreach($kokugo as $val){
	$NLSum+=$val;			/*点数の総和*/
	$Pow_Of_NLSum+=pow($val,2);	/*点数の2乗の総和*/
	
	$NationalLanguage[$count]=$val;
	$count++;			/*国語の配列に値を代入する*/
}

$Average_Of_NL=$NLSum/count($kokugo);							/*平均点*/
$StandardDeviation_Of_NL=sqrt($Pow_Of_NLSum/count($kokugo)-pow($Average_Of_NL,2) );	/*標準偏差*/

$count=0;/*初期化*/
/*数学の平均と標準偏差を求める*/
foreach($suugaku as $val){
	$MathSum+=$val;			/*点数の総和*/
	$Pow_Of_MathSum+=pow($val,2);	/*点数の2乗の総和*/

	$Math[$count]=$val;
	$count++;			/*数学の配列に値を代入する*/
}

$Average_Of_Math=$MathSum/count($suugaku);							/*平均点*/
$StandardDeviation_Of_Math=sqrt($Pow_Of_MathSum/count($suugaku)-pow($Average_Of_Math,2) );	/*標準偏差*/

/*共分散、相関係数を求める*/
$i=0;
for($i=0; $i<count($kokugo); $i++){
	$Deviation_Of_NL=$NationalLanguage[$i]-$Average_Of_NL;
	$Deviation_Of_Math=$Math[$i]-$Average_Of_Math;

	$Covariance+=$Deviation_Of_NL*$Deviation_Of_Math;
}
$Covariance/=count($kokugo);									/*共分散*/
$CorrelationCoefficient=$Covariance/($StandardDeviation_Of_Math*$StandardDeviation_Of_NL);	/*相関係数*/


/*結果の出力*/
echo "国語の平均値= $Average_Of_NL 点<br>";
echo "国語の標準偏差= $StandardDeviation_Of_NL <br><br>";

echo "数学の平均値= $Average_Of_Math 点<br>";
echo "数学の標準偏差= $StandardDeviation_Of_Math <br><br>";

echo "相関係数= $CorrelationCoefficient";
?>

</body>
</html>
