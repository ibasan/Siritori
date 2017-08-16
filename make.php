<?php do{
		$heyaid=uniqid("",true);
		}while(file_exists("./room/".$heyaid.".oec"));
		
		echo $heyaid;
?>