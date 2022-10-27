<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Rei0404</title>
</head>
<body>
<h1>ファイルの入出力</h1>
<?php
$arigato = [
	"ビクトリーロード \n",
	"この道ずっと行けば \n",
	"最後は　笑える日が　くるさ \n",
	"びくとーロード \n",
	"ありがとう！ ラグビーWC日本代表 \n"
];

//ファイルオープン
$fp = fopen( "./test.txt" , "w");

for( $i=0 ; $i < count($arigato) ; $i++){
	fputs( $fp ,$arigato[$i]);
}

fclose( $fp );

if( ! $fp = fopen( "./sample_csv1.txt" , "r")){
	exit("ファイルを開けませんでした");
}
while( $line = fgets($fp) ){
	echo "$line";
}
fclose($fp);

?>

</body>
</html>