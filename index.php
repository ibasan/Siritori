<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>
			限界しりとり
		</title>
		<style type="text/css">
		html,body,#main{
			width:100%;
			height:100%;
		}
		#heya{
			width:100%;
			height:10%;
			font-size:3vw;
		}
		#restq,#sta{
			width:49%;
			height:100%;
		}
		#resu{
		width:100%;
			height:40%;
			font-size:10vw;
		}
		#card,#car{width:100%;
			height:10%;
			font-size:3vw;}
		#timer{width:100%;
			height:40%;
			font-size:10vw;}
		</style>
		<link rel="stylesheet" href="./sweetalert2.min.css">
		<script type="text/javascript" src="./sweetalert2.min.js"></script>
		<script type="text/javascript">
		<?php 
		function wr($d){
	global $heyaid;
	file_put_contents("./room/".$heyaid.".oec",$d."\n",FILE_APPEND|LOCK_EX);
}
		?>
		var hh="";var esp="";var sae="";
			window.addEventListener("load",init);
			function init(){
				swal({
					title: 'Welcome ようこそ 限界しりとりオンラインへ',
					  text: "招待コードをお持ちですか？",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: '持っている',
					  cancelButtonText: '新しく部屋を作成する'
					}).then(function () {
						ggg();
					}, function (dismiss) {
						localStorage.setItem("siritori_id","hogehoge");
					localStorage.removeItem("siritori_id");
					localStorage.setItem("siritori_ke","hogehoge");
					localStorage.removeItem("siritori_ke");
						pap(dismiss);
					  }
					);
				}
function ggg(){
  swal({
					    title:"部屋IDを入力してください",
					    input:"text",
					    showCancelButton:true,
					    closeOnConfirm:false,
					    animation:"pop",
					    confirmButtonText:"確定",
					    cancelButtonText:"中止する",
					    inputPlaceholder:"IDを入力"
					  }).then(function(c){
					  	if(c===false){return false;}
					  	if(c===""){swal("入力が不正です","再読込の上、初めからやり直してください");return false;}
					  	gameset(c);
					  });
					  
}
				function pap(dismiss){
						if (dismiss === 'cancel') {
					    swal({
					      title:'部屋を作成',
					      text:'人数と一人あたりの制限時間を指定してください',
					      type:'info'
					      }).then(function(){
					      	swal.setDefaults({
							  input: 'text',
							  confirmButtonText: 'Next &rarr;',
							  showCancelButton: true,
							  animation: false,
							  progressSteps: ['1', '2']
							});
							var steps = [
							 '人数を入力してください<br>（半角数字・3人以上）',
							  '一人あたりの制限時間を入力してください<br>（半角数字・単位 分）'
							]
							  

							swal.queue(steps).then(function (result) {
			swal.resetDefaults();
							if(isNaN(result[0]-0)||isNaN(result[1]-0)||(result[1]-0<=0)||(3>result[0]-0)){
								swal("不正な値が含まれています","再読込の上、初めからやり直してください。");
								return;
							}
										  swal({
							    title: '確認',
							    html:
							      (result[0]-0)+"人、制限時間"+(result[1]-0)+"分で部屋を作成しますか？",
							    confirmButtonText: '部屋を作成',
							    showCancelButton: true,
		    					  type: 'warning',
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  cancelButtonText: 'キャンセル'
					}).then(function () {
					
					}, function (dismiss) {
					  }
					).then(function(){
					sae=result;
					toto("",function(tp){
					
		card.style="display:none";
					car.innerHTML="<button id='sta' onclick='gii()'>ゲームを始める</button><button id='restq' onclick='tii()'>この部屋を破棄する</button>";
						gameset(tp);
					},"./make.php");
					
					});
							}, function () {
							  swal.resetDefaults()
							})
							
							});}
					      
				}
			function gameset(heyaid){
			localStorage.setItem("siritori_id","hogehoge");
					localStorage.removeItem("siritori_id");
			f=true;
			 swal({title: 'ハンドルネームを入力してください',
				input: 'text',
  confirmButtonText: 'Next &rarr;',
  animation: false}).then(function(a){
  	if(a==""){
  		alert("入力が不正です");
  		gameset(heyaid);
  	}else{
  		localStorage.setItem("siritori_id",a);
  		var rr=function(u){
  		if(u==0){
		hh=heyaid;
  			heya.innerHTML="部屋ID:"+heyaid+"<br>ハンドルネーム:"+localStorage.getItem("siritori_id")+"さん";
  			resu.innerHTML="部屋作成者がゲーム開始ボタンを押すまでしばらくお待ち下さい";
  			setInterval(kll,1000);
  		}else{
  			swal("","部屋IDの指定が間違っているか、すでに同じハンドルネームのユーザーがいます。部屋IDとハンドルネームを確認の上、もう一度やり直してください。");
  			return false;
  		}}
  		tophp(heyaid+"@"+sae[1],rr);
  	}
  });
			
			}
			function tophp(res,ty){
			toto(res,ty,"./go.php");
			}
			function toto(res,ty,ttu){
			var q=new XMLHttpRequest();
			q.onreadystatechange=function(){
		if(q.readyState==4&&q.status==200){
		ty(q.responseText);
		}
		}
			q.open("POST",ttu,true);
	q.setRequestHeader("Content-Type","x-www-form-urlencoded");
	q.setRequestHeader("id",localStorage.getItem("siritori_id"));
	q.send(res);
			}
			function gii(){alert("まだ未実装！！");}
			function tii(){
				swal("部屋は削除されました","部屋に接続中のユーザーは再読込すると反映されます");
			
			}
			function kll(){
				toto(hh,function(oo){
					if(oo!=esp){
						dq=oo.split("@");
						resu.innerHTML=dq[0];
						card.innerHTML=dq[1];
						var mo=dq[2]%60;
						timer.innerHTML="残り"+((dq[2]-mo)/60)+"分"+mo+"秒";
						oo=esp;
					}
				},"./co.php");
			}
			
			
		</script>
	</head>
	<body ontouchstart="">
		<div id="main">
			<div id="heya"></div>
			<div id="resu"></div>
			<div id="car"></div>
			<div id="card"></div>
			<div id="timer"></div>
		</div>
	</body>
</html>
