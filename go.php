<?php
function send(){
	echo "<html><head><meta http-equiv='Content-Type' content='text/html;charset=utf8'><meta http-equiv='refresh' content='0;../index.html'></head></html>";
	exit();
}
$t="";
if($_SERVER["REQUEST_METHOD"]!="POST"){
	send();
}
function wr($d){
	global $heyaid;
	file_put_contents("./room/".$heyaid.".oec",$d."\n",FILE_APPEND|LOCK_EX);
}

$op=getallheaders();
$oid=$op["id"];
$coc=explode("@",file_get_contents('php://input'));
$heyaid=$coc[0];
wr("@".($coc[1]*60));
if(file_exists("./room/".$heyaid.".oec")){
	$tj=file("./room/".$heyaid.".oec",FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
	if(array_search("#".$oid,$tj)===false){
	wr("#".$oid);
		echo 0;
	}else{
		echo "non";
	}
}else{
echo "non";
}
?>