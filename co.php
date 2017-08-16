<?php
$op=getallheaders();
$oid=$op["id"];
$heyaid=file_get_contents('php://input');
if(!file_exists("./room/".$heyaid.".oec")){
	echo "部屋は削除されました。<br>再読込してください。";
	exit();
}
	$tj=file("./room/".$heyaid.".oec",FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
	$rgh=preg_grep("/@[0-9]+/",$tj);
	$www=str_replace("@","",$rgh[0]);
echo "部屋作成者がゲーム開始ボタンを押すまでしばらくお待ち下さい@停止中@".$www;
?>