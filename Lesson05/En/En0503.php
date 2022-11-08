<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>相関係数　連想配列</title>
</head>
<body>
<h1>相関係数 連想配列</h1>
<?php
//試験結果
$siken = array(
	"H001"=>[ "kokugo"=>41,"suugaku"=>37],
	"H002"=>[ "kokugo"=>52,"suugaku"=>46],
	"H003"=>[ "kokugo"=>34,"suugaku"=>35],
	"H004"=>[ "kokugo"=>53,"suugaku"=>46],
	"H005"=>[ "kokugo"=>68,"suugaku"=>61],
	"H006"=>[ "kokugo"=>64,"suugaku"=>36],
	"H007"=>[ "kokugo"=>46,"suugaku"=>29],
	"H008"=>[ "kokugo"=>56,"suugaku"=>54],
	"H009"=>[ "kokugo"=>58,"suugaku"=>37],
	"H010"=>[ "kokugo"=>44,"suugaku"=>43],
	"H011"=>[ "kokugo"=>54,"suugaku"=>55],
	"H012"=>[ "kokugo"=>41,"suugaku"=>28],
	"H013"=>[ "kokugo"=>38,"suugaku"=>46],
	"H014"=>[ "kokugo"=>51,"suugaku"=>31],
	"H015"=>[ "kokugo"=>55,"suugaku"=>55],
	"H016"=>[ "kokugo"=>55,"suugaku"=>47],
	"H017"=>[ "kokugo"=>37,"suugaku"=>44],
	"H018"=>[ "kokugo"=>55,"suugaku"=>57],
	"H019"=>[ "kokugo"=>33,"suugaku"=>35],
	"H020"=>[ "kokugo"=>41,"suugaku"=>47]
);

//各学科の総和を求め平均値を求める
/*National Language(国語)*/
$Sum_Of_NL=0;					/*点数の総和*/
$Multi_Of_NL=0;					/*点数の掛け算の総和*/
$Pow_Of_Sum_Of_NL=0;			/*点数の2乗の総和*/
$Average_Of_NL=0;				/*平均*/
$Pow_Of_Average_Of_NL=0;		/*平均の2乗*/
$StandardDeviation_Of_NL=0;		/*標準偏差*/

/*Mathematics(数学)*/
$Sum_Of_Math=0;					/*点数の総和*/
$Multi_Of_Math=0;				/*点数の掛け算の総和*/
$Pow_Of_Sum_Of_Math=0;			/*点数の2乗の総和*/
$Average_Of_Math=0;				/*平均*/
$Pow_Of_Average_Of_Math=0;		/*平均の2乗*/
$StandardDeviation_Of_Math=0;	/*標準偏差*/

$Covariance=0;					/*共分散*/
$CorrelationCoefficient=0;		/*相関係数*/

$Sum_Of_Both=0;					/*両方の科目の総和*/

foreach($siken as $key => $rowdata){
	$siken[$key]["goukei"]=$rowdata["kokugo"]+$rowdata["suugaku"];/*両方の科目の総和*/

	/*国語の平均と標準偏差を求めるために使用*/
	$Sum_Of_NL+=$rowdata["kokugo"];
	$Pow_Of_Sum_Of_NL+=pow($rowdata["kokugo"], 2);

	/*数学の平均と標準偏差を求めるために使用*/
	$Sum_Of_Math+=$rowdata["suugaku"];
	$Pow_Of_Sum_Of_Math+=pow($rowdata["suugaku"], 2);
}

/*国語*/
$Average_Of_NL=$Sum_Of_NL/count($siken);													/*平均点*/
$StandardDeviation_Of_NL=sqrt($Pow_Of_Sum_Of_NL/count($siken)-pow($Average_Of_NL,2));	/*標準偏差*/

/*数学*/
$Average_Of_Math=$Sum_Of_Math/count($siken);													/*平均点*/
$StandardDeviation_Of_Math=sqrt($Pow_Of_Sum_Of_Math/count($siken)-pow($Average_Of_Math,2));	/*標準偏差*/

/*共分散、相関係数を求める*/
foreach($siken as $key => $rowdata) $Covariance+=($rowdata["kokugo"]-$Average_Of_NL)*($rowdata["suugaku"]-$Average_Of_Math);
$Covariance/=count($siken);																	/*共分散*/
$CorrelationCoefficient=$Covariance/($StandardDeviation_Of_Math*$StandardDeviation_Of_NL);	/*相関係数*/

echo"相関係数は $CorrelationCoefficient <br><br>";
/*表で結果出力*/
echo "<table border>";
echo "<tr>";
echo "<th>学籍番号</th>";
echo "<th>国語</th>";
echo "<th>数学</th>";
echo "<th>合計</th>";
echo "</tr>";
/*$sikenから1行ずつ処理 $rowdataは1次元配列*/
foreach($siken as $key => $rowdata){
	echo "<tr>";
	echo "<td> ".$key." </td>";
/*国語、数学、合計を順番に出力*/
	foreach ($rowdata as $val){
		echo "<th> $val </th>";
	}
	echo "</tr>";
}
echo "</table>";
?>

</body>
</html>