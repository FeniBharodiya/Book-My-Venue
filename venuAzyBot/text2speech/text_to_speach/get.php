<?php
if(isset($_POST['txt'])){
	$txt=$_POST['txt'];
	$txt=htmlspecialchars($txt);
	$txt=rawurlencode($txt);
	// $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-IN');
	$html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-mr');
	$player="<audio  autoplay><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
	 //$player = "<embed hidden='true' autoplay='true' ><source src = 'data:audio/mpeg;base64,".base64_encode($html)."'</embed>";
	echo $player;
}
?>